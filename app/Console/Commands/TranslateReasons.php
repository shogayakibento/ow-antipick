<?php

namespace App\Console\Commands;

use App\Models\CharacterRelation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class TranslateReasons extends Command
{
    protected $signature = 'translate:reasons {--dry-run : Show what would be translated without saving}';
    protected $description = 'Translate reason column to English using DeepL API';

    public function handle(): int
    {
        $apiKey = config('services.deepl.key');
        if (!$apiKey) {
            $this->error('DEEPL_API_KEY is not set in .env');
            return 1;
        }

        $relations = CharacterRelation::whereNull('reason_en')
            ->whereNotNull('reason')
            ->get();

        if ($relations->isEmpty()) {
            $this->info('All reasons are already translated.');
            return 0;
        }

        $this->info("Found {$relations->count()} records to translate.");

        if ($this->option('dry-run')) {
            $this->info('Dry-run mode: no changes will be saved.');
            $this->table(['id', 'reason'], $relations->map(fn($r) => [$r->id, mb_substr($r->reason, 0, 60) . '...'])->toArray());
            return 0;
        }

        // DeepL free tier endpoint
        $endpoint = str_ends_with($apiKey, ':fx')
            ? 'https://api-free.deepl.com/v2/translate'
            : 'https://api.deepl.com/v2/translate';

        $bar = $this->output->createProgressBar($relations->count());
        $bar->start();

        $failed = 0;
        foreach ($relations as $relation) {
            $translated = null;
            $attempts = 0;
            $delays = [2, 4, 8];

            while ($attempts <= count($delays)) {
                try {
                    $response = Http::timeout(30)->withHeaders([
                        'Authorization' => "DeepL-Auth-Key {$apiKey}",
                    ])->post($endpoint, [
                        'text'        => [$relation->reason],
                        'source_lang' => 'JA',
                        'target_lang' => 'EN-US',
                    ]);

                    if ($response->successful()) {
                        $translated = $response->json('translations.0.text');
                    } else {
                        $this->newLine();
                        $this->warn("Failed for id={$relation->id}: " . $response->status());
                        $failed++;
                    }
                    break;
                } catch (\Illuminate\Http\Client\ConnectionException $e) {
                    if ($attempts < count($delays)) {
                        sleep($delays[$attempts]);
                        $attempts++;
                    } else {
                        $this->newLine();
                        $this->warn("Skipping id={$relation->id} after " . ($attempts + 1) . " attempts: timeout");
                        $failed++;
                        break;
                    }
                }
            }

            if ($translated !== null) {
                $relation->update(['reason_en' => $translated]);
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine();

        $done = $relations->count() - $failed;
        $this->info("Done: {$done} translated, {$failed} failed.");

        return $failed > 0 ? 1 : 0;
    }
}

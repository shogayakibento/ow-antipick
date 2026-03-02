@extends('layouts.app') @section('title','キャラ、ロール選択')
@section('content')
<div class="bg-white py-2">
    <div class='user-role'>
        <h2>あなたのロールを選択してください。</h2>
        <button type="button" class="selectable-role tank">タンク</button>
        <button type="button" class="selectable-role damage">ダメージ</button>
        <button type="button" class="selectable-role support">サポート</button>
    </div>

    <div class="character-container">
        <div class="tank"><i class="bi bi-shield-fill"></i> タンク</div>
        <div class='character-list'>
            @foreach($characters as $character) 
                @if($character->role == 'タンク')
                    <div class="character-card">
                        <img src="{{$character->image_url}}" alt="{{$character->name}}" />
                        <p>{{ $character->name }}</p>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="damage"><i class="bi bi-heart-arrow"></i> ダメージ</div>
        <div class='character-list'>
            @foreach($characters as $character)
                @if($character->role == 'ダメージ')
                    <div class="character-card">
                        <img src="{{$character->image_url}}" alt="{{$character->name}}">
                        <p>{{ $character->name }}</p>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="support"><i class="bi bi-heart-fill"></i> サポート</div>
        <div class='character-list'>
            @foreach($characters as $character)
                @if($character->role == 'サポート')
                    <div class="character-card">
                        <img src="{{$character->image_url}}" alt="{{$character->name}}">
                        <p>{{ $character->name }}</p>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <form method="POST" action="/choose">
        @csrf
        @if ($errors->any())
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
   @endif
        <input type="hidden" name="role" id="selected-role" value=''>
        <input type="hidden" name="character[]" id="selected-character" value=''>
        <button id='submit' type='submit'>最適アンチピックを表示</button>
    </form>
</div>
@endsection

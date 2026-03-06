// ===== サイドバー =====
$(function () {
    $("#menu-list").click(function () {
        $("#sidebar_inside").toggleClass("show");
        $("#overlay").toggleClass("show");
    });
    $("#overlay").click(function () {
        $("#sidebar_inside").toggleClass("show");
        $("#overlay").toggleClass("show");
    });
});

// ===== キャラ名フィルター =====
$(function () {
    $("#char-search").on("input", function () {
        const query = $(this).val().toLowerCase().trim();
        $(".character-card").each(function () {
            const name = $(this).data("name").toLowerCase();
            $(this).toggle(query === "" || name.includes(query));
        });
    });
});

// ===== ロールとキャラの選択 =====
$(function () {
    // ロール選択
    $(".selectable-role").click(function () {
        if ($(this).hasClass("selected-role")) {
            $(this).removeClass("selected-role");
            $("#selected-role").val("");
        } else {
            $(".selectable-role").removeClass("selected-role");
            $(this).addClass("selected-role");
            $("#selected-role").val($(this).text().trim());
        }
        updateStickyBar();
    });

    // 選択中キャラデータ
    const selected_characters = [];
    const selected_character_data = []; // {name, img} の配列

    $(".character-card").click(function () {
        const name = $(this).data("name");
        const img = $(this).find("img").attr("src");

        if ($(this).hasClass("selected-character")) {
            // 選択解除
            $(this).removeClass("selected-character");
            const idx = selected_characters.indexOf(name);
            if (idx !== -1) {
                selected_characters.splice(idx, 1);
                selected_character_data.splice(idx, 1);
            }
        } else if (selected_characters.length < 5) {
            // 選択追加
            $(this).addClass("selected-character");
            selected_characters.push(name);
            selected_character_data.push({ name, img });
        } else {
            // 5体超過：スティッキーバーを一瞬赤く光らせる
            const bar = $("#sticky-bar");
            bar.css("border-top-color", "#ef4444");
            setTimeout(function () {
                bar.css("border-top-color", "#2a3348");
            }, 600);
            return;
        }

        // hidden inputs 更新
        $("form input[name^='character']").remove();
        $.each(selected_characters, function (index, value) {
            $("<input>")
                .attr({ type: "hidden", name: "character[" + index + "]", value: value })
                .appendTo("form");
        });

        updateStickyBar();
    });

    // スティッキーバー更新
    function updateStickyBar() {
        const count = selected_characters.length;

        // カウント更新
        $("#sticky-count").text(count);

        // スロット更新（画像を埋める）
        for (let i = 0; i < 5; i++) {
            const slot = $("#slot-" + i);
            if (selected_character_data[i]) {
                slot.html('<img src="' + selected_character_data[i].img + '" alt="' + selected_character_data[i].name + '">');
                slot.addClass("filled");
            } else {
                slot.html("");
                slot.removeClass("filled");
            }
        }

        // 送信ボタン有効化（キャラ1体以上 & ロール選択済み）
        const roleSelected = $("#selected-role").val() !== "";
        const canSubmit = count > 0 && roleSelected;
        $("#sticky-submit")
            .prop("disabled", !canSubmit)
            .css("opacity", canSubmit ? "1" : "0.4")
            .css("cursor", canSubmit ? "pointer" : "not-allowed");
    }

    // 初期化
    updateStickyBar();
});

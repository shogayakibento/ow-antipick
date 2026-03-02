//サイドバー
$(function () {
    $("#menu-list").click(function () {
        $("#sidebar_inside").toggleClass("show");
        $("#overlay").toggleClass("show");
    });
    $("#overlay").click(function () {
        $("#sidebar_inside").toggleClass("show");
        $("#overlay").toggleClass("show");
    });

    $(".toggleOther a,.close_button").click(function () {
        $("#link_list").slideToggle("fast");
    });

    $("#search_button").click(function () {
        $("#search").toggle("slow");
    });
});

//ロールとキャラの選択
$(function () {
    $(".selectable-role").click(function () {
        const selectedRole = $(this).text().trim();
        if ($(this).hasClass("selected-role")) {
            $(this).removeClass("selected-role");
            $("#selected-role").val("");
        } else {
            $(".selectable-role").removeClass("selected-role");
            $(this).addClass("selected-role");
            $("#selected-role").val(selectedRole);
        }
    });

    const selected_characters = [];
    $(".character-card").click(function () {
        const selected_character_name = $(this).find("p").text().trim();
        if ($(this).hasClass("selected-character")) {
            $(this).removeClass("selected-character");
            const index = selected_characters.indexOf(selected_character_name);
            if (index !== -1) {
                selected_characters.splice(index, 1);
            }
        } else if (selected_characters.length < 5) {
            $(this).addClass("selected-character");
            selected_characters.push(selected_character_name);
            $("#selected-character").val(selected_characters);
        } else {
            alert("キャラクターは５キャラまでです");
        }
        $("#selected-character").remove(); // 既存の入力をクリア
        $.each(selected_characters, function (index, value) {
            $("<input>")
                .attr({
                    type: "hidden",
                    name: `character[${index}]`,
                    value: value,
                })
                .appendTo("form");
        });
    });
});

var fruit = new Array();
var selectfruit = $('#selectfruit');
var customMatcher = function (params, data, select2SearchStr) {
    var modifiedData;
    if ($.trim(params.term) === '') {
        return data;
    }
    if (typeof data.text === 'undefined') {
        return null;
    }
    if (data.text.indexOf(params.term) > -1) {
        modifiedData = $.extend({}, data, true);
        return modifiedData;
    }

    // 
    if (select2SearchStr === null || select2SearchStr === void 0) {
        return null;
    }
    if (select2SearchStr.toString().indexOf(params.term) > -1) {
        modifiedData = $.extend({}, data, true);
        return modifiedData;
    }
    return null;
};


// サブ検索項目複数で検索する
var twoSearch = function (params, data) {
    var item_1, item_2, items;
    // data属性 sub-search の内容を検索する
    item_1 = $(data.element).data('sub-search');
    // data属性 sub-two-search の内容を検索する
    item_2 = $(data.element).data('sub-two-search');

    // 複数項目で検索したい場合は配列を入力する
    items = [item_1, item_2]
    return customMatcher(params, data, items);
};

$("#place_list").select2({
    // 上で作った twoSearch メソッドを指定
    matcher: twoSearch,
    width: "100%",
    placeholder: '所在地を選んでください',
    allowClear: true,
    language: 'ja',
    closeOnSelect:false

    // ignore: ":hidden:not(.select2-hidden-accessible)",
    // validateNonVisibleFields: true,
    // promptPosition:'block'
    //  tags: true//自由に入れたい場合は使う
     
});



// $.each($(".select2-container,.select2-container-default"), function (i, n) {
//     $(n).next().show().fadeTo(0, 0).height("0px").css("left", "auto"); // make the original select visible for validation engine and hidden for us
//     $(n).prepend($(n).next());
//     $(n).delay(500).queue(function () {
//       $(this).removeClass("validate[required]"); //remove the class name from select2 container(div), so that validation engine dose not validate it
//       $(this).dequeue();
//     });
//   });


// $('[name=fruits]').change(function () {

//     fruit = $(this).val();
//     selectfruit.text(fruit.join(','));
//     console.log(fruit.join(','));

// });




$("#jobs_name_list").select2({
    // 上で作った twoSearch メソッドを指定
    matcher: twoSearch,
    width: "100%",
    placeholder: '職種を選んでください',
    allowClear: true,
    language: 'ja',
    closeOnSelect:false
    // tags: true//自由に入れたい場合は使う
});



$("#submission").select2({
    // 上で作った twoSearch メソッドを指定
    matcher: twoSearch,
    width: "100%",
    placeholder: '提出物を選んでください',
    allowClear: true,
    language: 'ja',
    closeOnSelect:false

    // tags: true//自由に入れたい場合は使う
});
$("#feature").select2({
    // 上で作った twoSearch メソッドを指定
    matcher: twoSearch,
    width: "100%",
    placeholder: '特徴を選んでください',
    allowClear: true,
    language: 'ja',
    closeOnSelect:false

    // tags: true//自由に入れたい場合は使う
});

// jQuery(document).ready(function ($) {
//     $("#place_list").validate({
//       ignore: ":hidden:not(.select2-hidden-accessible)"
//     });
//    });

// $('#formCheck').validationEngine({
//     validateNonVisibleFields: true,
//     promptPosition:'block'
// });

// //バリデーションのエラー表示
// $(function () {
//     //<form>タグのidを指定
//     $("#formCheck").validationEngine(
//         'attach', {
//         promptPosition: "topLeft",//エラーメッセージ位置の指定
       
//     }
//     );
// });

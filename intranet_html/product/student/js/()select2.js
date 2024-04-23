var fruits = new Array();
var locations = new Array();
var syokus = new Array();
var id_default = new Array();//デフォルトIDの格納場所
var ids = new Array();//ID格納場所
var selectco = $('#selectco');
var selectlocation = $('#selectlocation');
var selectsyoku = $('#selectsyoku');
const ItemList = document.getElementsByClassName("job_goo");

window.addEventListener('load', function () {
    $('#number_reset').trigger("click");
    $('.number_s').removeClass('active');
});

//高さ調整用js
const idlist = id_list;
const idsList = idlist.split(",");

var mainco,mainpre, mainpro, maintiki, mainname, width, height, datail, margin, heighttop;
var submain, sub_a1, sub_a2, sub_a3, sub_a4, sub_a5;
var Documentsub,Feature,Comme;

var smtm = '';
idsList.forEach((hei) => {
    height = 0;
   
    heigthserch(hei);
});
function heigthserch(ida) {
    //詳細をクリックする前の高さ調整
    var id = document.getElementById(String(ida));
    
    mainco =  id.getElementsByClassName("company");
    console.log(mainco);
    mainpre = id.getElementsByClassName("prefecture");
    mainpro = id.getElementsByClassName("Profession");
    
    if (mainco[0].offsetHeight >= 73||mainpre[0].offsetHeight >= 44||mainpro[0].offsetHeight >= 44) {
        height = mainco[0].offsetHeight + 48;//会社名の高さ
        maintiki = id.getElementsByClassName("job_tiki");
        mainname = id.getElementsByClassName("job_name");
        heighttop = String(height) + 'px';
        maintiki[0].style.top = heighttop;//調整した勤務地の高さ
        mainpre[0].style.top = heighttop;
        height += mainpre[0].offsetHeight +20;
        heighttop = String(height) + 'px';
        mainpro[0].style.top = heighttop;//調整した職種の高さ
        mainname[0].style.top = heighttop;
        height += mainname[0].offsetHeight;
       

    }else{
        height += mainco[0].offsetHeight;
        height += mainpre[0].offsetHeight;
    }
    

    datail = id.getElementsByClassName("detail");

    margin = String(height + 100) + 'px';
    datail[0].style.marginTop = margin;//全体的に調整した高さ

    //詳細の高さ調整
 
    submain = datail[0].children[2];
    sub_a1 = submain.children[5].offsetHeight;
    sub_a2 = submain.children[6].offsetHeight;
    sub_a3 = submain.children[7].offsetHeight;
    sub_a4 = submain.children[8].offsetHeight;
    sub_a5 = submain.children[9].offsetHeight;

 
        Documentsub = submain.children[2];
        Feature = submain.children[3];
        Comme = submain.children[4];
    //高さを求めたからあとは調整するのみ2023/01/19
       height = (sub_a1>sub_a2?sub_a1:sub_a2)+72;//月給か人数のテキストの高さの高いほうに合わせて＋72

        heighttop = String(height) + 'px';
        Documentsub.style.top = heighttop;//調整した提出書類の高さ
        submain.children[7].style.top = heighttop;
        height += (sub_a3>=28?sub_a3:28)+28;
        heighttop = String(height) + 'px';
        Feature.style.top = heighttop;//調整した特徴の高さ
        submain.children[8].style.top = heighttop;
        height += (sub_a4>=28?sub_a4:28)+22;
        heighttop = String(height) + 'px';
        Comme.style.top = heighttop;//調整した特徴の高さ
        submain.children[9].style.top = heighttop;
        //疑似クラスの変更を行う
        height += (sub_a5 >= 28?sub_a5:28)+22; 
smtm = smtm +  '#acd-check' + String(ida) +':checked + .acd-label + .acd-content{height:'+String(height) + 'px;opacity: 1;padding: 10px;visibility: visible;}';

}
$("#stylesheet").html(smtm);


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

$("#com").select2({
    // 上で作った twoSearch メソッドを指定
    matcher: twoSearch,
    width: "300px",
    placeholder: '会社名を入力してください',
    allowClear: true,
    language: 'ja',
    closeOnSelect: false,//選択画面を閉じないようにする
    tags: true//自由に入れたい場合は使う
});
$("#location").select2({
    // 上で作った twoSearch メソッドを指定
    matcher: twoSearch,
    width: "200px",
    placeholder: '勤務地は？',
    allowClear: true,
    language: 'ja',
    closeOnSelect: false,
    // tags: true//自由に入れたい場合は使う
});
$("#syoku").select2({
    // 上で作った twoSearch メソッドを指定
    matcher: twoSearch,
    width: "200px",
    placeholder: '職種は？',
    allowClear: true,
    language: 'ja',
    closeOnSelect: false,
    // tags: true//自由に入れたい場合は使う
});
$('#com').change(function () {

    fruits = $(this).val();
    selectco.text(fruits.join(','));
    

});
$('#location').change(function () {

    locations = $(this).val();
    selectlocation.text(locations.join(','));
    
});
$('#syoku').change(function () {

    syokus = $(this).val();
    selectsyoku.text(syokus.join(','));
    
});
//末尾のflagを参照して行のbackgroundcolorを変える
let harfText = document.getElementsByClassName("job_goo");
for (let i = 0; i < harfText.length; i++) {

    if (harfText[i].lastElementChild.textContent == 0) {
        harfText[i].style.backgroundColor = 'rgb(204, 204, 204)';
    } else if (harfText[i].lastElementChild.textContent == 2) {
        harfText[i].style.backgroundColor = 'rgb(255, 155, 155)';
    } else if (harfText[i].lastElementChild.textContent == 3) {
        harfText[i].style.backgroundColor = 'rgb(239, 206, 0)';
    }
}
//デフォルトIDを取得しておく
for (var i = 0; i < ItemList.length; i++) {
    id_default[i] = ItemList.item(ItemList.length-i-1).getAttribute('id');
}
function reset() {
    $('#com').val(null).trigger("change");
    $('#location').val(null).trigger("change");
    $('#syoku').val(null).trigger("change");
    //すべて表示
    for (let i = 0; i < harfText.length; i++) {
        harfText[i].style.display = "block";
    }
    //番号を取得して最初が0だった場合昇順にする
    for (var i = 0; i < ItemList.length; i++) {
        if (id_default[i] != ItemList.item(i).getAttribute('id')) {
            $('#number_reset').trigger("click");
            //ナンバー以外の場合は↓を使って降順にする
            if (id_default[i] != ItemList.item(i).getAttribute('id')) {
                $('#number_reset').trigger("click");
            }
            $('#number_reset').removeClass('active');
            break;
        } else {
            $('#number_reset').removeClass('active');
        }
    }
}
function kensaku() {
    if (fruits.length === 0 && locations.length === 0
        && syokus.length === 0) {//配列に何もないなら全て表示させるようにしている
        for (let i = 0; i < harfText.length; i++) {
            harfText[i].style.display = "block";
        }
        return;
    }

    for (var i = 0; i < ItemList.length; i++) {
        ids[i] = ItemList.item(i).getAttribute('id');
    }
  
    for (let i = 0; i < ItemList.length; i++) {
       
    }
    const ABCList = Array.from(ItemList);//アレイライクなオブジェクトを配列に戻す
    for (let i = 0; i < harfText.length; i++) {
        harfText[i].style.display = "none";
    }//全ての行を非表示
    var string = '';
    var stringco = '';
    var Stringsyoku = '';
    for (let i = 0; i < ABCList.length; i++) {
       

        stringco = ABCList[i].children[0].children[1].textContent;
        string = ABCList[i].children[0].children[2].textContent;//2は子要素で3番目のこと
        Stringsyoku = ABCList[i].children[0].children[3].textContent;
        fruits.forEach((sentaku) => {
           
            if (stringco.indexOf(sentaku) > -1) {
                // 部分一致のときの処理
               
                document.getElementById(String(ids[i])).style.display = "block";
            }

        });
        locations.forEach((sentaku) => {
            
            if (string.indexOf(sentaku) > -1) {
                // 部分一致のときの処理
                document.getElementById(String(ids[i])).style.display = "block";
            }
        });
        syokus.forEach((sentaku) => {
         
            if (Stringsyoku.indexOf(sentaku) > -1) {
                // 部分一致のときの処理
                document.getElementById(String(ids[i])).style.display = "block";
            }
        });
    }
}
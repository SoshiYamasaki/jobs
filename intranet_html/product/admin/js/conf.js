//fileのドラック&ドロップの処理(求人票)
window.addEventListener("DOMContentLoaded", () => {

    const ddarea = document.getElementById("ddarea");

    // ドラッグされたデータが有効かどうかチェック
    const isValid = e => e.dataTransfer.types.indexOf("Files") >= 0;

    const ddEvent = {
        "dragover": e => {
            e.preventDefault(); // 既定の処理をさせない
            if (!e.currentTarget.isEqualNode(ddarea)) {
                // ドロップエリア外ならドロップを無効にする
                e.dataTransfer.dropEffect = "none"; return;
            }
            e.stopPropagation(); // イベント伝播を止める

            if (!isValid(e)) {
                // 無効なデータがドラッグされたらドロップを無効にする
                e.dataTransfer.dropEffect = "none"; return;
            }
            // ドロップのタイプを変更
            e.dataTransfer.dropEffect = "copy";
            ddarea.classList.add("ddefect");
        },
        "dragleave": e => {
            if (!e.currentTarget.isEqualNode(ddarea)) {
                return;
            }
            e.stopPropagation(); // イベント伝播を止める
            ddarea.classList.remove("ddefect");
        },
        "drop": e => {
            e.preventDefault(); // 既定の処理をさせない
            e.stopPropagation(); // イベント伝播を止める

            const files = e.dataTransfer.files;

            if(ddarea.value!="")
                ddarea.value+=',';
            for (file of files) {
                
                ddarea.value += `${file.name}`};

            ddarea.classList.remove("ddefect");
        }
    };

    Object.keys(ddEvent).forEach(e => {
        ddarea.addEventListener(e, ddEvent[e]);
        document.body.addEventListener(e, ddEvent[e])
    });

});



//バリデーションのエラー表示
$(function () {
    //<form>タグのidを指定
    $("#formCheck").validationEngine(
        'attach', {
        promptPosition: "topRight",//エラーメッセージ位置の指定
       
    }
    );
});



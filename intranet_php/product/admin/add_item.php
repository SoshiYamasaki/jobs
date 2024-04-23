<?php
    session_start();
       //クリックジャギング対策
       header('X-FRAME-OPTIONS:DENY');
       
        if (!isset($_SESSION['tech_Token'])) {
            echo "ログインしてください";

            exit;
        } else if ($_SESSION['time'] < time() - 1800) {
            echo "セッションの有効期限が切れました<br>
              再びログインしてください";
            exit;
        }


        ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/re.css">

    <link rel="stylesheet" type="text/css" href="css/add_item.css">

    <script src="js/hiragana2romaji.js"></script>
    <title>選択ボックスの値を追加</title>
</head>

<body>
    <header>
        <h1>入力項目追加ページ</h1>
    </header>
    <div class="explanation">
        <h3 class="not_h3">＊現在ない項目がある場合その都度登録してください。仮名をひらがなで入力することで検索予測として出るようになります。<br>
            似たような職種は出来るだけ統一出来るようにしてください(生徒が見にくくなります)<br>
            例:ぷ→PGなど</h3>
    </div>
    <div class="list">

        <form action="db/add_selectitem.php" method="post">
            <div class="list_1">
                <h2>職種の項目</h2>
                <div class="item">
                    <h3>漢字やカタカナ</h3>
                    <input type="text" name="job" placeholder="例:建築士など" autocomplete="off">
                    <h3>仮名など</h3>
                    <input type="text" id="job_kana"name="job_kana" placeholder="例:けんちくし" autocomplete="off">
                </div>
            </div>
            <div class="list_1">
                <h2>提出物の項目</h2>
                <div class="item">
                    <h3>漢字やカタカナ</h3>

                    <input type="text" name='submission' placeholder="例:免許書など" autocomplete="off">
                    <h3>仮名など</h3>
                    <input type="text" id="submission_kana" name="submission_kana" placeholder="例:めんきょしょ" autocomplete="off">
                </div>
            </div>
            <div class="list_1">
                <h2>特徴の項目</h2>
                <div class="item">
                    <h3>漢字やカタカナ</h3>
                    <input type="text" name="feature" placeholder="例:第2新卒歓迎など"autocomplete="off">
                    <h3>仮名など</h3>

                    <input type="text" id="feature_kana"name="feature_kana" placeholder="例:だい2しんそつかんげい" autocomplete="off">
                    <input type="submit" name="btn_submit" value="登録する" class="btn">
                    <input type="hidden" id="job_romaji" name="job_romaji">
                    <input type="hidden" id="submission_romaji" name="submission_romaji">
                    <input type="hidden" id="feature_romaji" name="feature_romaji">
                </div>

            </div>
            <br>

        </form>
    </div>
    <br>

    <h2 class="spece">現在登録している項目</h2>
    <p class="spece">間違って登録した際などに削除をお願いします。</p>
    <h3 class="spece">職種の項目</h3>
    <?php
    require "db/connection.php";

    //sqlをセットする
    $sql = 'select * from job';
    //sqlを実行する
    $data = $pdo->query($sql);
    //データを配列に変更
    $data_array = $data->fetchAll();

    //データが無かった場合
    if ($data_array == null) {
        return;
    }
   
    print '<table class="table" border="1">';
    print '<tr>';
    print "<th>職種</th>";
    print "<th>仮名</th>";
    print "<th>ローマ字</th>";
    print "</tr>";
    foreach ($data_array as $row) {

        print '<tr>';
        print "<td>";
        print($row['職種']);
        print "</td>";
        print "<td>";
        print($row['仮名']);
        print "</td>";
        print "<td>";
        print($row['ローマ字']);
        print "</td>";
        print '<form action="db/delete_selectitem.php" method="POST">';
        print '<input type="hidden" value=' . $row["id"] . ' name="id" >';
        print '<input type="hidden" value="job" name="kind" >';
        print '<td><input type="submit" value="削除する"></td>';
        print "</tr>";
        print '</form>';

    }
    print "</table>";
    
    ?>
    <h3 class="spece">提出物の項目</h3>
    <?php

    //sqlをセットする
    $sql = 'select * from submission';
    //sqlを実行する
    $data = $pdo->query($sql);
    //データを配列に変更
    $data_array = $data->fetchAll();

    //データが無かった場合
    if ($data_array == null) {
        return;
    }
 
    print '<table class="table" border="1">';
    print '<tr>';
    print "<th>提出物</th>";
    print "<th>仮名</th>";
    print "<th>ローマ字</th>";
    print "</tr>";
    foreach ($data_array as $row) {

        print '<tr>';
        print "<td>";
        print($row['提出物']);
        print "</td>";
        print "<td>";
        print($row['仮名']);
        print "</td>";
        print "<td>";
        print($row['ローマ字']);
        print "</td>";
        print '<form action="db/delete_selectitem.php" method="POST">';
        print '<input type="hidden" value=' . $row["id"] . ' name="id" >';
        print '<input type="hidden" value="submission" name="kind" >';
        print '<td><input type="submit" value="削除する"></td>';
        print "</tr>";
        print '</form>';

    }
    print "</table>";
    
    ?>
        <h3 class="spece">特徴の項目</h3>
    <?php

    //sqlをセットする
    $sql = 'select * from feature';
    //sqlを実行する
    $data = $pdo->query($sql);
    //データを配列に変更
    $data_array = $data->fetchAll();

    //データが無かった場合
    if ($data_array == null) {
        return;
    }
  
    print '<table class="table" border="1">';
    print '<tr>';
    print "<th>特徴</th>";
    print "<th>仮名</th>";
    print "<th>ローマ字</th>";
    print "</tr>";
    foreach ($data_array as $row) {

        print '<tr>';
        print "<td>";
        print($row['特徴']);
        print "</td>";
        print "<td>";
        print($row['仮名']);
        print "</td>";
        print "<td>";
        print($row['ローマ字']);
        print "</td>";
        print '<form action="db/delete_selectitem.php" method="POST" onSubmit="return check()">';
        print '<input type="hidden" value=' . $row["id"] . ' name="id" >';
        print '<input type="hidden" value="feature" name="kind" >';
        print '<td><input type="submit" value="削除する"></td>';
        print "</tr>";
        print '</form>';

    }
    
    print "</table>";
    ?>


</body>
<script>
function check(){

	if(window.confirm('本当に削除してもいいですか？')){ // 確認ダイアログを表示

		return true; // 「OK」時は送信を実行

	}
	else{ // 「キャンセル」時の処理

		window.alert('キャンセルされました'); // 警告ダイアログを表示
		return false; // 送信を中止

	}

}
</script>

</html>
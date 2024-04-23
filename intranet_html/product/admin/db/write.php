<?php

//クリックジャッキング対策
header('X-FRAME-OPTIONS:DENY');


session_start();

if (!isset($_SESSION['tech_Token'])) {
    echo "ログインしてください";
    
    exit;
} else if ($_SESSION['time'] < time() - 1800) {
    echo "セッションの有効期限が切れました<br>
          再びログインしてください";
    exit;
} 


     

//DB接続
require 'connection.php';
//関数をまとめたPHPファイル
require 'fuc_list.php';
//文字を一通りセットする
//株式会社にチェックが入っていた場合
if (h($_POST['stock'])) {
    $comp_name = "株式会社" . h($_POST['comp_name']);
} else {
    $comp_name = h($_POST['comp_name']);
}
$comp_URL_name = h($_POST['URL']);
$place = h($_POST['place']);
$jobs_name = h($_POST['jobs_name']);
$number = h($_POST['number']);
$monthly_salary = h($_POST['monthly_salary']);
$submission = h($_POST['submission']);
$text = h($_POST['text']);
$feature = h($_POST['feature']);
$comment = h($_POST['comment']);
$sub = h($_POST['sub']);
$date = date("Y-m-d");
//掲載中のflg
$flg = h($_POST['flg']);
$sql = 'INSERT INTO jobs (No,企業名,URL,勤務地,職種,求人数,月給,提出書類,参考書類,特徴,コメント,更新日時,募集_flg,対象) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
$stmt = $pdo->prepare($sql);
// // 値をセット
$stmt->bindValue(1, null);
$stmt->bindValue(2, $comp_name);
$stmt->bindValue(3, $comp_URL_name);
$stmt->bindValue(4, $place);
$stmt->bindValue(5, $jobs_name);
$stmt->bindValue(6, $number);
$stmt->bindValue(7, $monthly_salary);
$stmt->bindValue(8, $submission);
$stmt->bindValue(9, $text);
$stmt->bindValue(10, $feature);
$stmt->bindValue(11, $comment);
$stmt->bindValue(12, $date);
$stmt->bindValue(13, $flg);
$stmt->bindValue(14, $sub);
$stmt->execute();
$pdo = null;

header("Location: ../input.php");
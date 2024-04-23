<?php


    session_start();

        //クリックジャッキング対策
        header('X-FRAME-OPTIONS:DENY');

    if (!isset($_SESSION['tech_Token'])) {
        echo "ログインしてください";
        
        exit;
    } else if ($_SESSION['time'] < time() - 1800) {
        echo "セッションの有効期限が切れました<br>
              再びログインしてください";
        exit;
    } 


   
         
//DBデータ登録
require 'connection.php';
require 'fuc_list.php';
$place = '';
$jobs_name = '';
$submission = '';
$feature = '';
$comp_name = h($_POST['comp_name']);
$comp_URL_name = h($_POST['URL']);
for ($i = 0; count($_POST['place']) > $i; $i++) $place .= $i + 1 != count($_POST['place']) ?  h($_POST['place'][$i]) . "/" : h($_POST['place'][$i]);
for ($i = 0; count($_POST['jobs_name']) > $i; $i++) $jobs_name .= $i + 1 != count($_POST['jobs_name']) ?  h($_POST['jobs_name'][$i]) . "/" : h($_POST['jobs_name'][$i]);
$number = h($_POST['number']);
$monthly_salary = h($_POST['monthly_salary']);
for ($i = 0; count($_POST['submission']) > $i; $i++) $submission .= $i + 1 != count($_POST['submission']) ?  h($_POST['submission'][$i]) . "/" : h($_POST['submission'][$i]);
$text = h($_POST['text']);
for ($i = 0; count($_POST['feature']) > $i; $i++) $feature .= $i + 1 != count($_POST['feature']) ?  h($_POST['feature'][$i]) . "/" : h($_POST['feature'][$i]);
$comment = h($_POST['comment']);
$date = date("Y-m-d");
$flg = $_POST['check'];

// if (isset($_POST['check'])) {
//     if (($_POST['flg']) == 1) $flg = 0;
//     else $flg = 1;
// } else $flg = h($_POST['flg']);
$sql = 'UPDATE jobs SET 企業名=?,URL=?,勤務地=?,職種=?,求人数=?,月給=?,提出書類=?,参考書類=?,特徴=?,コメント=?,更新日時=?,募集_flg=?,対象=? WHERE No=?';
// $sql = 'INSERT INTO jobs (No,企業名,URL,勤務地,職種,求人数,月給,提出書類,参考書類,特徴,コメント,更新日時,募集_flg) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)';
$stmt = $pdo->prepare($sql);
// // 値をセット
$stmt->bindValue(1, $comp_name);
$stmt->bindValue(2, $comp_URL_name);
$stmt->bindValue(3, $place);
$stmt->bindValue(4, $jobs_name);
$stmt->bindValue(5, $number);
$stmt->bindValue(6, $monthly_salary);
$stmt->bindValue(7, $submission);
$stmt->bindValue(8, $text);
$stmt->bindValue(9, $feature);
$stmt->bindValue(10, $comment);
$stmt->bindValue(11, $date);
$stmt->bindValue(12, $flg);
$stmt->bindValue(13, $_POST['sub']);

$stmt->bindValue(14, $_POST['No']);

$stmt->execute();
$pdo = null;
 header("Location: ../input.php");


?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>
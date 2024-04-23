<?php

header('X-FRAME-OPTIONS:DENY');

session_start();

require 'connection.php';
//削除する連番と場所を取得
$No = $_POST["delete_No"];
$place = htmlspecialchars($_POST['delete_comp'], ENT_QUOTES, 'UTF-8');

$sql = 'delete from jobs where No="'.$No.'"';
$pdo->query($sql);


 header("Location: ../input.php");

// $job_file = file_get_contents("jobs.json"); 

// $MCjson = mb_convert_encoding($job_file, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
//配列に交換
// $job_hairetu = json_decode($MCjson,true);


//削除
// array_splice($job_hairetu, $No, 1,  null);
// $length=count($job_hairetu)-1;
// 連番の降り直し
// for($i=0;$i<=$length;$i++){
//     $job_hairetu [$i]['id']=$i;
// }

// $job=json_encode($job_hairetu,JSON_UNESCAPED_UNICODE);
// file_put_contents("jobs.json", $job);

?>
<?php
    require 'connection.php';



    //県名
    //sqlをセットする
    $sql = 'select * from place';
    //sqlを実行する
    $data_place = $pdo->query($sql);
    //データを配列に変更
    $place_array = $data_place->fetchAll();


    //sqlをセットする
$sql = 'select * from job';
//sqlを実行する
$data_job = $pdo->query($sql);
//データを配列に変更
$job_array = $data_job->fetchAll();
// var_dump($job_array);
// foreach($job_array as $job){
//     echo $job['職種'];
// }

//提出物
    //sqlをセットする
    $sql = 'select * from submission';
    //sqlを実行する
    $data_submission = $pdo->query($sql);
    //データを配列に変更
    $submission_array = $data_submission->fetchAll();


    //特徴
    //sqlをセットする
    $sql = 'select * from feature';
    //sqlを実行する
    $data_feature = $pdo->query($sql);
    //データを配列に変更
    $feature_array = $data_feature->fetchAll();
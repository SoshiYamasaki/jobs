<?php
require 'connection.php';

require 'fuc_list.php';
if ($_POST['job']!='') {
 
    $add_job = h($_POST['job']);
    $add_job_kana = h($_POST['job_kana']);
    $add_job_romaji=h($_POST['job_romaji']);

    $sql = 'INSERT INTO job (id,職種,仮名,ローマ字) VALUES (?,?,?,?)';
    $stmt = $pdo->prepare($sql);
    // // 値をセット
    $stmt->bindValue(1, null);
    $stmt->bindValue(2, $add_job);
    $stmt->bindValue(3, $add_job_kana);
    $stmt->bindValue(4, $add_job_romaji);
    $stmt->execute();
}

if ($_POST['submission']!='') {
    $add_submission = h($_POST['submission']);
    $add_submission_kana = h($_POST['submission_kana']);
    $add_submission_romaji=h($_POST['submission_romaji']);

    
    $sql = 'INSERT INTO submission (id,提出物,仮名,ローマ字) VALUES (?,?,?,?)';
    $stmt = $pdo->prepare($sql);
    // // 値をセット
    $stmt->bindValue(1, null);
    $stmt->bindValue(2, $add_submission);
    $stmt->bindValue(3, $add_submission_kana);
    $stmt->bindValue(4, $add_submission_romaji);
    

    $stmt->execute();
}
if ($_POST['feature']!='') {
    
    $add_feature = h($_POST['feature']);
    $add_feature_kana = h($_POST['feature_kana']);
    $add_feature_romaji=h($_POST['feature_romaji']);


    $sql = 'INSERT INTO feature (id,特徴,仮名,ローマ字) VALUES (?,?,?,?)';
    $stmt = $pdo->prepare($sql);
    // // 値をセット
    $stmt->bindValue(1, null);
    $stmt->bindValue(2, $add_feature);
    $stmt->bindValue(3, $add_feature_kana);
    $stmt->bindValue(4, $add_feature_romaji);

    
    $stmt->execute();
    $pdo = null;
}

 header("Location: ../add_item.php");



//  $data_jobs = [
//     "履歴書", "卒業見込証明書", "成績証明書", "健康診断書", "推薦書", "エントリーシート", "ハローワーク紹介状", "受験申込書", "ポートフォリオ", "職務経歴書", "作文"
// ];
//  foreach($data_jobs as $job){
//     $sql = 'INSERT INTO  submission (id,提出物) VALUES (?,?)';
//     $stmt = $pdo->prepare($sql);
// // // 値をセット
// $stmt->bindValue(1, null);
// $stmt->bindValue(2, $job);
// $stmt->execute();
//  }
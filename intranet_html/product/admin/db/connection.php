<?php
//データをセット
const DB_HOST = 'mysql:dbname=xs904351_icc;host=localhost;charset=utf8';
const DB_USER = 'xs904351_user';
const DB_PASSWORD = 'abcdefgh';
try {
  $pdo = new PDO(DB_HOST, DB_USER, DB_PASSWORD, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //連想配列
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //例外
    PDO::ATTR_EMULATE_PREPARES => false, //SQLインジェクション対策
  ]);
} 
catch (PDOException $e) { //DBに接続できなかったら
  echo '接続失敗' . $e->getMessage() . "\n";
  exit();
}
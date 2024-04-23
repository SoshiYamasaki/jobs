<?php

require_once('../db/connection.php');

session_start();
require_once('../db/fuc_list.php');

$id=h($_POST['id']);
$pass=h($_POST['password']);
try {
  $stmt = $pdo->prepare('select * from teachers where id = ?');
  $stmt->bindValue(1,$id);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
  //idとpasswordがDB内に存在していないか確認
  if (!isset($row['id'])) {
    $a='1';
    $hash = password_hash($pass, PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("INSERT INTO teachers VALUES(?,?,?);");
    $stmt->bindParam(1,$id,PDO::PARAM_INT);
    $stmt->bindParam(2,$hash);
    $stmt->bindValue(3,'');
    $q=$stmt->execute();
    header("Location: ok_techer.html");;
  } else {
      header("Location: error_techer.html");
  }
  
} catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}
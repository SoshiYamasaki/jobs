<?php

require_once('../db/connection.php');

session_start();
require_once('../db/fuc_list.php');

$id=h($_POST['id']);
$pass=h($_POST['password']);
try {
  $stmt = $pdo->prepare('select * from users where id = ?');
  $stmt->bindValue(1,$id);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
  //idとpasswordがDB内に存在していないか確認
  if (!isset($row['id'])) {
    $hash = password_hash($pass, PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("INSERT INTO users VALUES(?,?,?);");
    $stmt->bindParam(1,$id,PDO::PARAM_INT);
    $stmt->bindParam(2,$hash);
    $stmt->bindValue(3,'');
    $q=$stmt->execute();
    header("Location: ok_student.html");;
  } else {
      header("Location: error_student.html");
  }
  
} catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}
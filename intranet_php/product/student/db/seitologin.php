<?php

//クリックジャッキング対策
header('X-FRAME-OPTIONS:DENY');

session_start();
require_once('config.php');
require_once('fuc_list.php');

$id=h($_POST['id']);
$pass=h($_POST['password']);
try {


  $stmt = $pdo->prepare('select * from users where id = ?');
  $stmt->bindValue(1, $id);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  //idがDB内に存在しているか確認
  if (!isset($row['id'])) {
    header("Location: ../login/error_student.html");
    return false;
  }

  //$hash = password_hash(1, PASSWORD_BCRYPT);

  if (password_verify(((string)$pass), $row['password'])) {


    $_SESSION['id'] = $id;
    //セッション管理用のトークン発行
    //バイナリ文字のランダムな文字列から16進数
    $csrfToken = bin2hex(random_bytes(24));
    $_SESSION['csrfToken'] = $csrfToken;
    $_SESSION['time'] = time();
    header("Location: ../top/index.php");
  } else {
    header("Location: ../login/error_student.html");
    return false;
  }
} catch (\Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}
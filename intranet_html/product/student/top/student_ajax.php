<?php
    //DBの設定ファイルがあるところを読み出してください
    require 'config.php';

    $student_data=$_REQUEST['student_data'];
    $student_array=explode(",",$student_data);

    for($i=0;$i<count($student_array);$i=$i+2){
        $hash = password_hash($student_array[$i+1], PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("INSERT INTO users VALUES(?,?,?);");
    $stmt->bindParam(1,$student_array[$i],PDO::PARAM_INT);
    $stmt->bindParam(2,$hash);
    $stmt->bindValue(3,'');
    $q=$stmt->execute();
    }
?>
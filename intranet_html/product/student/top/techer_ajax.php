<?php
    //DBの設定ファイルがあるところを読み出してください
    require 'config.php';

    $teacher_data=$_REQUEST['teacher_data'];
    $teacher_array=explode(",",$teacher_data);

    for($i=0;$i<count($teacher_array);$i=$i+2){
        $hash = password_hash($teacher_array[$i+1], PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("INSERT INTO teacher VALUES(?,?,?);");
    $stmt->bindParam(1,$teacher_array[$i],PDO::PARAM_INT);
    $stmt->bindParam(2,$hash);
    $stmt->bindValue(3,'');
    $q=$stmt->execute();
    }
?>
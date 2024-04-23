<?php


require 'config.php';
$sql = 'select favorite from users where id="' . $_REQUEST['user_id'] . '"'; //sql
$stmt = $pdo->query($sql); //sql実行 ステートメント

$result = $stmt->fetchall();
$string = $result[0]['favorite'];

$favorite = '';
if ($string == null) {
    $favorite = $_REQUEST['company_id'];
}

//まず、現在のお気に入りに登録してあるかチェックする

else {
    $check_favorite = "";
    $check_flg = 0;
    $before_favorite = explode(",", $string);

    foreach ($before_favorite as $value) {
        if ($value != $_REQUEST['company_id']) {
            if ($value === end($before_favorite))
                $check_favorite .= $value;
            else
                $check_favorite .= $value . ",";
        } else {
            $check_flg = 1;
            if ($value === end($before_favorite))
            $check_favorite = substr($check_favorite, 0, -1);

        }
    }


if ($check_flg)
    $favorite = $check_favorite;

//現在のお気に入りに登録してなければ
else {
    array_push($before_favorite, $_REQUEST['company_id']);
    sort($before_favorite);

    foreach ($before_favorite as $value) {
        if ($value === end($before_favorite))
            $favorite .= $value;
        else
            $favorite .= $value . ",";
    }
}
}

// ログインしたユーザIdを入れる
$sql = 'UPDATE users SET favorite ="' . $favorite . '" WHERE id="' . $_REQUEST['user_id'] . '"';

$pdo->query($sql);
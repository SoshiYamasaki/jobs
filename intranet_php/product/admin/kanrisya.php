<?php


session_start();
//クリックジャッキング対策
header('X-FRAME-OPTIONS:DENY');


if (!isset($_SESSION['tech_Token'])) {
    echo "ログインしてください";

    exit;
} else if ($_SESSION['time'] < time() - 1800) {
    echo "セッションの有効期限が切れました<br>
              再びログインしてください";
    exit;
}



?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">

    <title>ICC 管理者ページ</title>

    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text.css" href="../css/reset.css">
    <link rel="stylesheet" href="css/log_form2.css">
    <link rel="stylesheet" href="css/kanrisya.css">
</head>

<body>

    <div class="theme-container grow">

        <div class="contact-con">
            <img class="logo" src="images/logo1-4.png" width="400" height="100" alt="エラー">
            <div class="contact">
                <h1>ようこそ管理者</h1>
                <table>
                    <tr>
                        <th valign="top"><img class="squar" src="images/white.jpeg" alt="[ICO]"></th>
                        <th>名前</th>
                        <th>概要</th>
                    </tr>

                    <tr>
                        <th colspan="5">
                            <hr>
                        </th>
                    </tr>

                    <tr>
                        <td valign="top"><img class="file" src="images/file.jpeg" alt="[DIR]"></td>
                        <td><a href="add_user/seitotouroku.php">seitotouroku.php</a></td>
                        <td align="center">　　生徒登録画面　　</td>
                    </tr>

                    <tr>
                        <td valign="top"><img class="file" src="images/file.jpeg" alt="[DIR]"></td>
                        <td><a href="add_user/syokutouroku.php">syokutouroku.php</a></td>
                        <td align="center">　　教職員登録画面　　</td>
                    </tr>
                    <tr>
                        <td valign="top"><img class="file" src="images/file.jpeg" alt="[DIR]"></td>
                        <td><a href="input.php">input.php</a></td>
                        <td align="center">　　求人票追加画面　　</td>
                    </tr>
                    <tr>
                        <td valign="top"><img class="file" src="images/file.jpeg" alt="[DIR]"></td>
                        <td><a href="add_item.php">add_item.php</a></td>
                        <td align="center">　　入力項目追加画面　　</td>
                    </tr>
                    <tr>
                        <td valign="top"><img class="file" src="images/file.jpeg" alt="[DIR]"></td>
                        <td><a href="../student/top/index.php">index.php</a></td>
                        <td align="center">　　教職員用ホームページログイン　　</td>
                    </tr>

                    <tr>
                        <td valign="top"><img class="file" src="images/file.jpeg" alt="[DIR]"></td>
                        <td><a href="../student/login/seitologin.html">seitologin.html</a></td>
                        <td align="center">　　生徒用ホームページログイン　　</td>
                    </tr>

                    <tr>
                        <th colspan="5">
                            <hr>
                        </th>
                    </tr>
                </table>
            </div>
            <!--<div class="block"><a href="../seitologin/seitologin.html" class="btn03 pushdown" ><span>生徒用ログインページに戻る</span></a></div>-->
        </div>
        <canvas id="waveCanvas"></canvas>
        <div class="footer">
            <footer>Made by Trafix | &#169;&#65039;2023</footer>
        </div>
    </div>
    <script src="js/log_form.js"></script>
</body>

</html>
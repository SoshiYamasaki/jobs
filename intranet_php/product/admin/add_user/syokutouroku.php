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

    <title>ICC 教職員登録用画面</title>

    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text.css" href="../css/reset.css">
    <link rel="stylesheet" href="../css/log_form1.css">
</head>

<body>

    <div class="theme-container grow">

        <div class="contact-con">
            <img class="logo" src="../images/logo1-4.png" width="400" height="100" alt="エラー">
            <div class="contact">
                <p>新規登録(教職員)</p>

                <form action="syokutouroku_check.php" class="form_log" autocomplete="off" method="post">
                    <div class="input-group first">
                        <input id="user" required="" type="text" name="id" class="input">
                        <label class="user-label">登録するID</label>
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" required class="input">
                        <label for="password" class="user-label">登録するPASSWORD</label>
                    </div>
                    <div class="btn">
                        <button type="submit" class="cta" id="btn">
                            <span class="hover-underline-animation">登録する</span>
                            <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="30" height="10" viewBox="0 0 46 16">
                                <path id="Path_10" data-name="Path 10" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" transform="translate(30)">
                                </path>
                            </svg>
                        </button>
                    </div>
                </form>
                <div class="block"><a href="seitotouroku.php">生徒登録のフォームはこちら</a>
                    <p><br></p>
                </div>
                <div class="block"><a href="../kanrisya.php">管理者ページに戻る</a></div>
            </div>

        </div>
        <div class="footer">
            <footer>Made by Trafix | &#169;&#65039;2023</footer>
        </div>

    </div>
</body>

</html>
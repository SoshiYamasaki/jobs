<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <?php
    //クリックジャッキング対策
    header('X-FRAME-OPTIONS:DENY');


    session_start();

    if (!isset($_SESSION['csrfToken'])) {
        echo "ログインしてください";
        exit;
    } else if ($_SESSION['time'] < time() - 1800) {
        echo "セッションの有効期限が切れました<br>
              再びログインしてください";
        exit;
    } 
    ?>
        <title>管理用ページ</title>
        <link rel="stylesheet" href="../css/teacher.css">
    </head>
    <body>
        <header>
            <h1>管理用ページ</h1>
        </header>
        <div class="main">
            <ul>
                <li>
                    <a href="#">求人票入力ページ</a>
                </li>
                <li>
                    <a href="#">生徒登録ページ</a>
                </li>
                <li>
                    <a href="#">教職員登録ページ</a>
                </li>
            </ul>
        </div>
    </body>
</html>
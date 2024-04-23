<?php

    session_start();
    //クリックジャッキング対策
    header('X-FRAME-OPTIONS:DENY');



    if (!isset($_SESSION['csrfToken'])) {
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

        <title>iccイントラ_NEWS</title>
        
        <link rel="stylesheet" href="../css/select2.min.css">
        <link rel="stylesheet" href="../css/news.css">
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script src="../js/select2/select2.min.js">
        </script>
        <script src="../js/()select2.js" defer>
        </script>
    </head>
    <body>
        <header>
            <h1>
                 <a href="#"><img style="width: 500px; height:140px;" src="../images/logo1-4.png"></a>
            </h1>
            <nav>
                <ul>
                    <li class=”current”><a href="index.php">Home</a></li>
                    <li><a href="News.php">News</a></li>
                    <li><a href="Link.php">Link</a></li>
                </ul>
            </nav>
        </header>
        <div class="news">
            <div class="school">
                <h2>学校からのお知らせ</h2>
                <ul>
                    <!--日付はdatetimeの隣にある数字のところにそれぞれ西暦-月-日を書いてください
                        ＃のところにリンクをお願いします。
                    -->
                    <li><time datetime="2022-12-14">２０２２年１２月１４日</time><a href="#">お知らせを記入してください</a></li>
                    <li><time datetime="2022-12-14">２０２２年１２月１４日</time><a href="#">お知らせを記入してください</a></li>
                    <li><time datetime="2022-12-14">２０２２年１２月１４日</time><a href="#">お知らせを記入してください</a></li>
                    <li><time datetime="2022-12-14">２０２２年１２月１４日</time><a href="#">お知らせを記入してください</a></li>
                    <li><time datetime="2022-12-14">２０２２年１２月１４日</time><a href="#">お知らせを記入してください</a></li>
                    <li><time datetime="2022-12-14">２０２２年１２月１４日</time><a href="#">お知らせを記入してください</a></li>
                    <li><time datetime="2022-12-14">２０２２年１２月１４日</time><a href="#">お知らせを記入してください</a></li>
                    <li><time datetime="2022-12-14">２０２２年１２月１４日</time><a href="#">お知らせを記入してください</a></li>
                </ul>
            </div>
            <div class="student">
                <h2>生徒会からのお知らせ</h2>
                <ul>
                    <li><time datetime="2022-12-14">２０２２年１２月１４日</time><a href="#">お知らせを記入してください</a></li>
                    <li><time datetime="2022-12-14">２０２２年１２月１４日</time><a href="#">お知らせを記入してください</a></li>
                    <li><time datetime="2022-12-14">２０２２年１２月１４日</time><a href="#">お知らせを記入してください</a></li>
                    <li><time datetime="2022-12-14">２０２２年１２月１４日</time><a href="#">お知らせを記入してください</a></li>
                    <li><time datetime="2022-12-14">２０２２年１２月１４日</time><a href="#">お知らせを記入してください</a></li>
                    <li><time datetime="2022-12-14">２０２２年１２月１４日</time><a href="#">お知らせを記入してください</a></li>
                    <li><time datetime="2022-12-14">２０２２年１２月１４日</time><a href="#">お知らせを記入してください</a></li>
                    <li><time datetime="2022-12-14">２０２２年１２月１４日</time><a href="#">お知らせを記入してください</a></li>
                </ul>
            </div>
        </div>
        <a href="#" id="page-top">TOP</a>
        <footer>
            <small>icc2022intoranet_</small>
        </footer>
    </body>
</html>
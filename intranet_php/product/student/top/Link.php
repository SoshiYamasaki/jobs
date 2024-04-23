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

        <title>iccイントラ_Link</title>
        <link rel="stylesheet" href="../css/link.css">
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
        <div class="link_first">
            <p>各種リンク欄</p>
        </div>
        <div class="link_menu">
            <div class="findwork">
                <h2>
                    就職関連
                </h2>
                <ul>
                    <li>
                        <a href="#">会社受験手続き手順</a>
                    </li>
                    <li>
                        <a href="#">各種訪問届（企業説明会、採用試験、健康診断　ほか）</a>
                    </li>
                    <li>
                        <a href="#">採用受験報告書</a>
                    </li>
                    <li>
                        <a href="#">履歴書記入サンプル</a>
                    </li>    
                    <li>
                        <a href="#">志望動機下書き用紙</a>
                    </li>
                    <li>
                        <a href="#">志望動機の書き方</a>
                    </li> 
                    <li>
                        <a href="#">就活全般に関する資料</a>
                    </li>
                    <li>
                        <a href="1_ago.php">1年前の求人票</a>
                    </li>
                    <li>
                        <a href="2_ago.php">2年前の求人票</a>
                    </li>
                </ul>
            </div>
            <div class="internal_link">
                <h2>学校関連</h2>
                <ul>
                    <li>
                        <a href="#">ICC公式サイト</a>
                    </li>
                    <li>
                        <a href="#">スクールバス</a>
                    </li>
                    <li>
                        <a href="#">学生便覧</a>
                    </li>
                    <li>
                        <a href="#">年間行事</a>
                    </li>
                    <li>
                        <a href="#">校内無線LAN</a>
                    </li>
                </ul>
            </div>
            <div class="external_link">
                <h2>外部リンク</h2>
                <ul>
                    <li>
                        <a href="#">Google</a>
                    </li>
                    <li>
                        <a href="https://job.mynavi.jp/2024/?gclid=EAIaIQobChMI5vedleu-_AIVmK2WCh0vaQsxEAAYASAAEgLaTPD_BwE">マイナビ</a>
                    </li>
                    <li>
                        <a href="https://job.rikunabi.com/2024/accounts/regist/profile/?vos=ev24prap1000x0024647">リクナビ</a>
                    </li>
                    <li>
                        <a href="https://n-navi.pref.nagasaki.jp/">Nナビ</a>
                    </li>
                    <li>
                        <a href="https://www.hellowork.mhlw.go.jp/">ハローワークインターネットサービス</a>
                    </li>
                </ul>
            </div>
        </div>
        <a href="#" id="page-top">TOP</a>
        <footer>
            <small>icc2022intoranet_</small>
        </footer>
    </body>
</html>
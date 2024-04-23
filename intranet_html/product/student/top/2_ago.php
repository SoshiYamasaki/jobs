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
    <?php
    require '../db/read_selectitem.php';
    require '../db/fuc_list.php';
    ?>
    <title>iccイントラ</title>

    <link rel="stylesheet" href="../css/select2.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/star.css">


    <script type="text/javascript" src="../js/jquery.js"></script>
    <script src="../js/select2/select2.min.js"></script>
    <script src="../js/sort.js"></script>
    <!-- <script src="../js/hiragana2romaji.js"></script> -->
    <script src="../js/()select2.js" defer></script>

    <?php if (isset($_SESSION['id'])) { ?>
        <script src="../js/colorhyouji.js" defer></script>
    <?php } ?>
    <style rel="stylesheet" id='stylesheet' type='text/css'></style>

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
    <div class="body_1">
        <div class="container">
            <img class="image" src="../images/sky.jpg">
            <img class="image" src="../images/TKL0614_26_TP_V.jpg">
            <img class="image" src="../images/sutu.jpg">
        </div>
        <div class="op">
            <p>
                いさはやコンピュータ・カレッジ<br>
                就職求人サイト
            </p>
            <p class="ed">ICCイントラネット</p>
        </div>
    </div>
    <div class="news">
        <p class="news_1"><a href="News.php">News</a></p>
        <ul class="news-list">
            <li class="item">
                <a href="#">
                    <p class="date">2020/4/15</p>
                    <p class="category"><span>お知らせ</span></p>
                    <p class="title">ここにお知らせが入りますここにお知らせが入りますここにお知らせが入ります</p>
                </a>
            </li>
            <li class="item">
                <a href="#">
                    <p class="date">2020/4/15</p>
                    <p class="category"><span>お知らせ</span></p>
                    <p class="title">ここにお知らせが入りますここにお知らせが入りますここにお知らせが入ります</p>
                </a>
            </li>
            <li class="item">
                <a href="#">
                    <p class="date">2020/4/15</p>
                    <p class="category"><span>お知らせ</span></p>
                    <p class="title">ここにお知らせが入りますここにお知らせが入りますここにお知らせが入ります</p>
                </a>
            </li>
            <li class="item">
                <a href="#">
                    <p class="date">2020/4/15</p>
                    <p class="category"><span>お知らせ</span></p>
                    <p class="title">ここにお知らせが入りますここにお知らせが入りますここにお知らせが入ります</p>
                </a>
            </li>
        </ul>
    </div>

    <div class="kyujin">
        <p>求人検索</p>
    </div>
    <div class="setumei">
        <ul>
            <li class="student">学生用求人</li>
            <li class="itaku">委託訓練用求人</li>
            <li class="common">共通</li>
            <li class="end">掲載終了</li>
        </ul>
    </div>
    <div class="research_1">
        <!-- 
                    <p class="kaisya">
                    会社: <span id="selectco"></span></p>
                    <p class="kenmei">
                    県名: <span id="selectlocation"></span></p>
                    <p class="occupation">
                    職種: <span id="selectsyoku"></span></p> -->
        <div class="kensaku_1">
            <h2>検索フォーム</h2>
            <select id="com" multiple>
            </select>


            <select id="location" style="width: 300px;" multiple="multiple">
                <option disabled>県内</option>
                <?php foreach ($place_array as $place): ?>
                    <?php
                    if ($place["勤務地"] === "九州")
                        print '<option disabled>県外 </option>';
                    print '<option value=' . $place["勤務地"] . ' data-sub-search=' . $place["仮名"] . ' data-sub-two-search=' . $place["ローマ字"] . '>' . $place['勤務地'] . '</option>'; ?>

                    ?>
                <?php endforeach; ?>
            </select>
            <select id="syoku" style="width: 300px;" multiple="multiple">
                <?php foreach ($job_array as $job): ?>
                    <?php
                    print '<option value=' . $job["職種"] . ' data-sub-search=' . $job["仮名"] . ' data-sub-two-search=' . $job["ローマ字"] . '>' . $job['職種'] . '</option>'; ?>
                <?php endforeach; ?>
            </select>
            <input type="button" value="検索" onclick="kensaku()">
            <input type="button" value="クリア" onclick="reset()">
            <div class="tyui">
                <p>※検索条件とソートのリセットは検索ボタンの隣にあるクリアボタンを押してください</p>
            </div>
            <div class="favo">
                <input type="button" class="botan" value="お気に入りを絞り込む！" onclick="buttonClick()">
            </div>
        </div>

        <div id="job_table">

            <!-- idとclassとsort.jsの追加style.cssを変更しました12_15 荒木 -->
            <div id="titles" class="job_title">
                <div id="number_reset" class="number_s">
                    <p>番号</p>
                </div>
                <div class="company_s">
                    <p>会社名</p>
                </div>
                <div class="prefecture_s">
                    <p>勤務地</p>
                </div>
                <div class="Profession_s">
                    <p>職種</p>
                </div>
            </div>
            <div id="table">
                <?php
                //sqlをセットする
                $sql = 'select * from jobs';
                //sqlを実行する
                $data = $pdo->query($sql);
                //データを配列に変更
                $data_array = $data->fetchAll();
                //データが無かった場合
                if ($data_array == null) {
                    return;
                }
                $id = 1;
                foreach ($data_array as $row): ?>
                    <?php 
                    
                    $data = (int) (date('y')) -2;
                    $data = (string) $data . "卒";
                
                    $before_data = (int) (date('y'))-1 ;
                    $before_data = (string) $before_data . "卒";
                
                    $month = date('m');
                    if (($before_data == $row['対象'] && $month >= "03") || ($data == $row['対象'] && $month <= "02")) { ?>
                        <div id=<?php echo $id; ?> class="job_goo">
                            <div class="job_main">
                                <div class="number">
                                    <?php
                                    echo $id;

                                    ?>
                                </div>
                                <div class="company">
                                    <a href=<?php echo $row['URL']; ?>>
                                        <?php
                                        echo $row['企業名'];
                                        ?>
                                    </a>
                                </div>
                                <div class="prefecture">
                                    <?php
                                    echo $row['勤務地'];
                                    ?>
                                </div>
                                <div class="Profession">
                                    <?php
                                    echo $row['職種'];
                                    ?>
                                </div>




                        




                                <div class="job_name">
                                    職種：
                                </div>
                                <div class="job_tiki">
                                    勤務地：
                                </div>
                             <div class="job_posting">
                                    <?php
                                    if (isset($row['参考書類'])) {
                                        //求人票以外(パンフレット等)ある場合は配列にする
                                        $refer_doc = array_push_string($row["参考書類"]);
                                        //今のところ[0]が求人票、[1]がパンフレットの予定
                                        print '<a href=job/help-wanted/' . $refer_doc[0] . '>求人票PDF</a>';
                                        ?>
                                    </div>
                                    <div class="job_pamphlet">
                                        <?php if (isset($refer_doc[1]))
                                            print '<a href=job/kigyou_panhu/' . $refer_doc[1] . '>パンフレット</a>';?>
                                    </div>
                                    
                                <?php } ?>
                            <div class="detail">
                                <input id="acd-check<?php echo $id; ?>" class="acd-check" type="checkbox">
                                <label class="acd-label" for="acd-check<?php echo $id; ?>">詳細はコチラ</label>
                                <div class="acd-content">
                                    <div class="a1">
                                        月給:
                                    </div>
                                    <div class="a2">
                                        人数:
                                    </div>
                                    <div class="a3">
                                        提出書類:
                                    </div>
                                    <div class="a4">
                                        特徴:
                                    </div>
                                    <div class="a5">
                                        コメント:
                                    </div>
                                    <div class="a1_1">
                                        <?php echo $row['月給']; ?>
                                    </div>
                                    <div class="a2_1">
                                        <?php echo $row['求人数'] ; ?>
                                    </div>
                                    <div class="a3_1">
                                        <?php echo $row['提出書類']; ?>
                                    </div>
                                    <div class="a4_1">
                                        <?php echo $row['特徴']; ?>
                                    </div>
                                    <div class="a5_1">
                                        <?php echo $row['コメント']; ?>
                                    </div>
                                </div>
                            </div>


                            <div class="flag">
                                <?php
                                echo $row['募集_flg'];
                                ?>
                            </div>
                        </div>
                        <?php $id++; ?>
                    <?php } ?>
                <?php endforeach; ?>

            </div>



        </div>
        <div style="width:60%;margin: 0% 20%;">
            <iframe src="https://www.google.com/calendar/embed?src=iccjob%40isahaya-cc.ac.jp&amp;ctz=Asia/Tokyo"
                style="border: 0" width="100%" height="700" frameborder="0" scrolling="no"></iframe>
            
        </div>
        <a href="#" id="page-top">TOP</a>
        <footer>
            <small>icc2022intoranet_</small>
        </footer>

        <script>
            var id_list = "";
            for (i = 1; i != <?php echo $id; ?>; i++) {


                if (i + 1 != <?php echo $id; ?>)
                    id_list += String(i) + ",";
                else
                    id_list += String(i);

            }

            <?php if (isset($_SESSION['id'])) {
                $sql = 'select favorite from users where id="' . $_SESSION['id'] . '"'; //sql
            
                $stmt = $pdo->query($sql); //sql実行 ステートメント
            
                $result = $stmt->fetchall();
                $string = $result[0]['favorite']; ?>
                favorite = "<?php echo $string ?>";
                const asyncSend = (id) => {
                    var req = new XMLHttpRequest(); //XMLHttpReqestオブジェクトを生成する

                    req.open('POST', '../db/favorite_ajax.php', true);
                    req.setRequestHeader('content-type',
                        'application/x-www-form-urlencoded;charset=UTF-8');
                    const user_id = <?php echo $_SESSION['id']; ?>;
                    req.send('company_id=' + encodeURIComponent(id) + '&' + 'user_id=' + encodeURIComponent(user_id));
                    // req.send();

                    // })
                }
            <?php } ?>
        </script>

</body>

</html>
<?php
//クリックジャギング対策
header('X-FRAME-OPTIONS:DENY');
session_start();
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
    <title>送信フォーム</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="robots" content="noindex,nofollow" />


    <!-- CSS -->
    <style rel="stylesheet" id='stylesheet' type='text/css'></style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="local/Bootstrap.css" crossorigin="anonymous">
    <!-- select2 css -->
    <link rel="stylesheet" href="local/select2.css">
    <!-- バリデーションのcss -->
    <link rel="stylesheet" href="local/validation.css" type="text/css">
    <!-- 自分のcss -->
    <link rel="stylesheet" href="css/my_style.css" type="text/css">
    <link rel="stylesheet" href="local/jquery.css">

    <!-- JS -->
    <!-- Bootstrap js -->
    <scrip src="local/Bootstrap.js" crossorigin="anonymous">
        </script>
        <!-- jquery -->
        <script src="local/jquery.js" type="text/javascript"></script>
        <!-- select2 js -->
        <script src="local/select2.js"></script>
        <!-- バリデーションのjs -->
        <script src="local/validation.js" type="text/javascript" charset="utf-8"></script>
        <!-- バリデーションの言語js -->
        <script src="local/validation_lang.js" type="text/javascript" charset="utf-8"></script>
        <script src="local/jquery_last.js"></script>
        <!-- 自分のjs  -->
        <link rel="stylesheet" href="css/style.css">


        <script src="js/conf.js" type="text/javascript"></script>
        <script src="js/select2.js" type="text/javascript" defer></script>



        <script src="js/sort.js"></script>

</head>

<body>
    <header>
        <div class="headerback">
            <h1>入力フォーム</h1>
            <p class="p_margin">Icc Web Page</p>
        </div>
    </header><!-- <input id="keyword"> -->
    <?php

    //関数をまとめたPHPファイル
    require_once('db/read_selectitem.php');
    require_once('db/fuc_list.php');

    //1ページ目なら(確認ボタンを押していない)
    if (!isset($_POST['btn_confirm'])) {
        $pageFlag = 1;
    }
    //2ページ目
    else
        $pageFlag = 2;


    //1ページ目なら
    if ($pageFlag === 1) : ?>

        <div class="input">


            <!-- classはBootstrapを適用したものが多い-->
            <div class="container ">
                <div class="row">
                    <div class="col-lg-10">
                        <form id="formCheck" action="input.php" method="post">
                            <div class="form-group">
                                <label class="control-label">企業名</label>
                                <input class="validate[required] form-control" value="<?php if (isset($_POST['comp_name']))
                                                                                            echo h($_POST['comp_name']); ?>" type="text" name="comp_name" autocomplete="off">
                                <label class="form-checkbox">株式会社 <input type="checkbox" class="form-checkbox2" name="stock" value="1" checked></label>

                            </div>

                            <div class="form-group">
                                <label class="control-label">ホームページのURL</label>
                                <input class="validate[required,custom[url]] form-control" type="text" name="URL" value="<?php if (isset($_POST['URL']))
                                                                                                                             echo h($_POST['URL']);?>" placeholder="https://google.com" autocomplete="off">
                            </div>

                            <div id='a' class="form-group">
                                <label class="control-label">勤務地</label>
                                <!-- selectのデータは下の方(260行目)jqueryの中 -->
                                <select id="place_list" class="validate[required]  form-control" name='place[]' multiple>
                                    <optgroup label="県内"> </optgroup>
                                    <?php foreach ($place_array as $place) : ?>
                                        <?php
                                        if ($place["勤務地"] === "九州")
                                            print '<optgroup label="県外"> </optgroup>';
                                        print '<option value=' . $place["勤務地"] . ' data-sub-search=' . $place["仮名"] . ' data-sub-two-search=' . $place["ローマ字"] . '>' . $place['勤務地'] . '</option>'; ?>
                                    <?php endforeach; ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label">職種</label>
                                <select id="jobs_name_list" class="form-control validate[required]" name='jobs_name[]' multiple>
<option value="">▼選択して下さい</option>
                                    <?php foreach ($job_array as $job) : ?>
                                        <?php
                                        print '<option value=' . $job["職種"] . ' data-sub-search=' . $job["仮名"] . ' data-sub-two-search=' . $job["ローマ字"] . '>' . $job['職種'] . '</option>'; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label">求人数</label>
                                <input type="text" class="validate[required] form-control" name="number" value="<?php if (isset($_POST['number']))
                                                                                                                    echo h($_POST['number']);?>" placeholder="○人" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label class="control-label">月給</label>
                                <select class="validate[required] form-control" name='monthly_salary'>
                                    <option value="">▼選択して下さい</option>
                                    <option value="~16万円" <?php if (!empty($_POST['monthly_salary'])) if (h($_POST['monthly_salary']) == '~16万円')
                                                                echo 'selected' ?>>
                                        ~16万円
                                    </option>
                                    <option value="~17万円" <?php if (!empty($_POST['monthly_salary'])) if (h($_POST['monthly_salary']) == '~17万円')
                                                                echo 'selected' ?>>
                                        ~17万円
                                    </option>
                                    <option value="~18万円" <?php if (!empty($_POST['monthly_salary'])) if (h($_POST['monthly_salary']) == '~18万円')
                                                                echo 'selected' ?>>
                                        ~18万円
                                    </option>
                                    <option value="~19万円" <?php if (!empty($_POST['monthly_salary'])) if (h($_POST['monthly_salary']) == '~19万円')
                                                                echo 'selected' ?>>
                                        ~19万円
                                    </option>
                                    <option value="~20万円" <?php if (!empty($_POST['monthly_salary'])) if (h($_POST['monthly_salary']) == '~20万円')
                                                                echo 'selected' ?>>
                                        ~20万円
                                    </option>
                                    <option value="~21万円" <?php if (!empty($_POST['monthly_salary'])) if (h($_POST['monthly_salary']) == '~21万円')
                                                                echo 'selected' ?> >
                                        ~21万円
                                    </option>
                                    <option value="~22万円" <?php if (!empty($_POST['monthly_salary'])) if (h($_POST['monthly_salary']) == '~22万円')
                                                                echo 'selected' ?>>
                                        ~22万円
                                    </option>
                                    <option value="~23万円" <?php if (!empty($_POST['monthly_salary'])) if (h($_POST['monthly_salary']) == '~23万円')
                                                                echo 'selected' ?>>
                                        ~23万円
                                    </option>
                                    <option value="~24万円" <?php if (!empty($_POST['monthly_salary'])) if (h($_POST['monthly_salary']) == '~24万円')
                                                                echo 'selected' ?>>
                                        ~24万円
                                    </option>
                                    <option value="24万円以上" <?php if (!empty($_POST['monthly_salary'])) if (h($_POST['monthly_salary']) == '24万円以上')
                                                                echo 'selected' ?>>
                                        24万円以上
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label">提出書類</label>
                                <select id="submission" class="validate[required] form-control" name='submission[]' autocomplete="off" multiple>
                                    <?php foreach ($submission_array as $sub) : ?>
                                        <?php
                                        print '<option value=' . $sub["提出物"] . ' data-sub-search=' . $sub["仮名"] . ' data-sub-two-search=' . $submission["ローマ字"] . '>' . $sub['提出物'] . '</option>'; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label">参考書類</label>
                                <input type="text" class="form-control" placeholder="ファイルをドロップしてください" id='ddarea' name="text" value="<?php if (isset($_POST['text']))
                                                                                                                                            echo h($_POST['text']);
                                                                                                                                       ?>" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label class="control-label">特徴</label>
                                <select id="feature" class="validate[required] form-control" name='feature[]' multiple>
                                    <?php foreach ($feature_array as $feature) : ?>
                                        <?php
                                        print '<option value=' . $feature["特徴"] . ' data-sub-search=' . $feature["仮名"] . ' data-sub-two-search=' . $feature["ローマ字"] . '>' . $feature['特徴'] . '</option>'; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label">対象</label>
                                <select class="validate[required] form-control" name='sub'>
                                    <option value="">▼選択して下さい</option>
                             

                                    <?php for ($i = 23; $i <= 123; $i++) { ?>
                                        <option value="<?php echo $i; ?>卒" <?php if (!empty($_POST['sub'])) if (h($_POST['sub']) == $i . "卒") echo 'selected'; ?>>
                                            <?php echo $i; ?>卒
                                        </option>
                                    <?php } ?>

                                </select>
                            </div>
                            <!-- validate[required]  -->
                            <div class="form-group">
                                <label class="control-label">コメント</label>
                                <textarea rows="4" class="form-control" name='comment' placeholder="一言コメント" autocomplete="off"><?php if (isset($_POST['comment']))
                                                                                                            echo h($_POST['comment']); ?></textarea>
                            </div>

                            <!-- check状態のPHP -->
                            <?php
                            if (!isset($_POST['flg']) || $_POST['flg'] == 1) {
                                $check_flg = 1;
                            } else if ($_POST['flg'] == 2) $check_flg = 2;
                            else if ($_POST['flg'] == 3) $check_flg = 3;


                            ?>
                            <div class="form-group">
                                <label for="label_1">通常</label>
                                <input type="radio" id="label_1" value=1 name="flg" <?php if (!isset($_POST['flg']) || $_POST['flg'] == 1) echo 'checked'; ?>>
                                <label for="label_2">共通</label>
                                <input type="radio" id="label_2" value=2 name="flg" <?php if (isset($_POST['flg']) && $_POST['flg'] == 2) echo 'checked'; ?>>
                                <label for="label_3">委託訓練用求人</label>
                                <input type="radio" id="label_3" value=3 name="flg" <?php if (isset($_POST['flg']) && $_POST['flg'] == 3) echo 'checked'; ?>>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-info btn-size" type="submit" value="確認する" name='btn_confirm'>
                            </div>
                            <input type="hidden" name="csrf" value="<?php echo $token; ?>">
                            <input type="hidden" name="id" value="<?php echo 1; ?>">


                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <?php

        //データベースから今ある求人データを出力
        require_once('db/read.php');
        ?>

    <?php endif; ?>

    <!-- 2ページ目(確認画面) -->
    <?php if ($pageFlag === 2) : ?>

        <link rel="stylesheet" id="stylesheet" type="text/css">


        <div id="job_table">
            <!-- idとclassとsort.jsの追加style.cssを変更しました12_15 荒木 -->

            <div id="table">

                <?php
                $id = $_POST['id'];
                ?>
                <div id=<?php echo $id; ?> class="job_goo">
                    <div class="job_main">
                        <div class="number">
                            <?php

                            echo $id;

                            ?>
                        </div>
                        <div class="company">
                            <a href="<?php echo $_POST['URL']; ?>">
                                <?php
                                if ($_POST['stock'] != 1)
                                    echo h($_POST['comp_name']);
                                else
                                    echo "株式会社" . h($_POST['comp_name']); ?>

                            </a>
                        </div>
                        <div class="prefecture">
                            <?php foreach ($_POST['place'] as $job_place) {
                                $length = count($_POST['place']) - 1;
                                if ($_POST['place'][$length] != $job_place)
                                    echo h($job_place) . ' /';
                                else
                                    echo h($job_place);
                            } ?>
                        </div>
                        <div class="Profession">

                            <?php foreach ($_POST['jobs_name'] as $job) {
                                $length = count($_POST['jobs_name']) - 1;

                                if ($_POST['jobs_name'][$length] != $job)
                                    echo h($job) . ' /';
                                else
                                    echo h($job);
                            } ?>

                        </div>




                        <div class="job_name">
                            職種：
                        </div>
                        <div class="job_tiki">
                            勤務地：
                        </div>



                        <?php
                        if (isset($_POST['text'])) { ?>
                            <div class="job_posting">
                                <?php
                                //求人票以外(パンフレット等)ある場合は配列にする
                                $refer_doc = array_push_string($_POST['text']);
                                //今のところ[0]が求人票、[1]がパンフレットの予定
                                print '<a href=../student/top/job/help-wanted/' . h($refer_doc[0]) . ' target="_blank">求人票PDF</a>';
                                ?>
                            </div>
                            <div class="job_pamphlet">
                                <?php if (isset($refer_doc[1]))
                                    print '<a href=../student/top/job/kigyou_panhu/' . h($refer_doc[1]) . ' target="_blank">パンフレット</a>'; ?>
                            </div>

                        <?php } ?>

                    </div>



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
                                <?php echo h($_POST['monthly_salary']); ?>

                            </div>
                            <div class="a2_1">
                                <?php echo h($_POST['number']); ?>
                            </div>
                            <div class="a3_1">
                                <?php foreach ($_POST['submission'] as $submission) {
                                    $length = count($_POST['submission']) - 1;

                                    if ($_POST['submission'][$length] != $submission)
                                        echo h($submission) . ' /';
                                    else
                                        echo h($submission);
                                } ?>
                            </div>
                            <div class="a4_1">
                                <?php foreach ($_POST['feature'] as $feature) {
                                    $length = count($_POST['feature']) - 1;

                                    if ($_POST['feature'][$length] != $feature)
                                        echo h($feature) . ' /';
                                    else
                                        echo h($feature);
                                } ?>
                            </div>
                            <div class="a5_1">
                                <?php echo h($_POST['comment']); ?>
                            </div>
                        </div>
                    </div>


                    <div class="flag">
                        <?php
                        echo h($_POST['flg']);
                        ?>
                    </div>
                </div>

            </div>
        </div>
        <!-- 戻るボタン -->
        <form method="POST" class="btn_width" action="input.php">
            <input type="submit" class="btn_ btn-info" name="back" value="戻る">
            <!-- 戻るボタンを押しても入力した値が消えないようにする -->
            <input type="hidden" name="comp_name" value="<?php echo h($_POST['comp_name']); ?>">
            <input type="hidden" name="stock" value="<?php if (isset($_POST['stack'])) echo h($_POST['stock']); ?>">
            <input type="hidden" name="URL" value="<?php echo h($_POST['URL']); ?>">
            <?php foreach ($_POST['place'] as $job_place) : ?>
                <input type="hidden" name="place[]" value="<?php echo h($job_place); ?>">
            <?php endforeach; ?>
            <?php foreach ($_POST['jobs_name'] as $job) : ?>
                <input type="hidden" name="jobs_name[]" value="<?php echo h($job); ?>">
            <?php endforeach; ?>
            <input type="hidden" name="number" value="<?php echo h($_POST['number']); ?>">
            <input type="hidden" name="monthly_salary" value="<?php echo h($_POST['monthly_salary']); ?>">
            <?php foreach ($_POST['submission'] as $submission) : ?>
                <input type="hidden" name="submission[]" value="<?php echo h($submission); ?>">
            <?php endforeach; ?>
            <input type="hidden" name="text" value="<?php echo h($_POST['text']); ?>">
            <?php foreach ($_POST['feature'] as $feature) : ?>
                <input type="hidden" name="feature[]" value="<?php echo h($feature); ?>">
            <?php endforeach; ?>
            <input type="hidden" name="comment" value="<?php echo h($_POST['comment']); ?>">
            <input type="hidden" name="sub" value="<?php echo h($_POST['sub']); ?>">
            <input type="hidden" name="flg" value="<?php echo h($_POST['flg']); ?>">

            <input type="hidden" name="csrf" value="<?php echo h($_POST['csrf']); ?>">
        </form>
        <form method="POST" class="btn_width" action="db/write.php">

            <input type="submit" class="btn_ btn-info" name="btn_submit" value="登録する">
            <!-- 本来はhiddenではなくCSSを適用したものを送る予定です(テスト)-->
            <input type="hidden" name="comp_name" value="<?php if ($_POST['stock'] != 1)
                                                                echo h($_POST['comp_name']);
                                                            else
                                                                echo "株式会社" . h($_POST['comp_name']); ?>">
            <input type="hidden" name="stock" value="<?php if (isset($_POST['stack'])) echo h($_POST['stock']);
                                                        else ?>">
            <input type="hidden" name="URL" value="<?php echo h($_POST['URL']); ?>">
            <!-- 現在配列でPOSTに入っているので配列を渡して連結させた文字列で返す関数 -->
            <input type="hidden" name="place" value="<?php echo Concatenation_slash($_POST['place']); ?>">
            <input type="hidden" name="jobs_name" value="<?php echo Concatenation_slash($_POST['jobs_name']); ?>">
            <input type="hidden" name="number" value="<?php echo h($_POST['number']); ?>">
            <input type="hidden" name="monthly_salary" value="<?php echo h($_POST['monthly_salary']); ?>">
            <input type="hidden" name="submission" value="<?php echo Concatenation_slash($_POST['submission']); ?>">
            <input type="hidden" name="text" value="<?php echo h($_POST['text']); ?>">
            <input type="hidden" name="feature" value="<?php echo Concatenation_slash($_POST['feature']); ?>">
            <input type="hidden" name="comment" value="<?php echo h($_POST['comment']); ?>">
            <input type="hidden" name="sub" value="<?php echo h($_POST['sub']); ?>">
            <input type="hidden" name="flg" value="<?php echo h($_POST['flg']); ?>">
            <input type="hidden" name="csrf" value="<?php echo $_POST['csrf']; ?>">
        </form>

        <script defer>
            //末尾のflagを参照して行のbackgroundcolorを変える
            let harfText = document.getElementsByClassName("job_goo");
            var i = 0;

            if (harfText[i].lastElementChild.textContent == 0) {
                harfText[i].style.backgroundColor = 'rgb(204, 204, 204)';
            } else if (harfText[i].lastElementChild.textContent == 2) {
                harfText[i].style.backgroundColor = 'rgb(255, 155, 155)';
            } else if (harfText[i].lastElementChild.textContent == 3) {
                harfText[i].style.backgroundColor = 'rgb(239, 206, 0)';
            }
            var height = 0;
            //高さ調整用js


            var mainco, mainpre, mainpro, maintiki, mainname, width, height, datail, margin, heighttop;
            var submain, sub_a1, sub_a2, sub_a3, sub_a4, sub_a5;
            var Documentsub, Feature, Comme;
            var smtm = '';


            //詳細をクリックする前の高さ調整
            id = document.getElementById("1");
            mainco = id.getElementsByClassName("company");
            mainpre = id.getElementsByClassName("prefecture");
            mainpro = id.getElementsByClassName("Profession");

            if (mainco[0].offsetHeight >= 73 || mainpre[0].offsetHeight >= 44 || mainpro[0].offsetHeight >= 44) {
                height = mainco[0].offsetHeight + 48; //会社名の高さ
                maintiki = id.getElementsByClassName("job_tiki");
                mainname = id.getElementsByClassName("job_name");
                heighttop = String(height) + 'px';
                maintiki[0].style.top = heighttop; //調整した勤務地の高さ
                mainpre[0].style.top = heighttop;
                height += mainpre[0].offsetHeight + 20;
                heighttop = String(height) + 'px';
                mainpro[0].style.top = heighttop; //調整した職種の高さ
                mainname[0].style.top = heighttop;
                height += mainname[0].offsetHeight;


            } else {
                height += mainco[0].offsetHeight;
                height += mainpre[0].offsetHeight;
                height += 40;
            }


            datail = id.getElementsByClassName("detail");

            margin = String(height + 100) + 'px';
            datail[0].style.marginTop = margin; //全体的に調整した高さ

            //詳細の高さ調整

            submain = datail[0].children[2];
            sub_a1 = submain.children[5].offsetHeight;
            sub_a2 = submain.children[6].offsetHeight;
            sub_a3 = submain.children[7].offsetHeight;
            sub_a4 = submain.children[8].offsetHeight;
            sub_a5 = submain.children[9].offsetHeight;

            Documentsub = submain.children[2];
            Feature = submain.children[3];
            Comme = submain.children[4];
            //高さを求めたからあとは調整するのみ2023/01/19
            height = (sub_a1 > sub_a2 ? sub_a1 : sub_a2) + 72; //月給か人数のテキストの高さの高いほうに合わせて＋72

            heighttop = String(height) + 'px';
            Documentsub.style.top = heighttop; //調整した提出書類の高さ
            submain.children[7].style.top = heighttop;
            height += (sub_a3 >= 28 ? sub_a3 : 28) + 28;
            heighttop = String(height) + 'px';
            Feature.style.top = heighttop; //調整した特徴の高さ
            submain.children[8].style.top = heighttop;
            height += (sub_a4 >= 28 ? sub_a4 : 28) + 22;
            heighttop = String(height) + 'px';
            Comme.style.top = heighttop; //調整した特徴の高さ
            submain.children[9].style.top = heighttop;
            //疑似クラスの変更を行う
            height += (sub_a5 >= 28 ? sub_a5 : 28) + 22;
            smtm = smtm + '#acd-check1:checked + .acd-label + .acd-content{height:' + String(height) + 'px;opacity: 1;padding: 10px;visibility: visible;}';


            $("#stylesheet").html(smtm);
        </script>

    <?php endif; ?>

</body>
<script defer>
    //セレクトのセット値
    $("#place_list").val([<?php if (!empty($_POST['place'])) : ?>

<?php foreach ($_POST['place'] as $job_place) : ?> "<?php echo $job_place; ?>",
<?php endforeach; ?>
<?php endif; ?>
]).trigger("change");

$("#jobs_name_list").val([<?php if (!empty($_POST['jobs_name'])) : ?>

<?php foreach ($_POST['jobs_name'] as $jobs_name) : ?> "<?php echo $jobs_name; ?>",
<?php endforeach; ?>
<?php endif; ?>
]).trigger("change");
$("#submission").val([<?php if (!empty($_POST['submission'])) : ?>

<?php foreach ($_POST['submission'] as $job_submission) : ?> "<?php echo $job_submission; ?>",
<?php endforeach; ?>
<?php endif; ?>
]).trigger("change");

$("#feature").val([<?php if (!empty($_POST['feature'])) : ?>

<?php foreach ($_POST['feature'] as $job_feature) : ?> "<?php echo $job_feature; ?>",
<?php endforeach; ?>
<?php endif; ?>
]).trigger("change");
</script>



</html>
<?php
    session_start();
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
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="robots" content="noindex,nofollow" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編集画面</title>


    <!-- CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="local/Bootstrap.css" crossorigin="anonymous">
    <!-- select2 css -->
    <link rel="stylesheet" href="local/select2.css">
    <!-- バリデーションのcss -->
    <link rel="stylesheet" href="local/validation.css" type="text/css">
    <!-- 自分のcss -->
    <link rel="stylesheet" href="css/my_style.css" type="text/css">
    <link rel="stylesheet" href="local/jquery.css" />
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
        <script src="js/conf.js" type="text/javascript"></script>
        <script src="js/select2.js" type="text/javascript" defer></script>


</head>

<body>
    <header>
        <h1>編集フォーム</h1>
        <p class="p_margin">Icc Web Page</p>
    </header>
    <?php




    //関数をまとめたPHPファイル
    require_once('db/fuc_list.php');


    require_once('db/read_selectitem.php');

    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <form id="formCheck" action="db/update.php" method="post">
                    <div class="form-group">
                        <label class="control-label">企業名</label>
                        <input class="validate[required] form-control" value="<?php echo h($_POST['comp_name']); ?>" type="text" name="comp_name">
                    </div>

                    <div class="form-group">
                        <label class="control-label">ホームページのURL</label>
                        <input class="validate[required,custom[url]] form-control" type="text" name="URL" value=<?php echo h($_POST['URL']); ?>>
                    </div>

                    <div class="form-group">
                        <label class="control-label">勤務地</label>
                        <select id="place_list" class="validate[required] form-control" name='place[]' multiple>
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
                        <input type="text" class="validate[required] form-control" name="number" value=<?php echo h($_POST['number']); ?>>
                    </div>

                    <div class="form-group">
                        <label class="control-label">月給</label>
                        <select class="validate[required] form-control" name='monthly_salary'>
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
                        <select id="submission" class="validate[required] form-control" name='submission[]' multiple>
                            <?php foreach ($submission_array as $sub) : ?>
                                <?php
                                print '<option value=' . $sub["提出物"] . ' data-sub-search=' . $sub["仮名"] . ' data-sub-two-search="' . $job["ローマ字"] . '">' . $sub['提出物'] . '</option>'; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">求人票</label>
                        <input type="text" class="form-control" placeholder="ファイルをドロップしてください" id='ddarea' name="text" value="<?php if (isset($_POST['text']))
                                                                                                                                    echo h($_POST['text']); ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">特徴</label>
                        <select id="feature" class="validate[required] form-control" name='feature[]' multiple>
                            <?php foreach ($feature_array as $feature) : ?>
                                <?php
                                print '<option value=' . $feature["特徴"] . ' data-sub-search=' . $feature["仮名"] . ' data-sub-two-search="' . $job["ローマ字"] . '">' . $feature['特徴'] . '</option>'; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                                <label class="control-label">対象</label>
                                <select class="validate[required] form-control" name='sub'>
                                    <option value="">▼選択して下さい</option>
                                    <?php for($i=23;$i<=123;$i++){?>
                                    <option value="<?php echo $i;?>卒" <?php if (!empty($_POST['sub'])) if (h($_POST['sub']) == $i."卒") echo 'selected';?>>
                                        <?php echo $i;?>卒
                                    </option>
                                    <?php } ?>
                                    
                                </select>
                            </div>
                    <div class="form-group">
                        <label class="control-label">コメント</label>
                        <textarea rows="4" class="form-control" name='comment' placeholder="一言コメント"><?php if (isset($_POST['comment'])) echo h($_POST['comment']) ?></textarea>
                        
                        <!-- 募集状態を変更するチェックリスト -->
                        <label for="1">通常</label>
                        <input type="radio" id="1" value=1 name="check" <?php if ($_POST['flg'] == 1) echo 'checked'; ?>>
                        <label for="0">募集終了</label>
                        <input type="radio" id="0" value=0 name="check" <?php if ($_POST['flg'] == 0) echo 'checked'; ?>>
                        <label for="2">共通</label>
                        <input type="radio" id="2" value=2 name="check" <?php if ($_POST['flg'] == 2) echo 'checked'; ?>>
                        <label for="3">委託訓練用求人</label>
                        <input type="radio" id="3" value=3 name="check" <?php if ($_POST['flg'] == 3) echo 'checked'; ?>>

                    </div>
                    <input class="btn btn-info" type="submit" value="編集完了" name='btn_confirm'>
                    <input type="hidden" value=<?php echo h($_POST['No']); ?> name="No">
                    <input type="hidden" value="<?php echo $token; ?>" name="csrf">
                    <input type="hidden" value=<?php echo h($_POST["flg"]); ?> name="flg">
                </form>

                <!-- 削除機能 -->
                <form id="formCheck" action="db/delete.php" method="post" onSubmit="return check()">
                    <input type="hidden" value=<?php echo h($_POST["No"]); ?> name="delete_No">
                    <input type="hidden" value=<?php echo h($_POST["comp_name"]); ?> name="delete_comp">
                    <input class="btn btn-danger" type="submit" value="削除する" name='btn_confirm'>
                    <input type="hidden" value="<?php echo $token; ?>" name="csrf">
                </form>
            </div>
        </div>
    </div>
    <br>
</body>

<script defer>

function check(){

	if(window.confirm('本当に削除してもいいですか？')){ // 確認ダイアログを表示

		return true; // 「OK」時は送信を実行

	}
	else{ // 「キャンセル」時の処理

		window.alert('キャンセルされました'); // 警告ダイアログを表示
		return false; // 送信を中止

	}

}
    <?php
    //複数データを配列に入れる String→配列
    $place_array = array_push_stringslash($_POST['place']);
    $job_array = array_push_stringslash($_POST['jobs_name']);
    $submission_array = array_push_stringslash($_POST['submission']);
    $feature_array = array_push_stringslash($_POST['feature']);
    ?>
    //セレクトのセット値
    $("#place_list").val([<?php if (!empty($_POST['place'])) : ?>

            <?php foreach ($place_array as $place) : ?> "<?php echo $place; ?>",
            <?php endforeach; ?>
        <?php endif; ?>
    ]).trigger("change");

    $("#jobs_name_list").val([<?php if (!empty($_POST['jobs_name'])) : ?>

            <?php foreach ($job_array as $job) : ?> "<?php echo $job; ?>",
            <?php endforeach; ?>
        <?php endif; ?>
    ]).trigger("change");


    $("#submission").val([<?php if (!empty($_POST['submission'])) : ?>

            <?php foreach ($submission_array as $submission) : ?> "<?php echo $submission; ?>",
            <?php endforeach; ?>
        <?php endif; ?>
    ]).trigger("change");


    $("#feature").val([<?php if (!empty($_POST['feature'])) : ?>

            <?php foreach ($feature_array as $feature) : ?> "<?php echo $feature; ?>",
            <?php endforeach; ?>
        <?php endif; ?>
    ]).trigger("change");
</script>

</html>
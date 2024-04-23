<script src="js/()select2.js" defer></script>
  


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
        foreach ($data_array as $row) :
        ?>
            <div id=<?php echo $id; ?> class="job_goo">
                <div class="job_main">
                    <div class="number">
                        <?php
                        echo $id;

                        ?>
                    </div>
                    <div class="company">
                        <a href=<?php echo $row['URL'];?>>
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

                    <?php
                    print '<form  name="testform' . $id . '" action="edit.php" method="POST">';
                    print '<input type="hidden" value=' . $row["No"] . ' name="No" >';
                    print '<input type="hidden" value=' . $row["企業名"] . ' name="comp_name" >';
                    print '<input type="hidden" value=' . $row["URL"] . ' name="URL" >';
                    print '<input type="hidden" value=' . $row["勤務地"] . ' name="place" >';
                    print '<input type="hidden" value=' . $row["職種"] . ' name="jobs_name" >';
                    print '<input type="hidden" value=' . $row["求人数"] . ' name="number" >';
                    print '<input type="hidden" value=' . $row["月給"] . ' name="monthly_salary" >';
                    print '<input type="hidden" value=' . $row["提出書類"] . ' name="submission" >';
                    print '<input type="hidden" value=' . $row["参考書類"] . ' name="text" >';
                    print '<input type="hidden" value=' . $row["特徴"] . ' name="feature" >';
                    print '<input type="hidden" value=' . $row["コメント"] . ' name="comment" >';
                    print '<input type="hidden" value=' . $row["更新日時"] . ' name="data" >';
                    print '<input type="hidden" value=' . $row["募集_flg"] . ' name="flg" >';
 print '<input type="hidden" value=' . $row["対象"] . ' name="sub" >';
                    // print '<input type="hidden" name="csrf" value=' . $token . ' >';

                    print '<p  onclick="javascript:document.testform' . $id . '.submit()" class="edit">&#9881;</p>'
                    ?>

                    </form>

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
                                        print '<a href=../student/top/job/help-wanted/' . $refer_doc[0] . ' target="_blank">求人票PDF</a>';
                                        ?>
                                    </div>
                                    <div class="job_pamphlet">
                                        <?php if (isset($refer_doc[1]))
                                            print '<a href=../student/top/job/kigyou_panhu/' . $refer_doc[1] . ' target="_blank">パンフレット</a>';?>
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
            <?php
            $id++; ?>
        <?php endforeach; ?>
    </div>
</div>
<script>
    var id_list = "";
    for (i = 1; i != <?php echo $id; ?>; i++) {


        if (i + 1 != <?php echo $id; ?>)
            id_list += String(i) + ",";
        else
            id_list += String(i);

    }
</script>
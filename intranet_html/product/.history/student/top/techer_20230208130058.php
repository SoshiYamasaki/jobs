<script>
                //このCSVのデータを読み込んだあと、Onclick等で呼び出してください
                const asyncSend = () => {
                 

                    var req = new XMLHttpRequest(); //XMLHttpReqestオブジェクトを生成する
                    //データベースに生徒を登録するようのパス
                    req.open('POST', 'student_ajax.php', true);
                    req.setRequestHeader('content-type',
                        'application/x-www-form-urlencoded;charset=UTF-8');
                    

                    //あらきくんすがくん用
                    student_date="ID,PASS,ID,PASS";//ココCSVから読み込んだデータ。Stringいいです。
                    req.send('teacher_data=' + encodeURIComponent(student_date));



                    // req.send('company_id=' + encodeURIComponent(id) + '&' + 'user_id=' + encodeURIComponent(user_id));
                    // req.send();

                    // })
                }
        </script>
<script>
          
                const asyncSend = () => {
                    var req = new XMLHttpRequest(); //XMLHttpReqestオブジェクトを生成する
                    //データベースに生徒を登録するようのパス
                    req.open('POST', 'student_ajax.php', true);
                    req.setRequestHeader('content-type',
                        'application/x-www-form-urlencoded;charset=UTF-8');
                    

                    //あらきくんすがくん用
                    student_date="ID,PASS,ID,PASS";//できたら配列で渡して欲しいけど、文字でもいいですよ
                    req.send('company_id=' + encodeURIComponent(student_date));



                    // req.send('company_id=' + encodeURIComponent(id) + '&' + 'user_id=' + encodeURIComponent(user_id));
                    // req.send();

                    // })
                }
        </script>
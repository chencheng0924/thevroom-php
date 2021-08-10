<?php

       //MySQL相關資訊
       $db_host = "127.0.0.1";
       $db_user = "root";
       $db_pass = "root";   // 記得更改自己的密碼
       $db_select = "mydb";   // 記得更改成團專的schemas名稱

       //建立資料庫連線物件
       $dsn = "mysql:host=".$db_host.";dbname=".$db_select;

       //建立PDO物件，並放入指定的相關資料
       $pdo = new PDO($dsn, $db_user, $db_pass);

       //---------------------------------------------------

       $FORUMID = $_POST['FORUMID'];

       //建立SQL語法
       $sql = "SELECT * FROM FORUMREPLY WHERE ARTICLEID = ?";

       //執行並查詢，會回傳查詢結果的物件，必須使用fetch、fetchAll...等方式取得資料
       $statement = $pdo->prepare($sql);
       $statement->bindValue(1 , $FORUMID);
       $statement->execute();

       //抓出全部且依照順序封裝成一個二維陣列
       $data = $statement->fetchAll();

       echo json_encode($data)     
    //    echo '1';
    //    echo $data

?>
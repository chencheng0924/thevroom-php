<?php

       //MySQL相關資訊
       $db_host = "127.0.0.1";
       $db_user = "root";
       $db_pass = "root";   // 記得更改自己的密碼
       $db_select = "thevroom";   // 記得更改成團專的schemas名稱

       //建立資料庫連線物件
       $dsn = "mysql:host=".$db_host.";dbname=".$db_select;

       //建立PDO物件，並放入指定的相關資料
       $pdo = new PDO($dsn, $db_user, $db_pass);

       //---------------------------------------------------

       //建立SQL語法
       $sql = "SELECT CARMODEL FROM CARTYPE";

       //執行並查詢，會回傳查詢結果的物件，必須使用fetch、fetchAll...等方式取得資料
       $statement = $pdo->query($sql);

       //抓出全部且依照順序封裝成一個二維陣列
       $data = $statement->fetchAll();

       //將二維陣列取出顯示其值
    //    foreach($data as $index => $row){
	//        echo $row["ID"];   //欄位名稱
	//        echo " / ";
	//        echo $row["PASSWORD"];    //欄位名稱
	//        echo " / ";
	//        echo $row["GENDER"];    //欄位名稱	       
    //    }

       echo json_encode($data);    // 轉成JSON

?>
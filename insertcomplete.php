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
    //判斷是否上傳成功
    if($_POST["acid"] == ''){
        echo "上傳失敗: 錯誤代碼";
    }else{
        //取得上傳的檔案資訊=======================================
        $zero = $_POST["acid"];
        $first = $_POST["pr"];       
        $second = $_POST["path"];      
        $third = $_POST["end"]; 
        $fourth = $_POST["acname"];
        $five = $_POST["memberidHigh"];
        //=======================================================

        $sql = "INSERT INTO AUCTIONCOMPLETE(AUCTIONID, PRICE, IMGPATH, ENDTIME, AUCTIONNAME, HIGHMEMBERID) VALUE (?, ?, ?, ?, ?, ?)";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(1 , $zero);
        $statement->bindValue(2 , $first);
        $statement->bindValue(3 , $second);
        $statement->bindValue(4 , $third);
        $statement->bindValue(5 , $fourth);
        $statement->bindValue(6 , $five);
        $statement->execute();

        // $sqltwo = "SELECT * FROM FOLLOWAUCTION WHERE AUCTIONID = ? AND MEMBERID = ?";
        // $statementtwo = $pdo->prepare($sqltwo);
        // $statementtwo->bindValue(1 , $zero);
        // $statementtwo->bindValue(2 , $first);
        // $statementtwo->execute();
        // $data = $statementtwo->fetchAll();
        // echo json_encode($data);

    }
?>
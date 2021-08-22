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
    $zero = $_POST["currentprice"];
    $first = $_POST["acid"];
    $second = $_POST["memberid"];

    $sql = "UPDATE AUCTIONINFO SET CURRENTPRICE = ? WHERE AUCTIONID = ?";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1 , $zero);
    $statement->bindValue(2 , $first);
    $statement->execute();

    $sqltwo = "INSERT INTO BIDRECORD(DATE, BIDPRICE, MEMBERID, AUCTION_ID) VALUES (now(), ?, ?, ?)";

    $statementtwo = $pdo->prepare($sqltwo);
    $statementtwo->bindValue(1 , $zero);
    $statementtwo->bindValue(2 , $second);
    $statementtwo->bindValue(3 , $first);
    $statementtwo->execute();
?>
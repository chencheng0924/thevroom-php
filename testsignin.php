<?php
    //MySQL相關資訊
    $db_host = "127.0.0.1";
    $db_user = "root";
    $db_pass = "root";
    $db_select = "thevroom";

    //建立資料庫連線物件
    $dsn = "mysql:host=".$db_host.";dbname=".$db_select;

    //建立PDO物件，並放入指定的相關資料
    $pdo = new PDO($dsn, $db_user, $db_pass);

    //---------------------------------------------------

    //取得上傳的檔案資訊=======================================
    $SEMAIL = $_POST["SIGNEM"];      
    $SPASSWORD = $_POST["SIGNPA"]; 
    $JEDGENUM = $_POST["JEDGENUM"];       
    //=======================================================
    // echo $SEMAIL;

    $sql = "SELECT * FROM Member WHERE EMAIL = ? and PASSWORD = ? and JEDGENUM = 0";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $_POST["SIGNEM"]);
    $statement->bindValue(2, $_POST["SIGNPA"]);
    $statement->execute();
    $data = $statement->fetchAll();

    echo json_encode($data);

?>
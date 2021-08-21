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
        $first = $_POST["PASSWORD"];    //檔案名稱含副檔名        
        $second = $_POST["ADDRESS"]; 
        $third = $_POST["FULLNAME"];    //檔案種類        
        $fourth = $_POST["MOBILE"];
        $fifth = $_POST["MEMBERID"];
        //=======================================================

        $sql = "UPDATE Member SET PASSWORD = ?, ADDRESS = ?, FULLNAME = ?, MOBILE = ? WHERE MEMBERID = ?";

        $pdo->exec($sql);

        $statement = $pdo->prepare($sql);
        $statement->bindValue(1 , $first);
        $statement->bindValue(2 , $second);
        $statement->bindValue(3 , $third);
        $statement->bindValue(4 , $fourth);
        $statement->bindValue(5 , $fifth);
        $statement->execute();


    //取得檔案副檔名
    // function getExtensionName($filePath){
    //     $path_parts = pathinfo($filePath);
    //     return $path_parts["extension"];
    // }
?>
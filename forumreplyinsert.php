<?php
    //MySQL相關資訊
    $db_host = "127.0.0.1";
    $db_user = "root";
    $db_pass = "root";
    $db_select = "mydb";

    //建立資料庫連線物件
    $dsn = "mysql:host=".$db_host.";dbname=".$db_select;

    //建立PDO物件，並放入指定的相關資料
    $pdo = new PDO($dsn, $db_user, $db_pass);

    //---------------------------------------------------

    //判斷是否上傳成功
    if($_POST["MESSAGECONTENT"] === ''){
        echo "上傳失敗: 錯誤代碼";
    }else{
        //取得上傳的檔案資訊=======================================
        $first = $_POST["MEMBERID"];    //檔案名稱含副檔名        
        $second = $_POST["ARTICLEID"];   //Server上的暫存檔路徑含檔名        
        $third = $_POST["FULLNAME"]; 
        $fourth = $_POST["MESSAGECONTENT"];    //檔案種類        
        $fifth = $_POST["DATE"];    //檔案種類   
        //=======================================================
        //顯示檔案資訊
        // echo "檔案存放位置：".$filePath;
        // echo "<br/>";
        // echo "類型：".$fileType;
        // echo "<br/>";
        // echo "大小：".$fileSize;
        // echo "<br/>";
        // echo "副檔名：".getExtensionName($filePath);
        // echo "<br/>";
        // echo "<img src='/img/".$fileName."'/>";

        $sql = "INSERT INTO FORUMREPLY(MEMBERID, ARTICLEID, FULLNAME, MESSAGECONTENT, DATE) VALUES (?, ?, ?, ?, ?)";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(1 , $first);
        $statement->bindValue(2 , $second);
        $statement->bindValue(3 , $third);
        $statement->bindValue(4 , $fourth);
        $statement->bindValue(5 , $fifth);
        $statement->execute();
        echo 123;
    }
?>
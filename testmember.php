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

    //判斷是否上傳成功
    if($_POST["PASSWORD"] === ''){
        echo "上傳失敗: 錯誤代碼";
    }else{
        //取得上傳的檔案資訊=======================================
        $first = $_POST["PASSWORD"];    //檔案名稱含副檔名        
        $second = $_POST["EMAIL"];   //Server上的暫存檔路徑含檔名        
        $third = $_POST["ADDRESS"]; 
        $fourth = $_POST["FULLNAME"];    //檔案種類        
        $fifth = $_POST["BIRTHDAY"];    //檔案種類        
        $sixth = $_POST["MOBILE"];
        $seventh = $_POST["JEDGENUM"];
            //檔案種類        
        //=======================================================

        //Web根目錄真實路徑
        // $ServerRoot = $_SERVER["DOCUMENT_ROOT"];
        
        //檔案最終存放位置
        // $filePath = $ServerRoot."/FileUpload/".$fileName;
        // $filePath = $ServerRoot."/img/".$fileName;
        // $realPath = "/img/".$fileName;

        //將暫存檔搬移到正確位置
        // $destination_path = getcwd().DIRECTORY_SEPARATOR;             // getcwd — Gets the current working direct
        // $target_path = $destination_path . basename( $_FILES["file"]["name"]);
        // var_dump($target_path);
        // var_dump($filePath);
        // $target_path = $destination_path . '/img/'. basename( $_FILES["profpic"]["name"]);     //images/或是改寫成其他想要放進的資料夾 
        // @move_uploaded_file($_FILES['file']['tmp_name'], $target_path);

        // move_uploaded_file($filePath_Temp, $filePath);

        //顯示檔案資訊
        // echo "檔案存放位置：".$filePath;
        // echo "<br/>";
        // echo "類型：".$fileType;
        // echo "<br/>";
        // echo "大小：".$fileSize;
        // echo "<br/>";
        // echo "副檔名：".getExtensionName($filePath);
        // echo "<br/>";
        // echo "<img src='/FileUpload/".$fileName."'/>";

        $sql = "INSERT INTO Member(PASSWORD, EMAIL, ADDRESS, FULLNAME, BIRTHDAY, MOBILE ,JEDGENUM) VALUES (?, ?, ?, ?, ?, ? ,0)";

        $pdo->exec($sql);

        $statement = $pdo->prepare($sql);
        $statement->bindValue(1 , $first);
        $statement->bindValue(2 , $second);
        $statement->bindValue(3 , $third);
        $statement->bindValue(4 , $fourth);
        $statement->bindValue(5 , $fifth);
        $statement->bindValue(6 , $sixth);
        $statement->execute();

    }

    //取得檔案副檔名
    // function getExtensionName($filePath){
    //     $path_parts = pathinfo($filePath);
    //     return $path_parts["extension"];
    // }
?>
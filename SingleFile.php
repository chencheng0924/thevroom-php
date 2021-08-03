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
    if($_FILES["file"]["error"] > 0){
        echo "上傳失敗: 錯誤代碼".$_FILES["file"]["error"];
    }else{
        //取得上傳的檔案資訊=======================================
        $fileName = $_FILES["file"]["name"];    //檔案名稱含副檔名        
        $filePath_Temp = $_FILES["file"]["tmp_name"];   //Server上的暫存檔路徑含檔名        
        $fileType = $_FILES["file"]["type"];    //檔案種類        
        $fileSize = $_FILES["file"]["size"];    //檔案尺寸
        //=======================================================

        //Web根目錄真實路徑
        $ServerRoot = $_SERVER["DOCUMENT_ROOT"];
        
        //檔案最終存放位置
        // $filePath = $ServerRoot."/FileUpload/".$fileName;
        $filePath = $ServerRoot."/img/".$fileName;
        $realPath = "/img/".$fileName;

        //將暫存檔搬移到正確位置
        // $destination_path = getcwd().DIRECTORY_SEPARATOR;             // getcwd — Gets the current working direct
        // $target_path = $destination_path . basename( $_FILES["file"]["name"]);
        // var_dump($target_path);
        // var_dump($filePath);
        // $target_path = $destination_path . '/img/'. basename( $_FILES["profpic"]["name"]);     //images/或是改寫成其他想要放進的資料夾 
        // @move_uploaded_file($_FILES['file']['tmp_name'], $target_path);

        move_uploaded_file($filePath_Temp, $filePath);

        //顯示檔案資訊
        echo "檔案存放位置：".$filePath;
        echo "<br/>";
        echo "類型：".$fileType;
        echo "<br/>";
        echo "大小：".$fileSize;
        echo "<br/>";
        echo "副檔名：".getExtensionName($filePath);
        echo "<br/>";
        echo "<img src='/FileUpload/".$fileName."'/>";

        $sql = "INSERT INTO test2(nameone, nametwo, namethree) VALUES ('wwweeekffffep', 'vdeeeddeojf', ?)";

        $pdo->exec($sql);

        $statement = $pdo->prepare($sql);
        $statement->bindValue(1 , $realPath);
        $statement->execute();

    }

    //取得檔案副檔名
    function getExtensionName($filePath){
        $path_parts = pathinfo($filePath);
        return $path_parts["extension"];
    }
?>

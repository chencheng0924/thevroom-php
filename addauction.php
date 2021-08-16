<?php
    try {
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
    if($_POST["NAME"] == ''){
        echo "上傳失敗: 錯誤代碼";
    }else{
        //取得上傳的檔案資訊=======================================
        $zero = $_POST["MEMBER_ID"];
        $first = $_POST["NAME"];       
        $second = $_POST["CARSORT"];      
        $third = $_POST["CARBRAND"]; 
        $fourth = $_POST["CARSERIES"];       
        $fifth = $_POST["DESCRIPTION"];
        $sixth = $_POST["REGION"];
        $seven = $_POST["ADDRESS"];
        $eight = $_POST["RESERVEPRICE"];
        $nine = $_POST["STARTINGTIME"];
        $ten = $_POST["DURATION"];
        $eleven = $_POST["YEAR"];
        $twelve = $_POST["COLOR"];
        $thirteen = $_POST["DISPLACEMENT"];
        $fourteen = $_POST["DOOR"];
        $fifteen = $_POST["MILES"];
        $fileName = $_FILES["IMGPATH"]["name"];    //檔案名稱含副檔名        
        $filePath_Temp = $_FILES["IMGPATH"]["tmp_name"];   //Server上的暫存檔路徑含檔名        
        $fileType = $_FILES["IMGPATH"]["type"];    //檔案種類        
        $fileSize = $_FILES["IMGPATH"]["size"];    //檔案尺寸
        //=======================================================    

        $ServerRoot = $_SERVER["DOCUMENT_ROOT"];
        $filePath = $ServerRoot."/Project_thevroom/public/auctionphoto/".$fileName;
        $realPath = "/auctionphoto/".$fileName;

        move_uploaded_file($filePath_Temp, $filePath);


        $sql = "INSERT INTO AUCTIONINFO(MEMBER_ID, NAME, CARSORT, CARBRAND, CARSERIES, DESCRIPTION, REGION, ADDRESS, RESERVEPRICE, STARTINGTIME, DURATION, YEAR, COLOR, DISPLACEMENT, DOOR, MILES, IMGPATH) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // $pdo->exec($sql);

        $statement = $pdo->prepare($sql);
        // $statement->bindValue(1 , $randomId);
        $statement->bindValue(1 , $zero);
        $statement->bindValue(2 , $first);
        $statement->bindValue(3 , $second);
        $statement->bindValue(4 , $third);
        $statement->bindValue(5 , $fourth);
        $statement->bindValue(6 , $fifth);
        $statement->bindValue(7 , $sixth);
        $statement->bindValue(8 , $seven);
        $statement->bindValue(9 , $eight);
        $statement->bindValue(10 , $nine);
        $statement->bindValue(11 , $ten);
        $statement->bindValue(12 , $eleven);
        $statement->bindValue(13 , $twelve);
        $statement->bindValue(14 , $thirteen);
        $statement->bindValue(15 , $fourteen);
        $statement->bindValue(16 , $fifteen);
        $statement->bindValue(17 , $realPath);
        $statement->execute();
        echo 123;

    }}catch (Exception $e) {   
        echo $e->getMessage();   

        } 
    //取得檔案副檔名
    // function getExtensionName($filePath){
    //     $path_parts = pathinfo($filePath);
    //     return $path_parts["extension"];
    // }
?>
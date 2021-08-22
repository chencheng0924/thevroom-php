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
        $first = $_POST["MEMBERID"];    //檔案名稱含副檔名        
        $second = $_POST["TOTALPRICE"];   //Server上的暫存檔路徑含檔名        
        $third = $_POST["PATMENTMETHOD"]; 
        $fourth = $_POST["PRODUCTLIST"];    //檔案種類 
        $fifth = $_POST['ORDERLISTID'];
        $sixth = $_POST['AMOUNTLIST'];
        $seventh = $_POST['ORDERDATE'];
        // echo $fourth;
        $prolist = json_decode($fourth);
        $amountlist = json_decode($sixth);
        // $prolist = explode(',', $fourth);    
        // echo $prolist;   
        //=======================================================

        // echo serialize($prolist[0][0]);

        $sql = "INSERT INTO NORMALORDER(ORDERLISTID, MEMBERID, TOTALPRICE, PAYMENTMETHOD ,ORDERDATE) VALUES (?, ?, ?, ?, ?)";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(1 , $fifth);
        $statement->bindValue(2 , $first);
        $statement->bindValue(3 , $second);
        $statement->bindValue(4 , $third);
        $statement->bindValue(5 , $seventh);
        $statement->execute();

        // foreach($fourth as $index => $value){
        //     echo $fourth;
        // }
        for($i = 0; $i < count($prolist); $i++){
            // echo count($prolist);
            // echo $prolist[$i];
            $sql = "select * from ACCESSORIES where PRODUCTID = $prolist[$i]";  
            $statement = $pdo->query($sql);
            $data = $statement->fetchAll();
            // echo $amountlist[$i];
            // print_r($data);
            foreach($data as $index => $value){
                $sql = "INSERT INTO N_ORDER_LIST(ORDERLISTID, MEMBERID, PRODUCTID, PRODUCTNAME, PRODUCTPRICE, PRODUCTAMOUNT, TOTALPRICE) VALUES (?, ?, ?, ?, ?, ?, ?)";
                // echo $value[$index];
                echo $amountlist[$i];
                echo "<br/>";
                // foreach($amountlist as $index => $value){
                    // echo $value[$index];
                // }
                $statement = $pdo->prepare($sql);
                $statement->bindValue(1 , $fifth);
                $statement->bindValue(2 , $first);
                $statement->bindValue(3 , $value[$index]);
                $statement->bindValue(4 , $value['PRODUCTNAME']);
                $statement->bindValue(5 , $value['PRODUCTPRICE']);
                $statement->bindValue(6 , $amountlist[$i]);
                $statement->bindValue(7 , ($value['PRODUCTPRICE'] * $amountlist[$i]));
                $statement->execute();
                // echo $value['PRODUCTPRICE'];
              }
        }
        // echo $data;
        // echo "<br/>";
        
        // foreach($fourth as $index => $value){
        //     echo $value;
        //   foreach($value as $index => $vv) {
        //     echo $vv[$index]['PRODUCTNAME'];
        //   }
        // }
?>
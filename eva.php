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
       //建立SQL
       
       $carbrand = $_POST['carbrand'];
       $producedyear = $_POST['year'];
       $milage = $_POST['milage'];
       $name = $_POST['name'];
       $email = $_POST['email'];

       
       echo $carbrand;
       echo $producedyear;
       echo $milage;
       echo $name;
       echo $email;
      

       $sql = "INSERT INTO EVALUATE (CARBRAND, PRODUCEDYEAR, MILAGE, CUSTOMERNAME, EMAIL) VALUES (?, ?, ?, ?, ?)";
      
       // $pdo->exec($sql);

       $statement = $pdo -> prepare($sql);
       $statement->bindValue(1 ,$carbrand);
       $statement->bindValue(2 ,$producedyear);
       $statement->bindValue(3 ,$milage);
       $statement->bindValue(4 ,$name);
       $statement->bindValue(5 ,$email);
       $statement->execute();

 


?>
<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
    if (!move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
        echo "Sorry, there was an error uploading your file.";
      }
    /*
    echo 'Name:'.$name.'<br>';
    echo "Email: $email <br>";
    echo 'Password: '. $password.'<br>';

    1. establish the connection with database
    2. open up the connection
    3. make a query
    4. execute the query
    5. according to the query get the result
    6. close the connection

    majorly we have four types of queries insert, update, delete, and search/select 
    in which insert, update, delete are going to return bolean either the data saved or deleted or not.
    search/select is going to return the dataset

    */
    define('dbHostnamae', 'localhost');
    define('dbUserName','root');
    define('dbPassword','');
    define('dbName','bscs4bfa23');
    $con = new mysqli(dbHostnamae,dbUserName,dbPassword,dbName);
    if($con->connect_error){
        die("Connect Error: ".$con->connect_error);
    }
    $qry = 'INSERT INTO users (name, email, password, picture_path) VALUES ("'.$name.'", "'.$email.'", "'.$password.'", "'.$target_file.'")';
    $result = $con->query($qry);
    if($result){
        echo "Data has been saved successfully.";
    } else {
        echo "Data didn't save";
    }
    $con->close();
?>
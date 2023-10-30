<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        header("Location: ./records.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
</head>
<body>
    <div>
        <form action="" method="post">
            <div class="margin-bottom">
                <label for="email">Please enter your Email:</label>
                <input type="email" name="email" id="email" placeholder="email@example.com" required>
            </div>
            <div class="margin-bottom">
                <label for="password">Please enter your password:</label>
                <input type="password" name="password" id="password" placeholder="email@example.com" required>
            </div>
            <div class="margin-bottom">
                <input type="submit" name="btnSignIn" value="SignIn">
            </div>
        </form>
    </div>
</body>
</html>
<?php

    if(isset($_POST['btnSignIn'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        require_once("./db.config.php");
        $qry = "SELECT * FROM users WHERE email='".$email."' AND password='".$password."'";
        $result = $con->query($qry);
        if(mysqli_num_rows($result)>0){
            $row = $result->fetch_assoc();
            // session_start();
            $_SESSION['user_id']=$row['id'];
            $_SESSION['user_name'] = $row['name'];
            header("Location: ./records.php");
        } else {
            echo "Credentials didn't match";
        }
        $con->close();
    }    
?>
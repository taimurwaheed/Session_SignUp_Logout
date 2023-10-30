<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: ./signin.php");
    }
    echo $_SESSION['user_name'];

    echo '<br><a href="./logout.php">Logout</a>';
?>
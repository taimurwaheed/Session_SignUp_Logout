<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: ./signin.php");
    }
    session_destroy();
    header("Location: ./signin.php");
?>
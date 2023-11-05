<?php 
session_start(); 
function logout()
{
    session_destroy();
    header("Location: home.php");
    exit();
}

logout();
?>

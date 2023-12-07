<?php
session_start();
function logout()
{
    session_destroy();
    header("Location: index.php");
    exit();
}

logout();
?>
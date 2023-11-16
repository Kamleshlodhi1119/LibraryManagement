<?php
session_start();
function logout()
{
    session_destroy();
    header("Location: index.html");
    exit();
}

logout();
?>
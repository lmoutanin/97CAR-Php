<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};


$_SESSION = array();
session_destroy();
header("Refresh:0; url=login.php");

<?php
require "conn.php";
session_start();

echo $_SESSION['tenantemail'];
echo $_SESSION['tenantcode'];
?>
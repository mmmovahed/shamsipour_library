<?php
$status = $_COOKIE["status"];
if ((!isset($_COOKIE["usercode"])))
    header("Location:../index.php");
if ((!isset($_COOKIE["status"])))
    header("Location:../index.php");
if ($status != "7846486454")
    header("Location:../index.php");

include "header.php";
include "../connectToDB.php";
include "navbar.php";
include "../assets/func/func.php";

?>
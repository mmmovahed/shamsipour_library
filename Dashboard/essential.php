<?php
if(!isset($_COOKIE["usercode"]))
    header("Location:../index.php");
include "../MasterPageOfHeaderRelationship.php";
include "../connectToDB.php";
include "../assets/func/func.php";
include "navbar.php";
$scode=$_COOKIE['usercode'];
?>
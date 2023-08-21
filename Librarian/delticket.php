<?php
if (isset($_GET["id"]) && !empty($_GET["id"]))
    $id=$_GET["id"];
else
    header("Location:tickets.php");


$status = $_COOKIE["status"];
if ((!isset($_COOKIE["usercode"])))
    header("Location:../index.php");
if ((!isset($_COOKIE["status"])))
    header("Location:../index.php");
if ($status != "4548751659")
    header("Location:../index.php");

include "../connectToDB.php";

$sql="DELETE FROM ticket WHERE tid=$id";
if($conn->query($sql)===true)
    header("Location:tickets.php");
else
    header("Location:tickets.php");
?>
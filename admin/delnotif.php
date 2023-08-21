<?php
include "../connecttoDB.php";
include "../assets/func/func.php";
if(!isset($_POST["notifid"]))
    header("Location:notifs.php");
$tittle="مدیریت اعلان ها";

$scode=$_COOKIE["usercode"];

$id=$_POST["notifid"];

$sql="DELETE FROM notification WHERE nid=$id";
if($conn->query($sql) === TRUE){
    echo "";
    InsertLOG("$scode","0","حذف اعلان");
    header("Location:notifs.php");
}
else{
    header("Location:notifs.php");
}
$conn->close();
include "essential.php";
?>

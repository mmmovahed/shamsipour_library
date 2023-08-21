<?php
include "../connecttoDB.php";
if(!isset($_POST["notifid"]))
    header("Location:notifs.php");
$tittle="مدیریت اعلان ها";

$scode=$_COOKIE["usercode"];

$id=$_POST["notifid"];

$sql="DELETE FROM notification WHERE nid=$id";
if($conn->query($sql) === TRUE){
    echo "";
    header("Location:notifs.php");
}
else{
    header("Location:notifs.php");
}
include "essential.php";
?>

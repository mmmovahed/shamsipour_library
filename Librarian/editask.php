<?php
include "essential.php";
if (!isset($_POST['id']) && !isset($_POST['status']))
    header("Location:../");
$id=$_POST['id'];
$status=$_POST['status'];
?>
<div class="main-dashboard">


<?php
if (isset($_POST['btn-edit']))
{
    $sql = "UPDATE request SET rstatus=$status WHERE rid=$id";

    if ($conn->query($sql) === TRUE) {
        $usercode=$_COOKIE["usercode"];
        InsertLOG("$usercode","0","ویرایش درخواست");
        echo("<div class='alert alert-primary'>انجام شد</div>");
    } else {
        echo("<div class='alert alert-primary'>انجام نشد</div>");
    }
}
if (isset($_POST['btn-del']))
{
    $sql = "DELETE FROM request WHERE rid=$id";

    if ($conn->query($sql) === TRUE) {
        $usercode=$_COOKIE["usercode"];
        InsertLOG("$usercode","0","حذف درخواست");
        echo("<div class='alert alert-primary'>انجام شد</div>");
    } else {
        echo("<div class='alert alert-primary'>انجام نشد</div>");
    }
}
?>
</div>

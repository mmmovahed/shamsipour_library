<?php
$tittle="ویرایش درخواست";
include "essential.php";
if (!isset($_POST['id']) && !isset($_POST['status']))
    header("Location:../");
$id=$_POST['id'];
$status=$_POST['status'];
$scode=$_COOKIE["usercode"];
?>
<div class="main-dashboard">


<?php
if (isset($_POST['btn-edit']))
{
    $sql = "UPDATE request SET rstatus=$status WHERE rid=$id";

    if ($conn->query($sql) === TRUE) {
        InsertLOG("$scode","0","ویرایش وضعیت درخواست");
        echo("<div class='alert alert-primary'>انجام شد</div>");
    } else {
        echo("<div class='alert alert-primary'>انجام نشد</div>");
    }
}
if (isset($_POST['btn-del']))
{
    $sql = "DELETE FROM request WHERE rid=$id";

    if ($conn->query($sql) === TRUE) {
        InsertLOG("$scode","0","حذف درخواست");
        echo("<div class='alert alert-primary'>انجام شد</div>");
    } else {
        echo("<div class='alert alert-primary'>انجام نشد</div>");
    }

}
?>
</div>

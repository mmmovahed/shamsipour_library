<?php
if(!isset($_GET['id']) || empty($_GET['id']))
    header("Location:index.php");
else
    $sid=$_GET['id'];
$scode=$_COOKIE['usercode'];
include "essential.php";
$sql="DELETE FROM student WHERE sid=$sid";

if ($conn->query($sql)===true)
{
    echo "<div>کاربر حذف شد</div>";
    insertLOG("$scode","0","حذف کاربر");
}
else{
    echo "<div>کاربر حذف نشد</div>";
}
?>


<?php
include "footer.php";
?>
<?php
include "../connectToDB.php";
include "../assets/func/func.php";


// delete report about Bug
if(isset($_POST['del-request-bug'])){
$del_id=$_POST['del-id'];
echo $del_id;
    $sql = "DELETE FROM request WHERE rid=" . $del_id;

    if ($conn->query($sql) === TRUE) {
        insertLOG($_COOKIE['usercode'], "", "حذف گزارش باگ");
        header("Location:reportBug.php");
    }
}
else
{
    header("Location:index.php");
}

$conn->close();
?>
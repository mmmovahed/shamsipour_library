<?php
$status=$_COOKIE["status"];
if((!isset($_COOKIE["usercode"])))
    header("Location:../index.php");
if((!isset($_COOKIE["status"])))
    header("Location:../index.php");
if($status!="1457842154")
    header("Location:../index.php");

include "../connectToDB.php";
?>

<?php
if (isset($_GET['id-ebook']))
{
    $q = $_GET['id-ebook'];

    $sql="SELECT bid,bname,bauther FROM book WHERE bname LIKE '%$q%'";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc())
            echo "<a href='EditDigitalBook.php?id=$row[bid]'>$row[bname] | $row[bauther]</a><br><br>";
    }
    else{
        echo "کتابی دیجیتالی یافت نشد";
    }
}
if (isset($_GET['id-rbook']))
{
    $q = $_GET['id-rbook'];

    $sql="SELECT rbid,rbname,rbauther FROM reservable_book WHERE rbname LIKE '%$q%'";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc())
            echo "<a href='EditBook.php?id=$row[rbid]'>$row[rbname] | $row[rbauther]</a><br><br>";
    }
    else{
        echo "کتابی مورد رزروی یافت نشد";
    }
}
mysqli_close($conn);
?>
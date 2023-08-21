<?php
if(!isset($_COOKIE["usercode"]))
    header("Location:../index.php");
$q = $_GET['q'];
include "../connectToDB.php";
$sql="SELECT * FROM reservable_book WHERE rbname like '%$q%'";
$result = mysqli_query($conn,$sql);
try{
    if($result){
        while ($row = mysqli_fetch_array($result)) {
            $path="<a href=Book_Reserve.php?rbook_id=".$row['rbid'].">".$row['rbname']."</a><br><br>";
            echo $path;
        }
    }
    else{
        echo "موردی یافت نشد...";
}

}
catch (Exception $e){
    echo "موردی یافت نشد...";
}

mysqli_close($conn);
?>
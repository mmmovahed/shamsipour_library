<?php
$q = $_GET['q'];
include "connectToDB.php";
$sql="SELECT * FROM book WHERE bname like '%$q%'";
$result = mysqli_query($conn,$sql);
try{
    if($result){
        while ($row = mysqli_fetch_array($result)) {
            $path="<a style='color: white;' href=Book_Page.php?book_id=".$row['bid'].">".$row['bname']."</a><br><br>";
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
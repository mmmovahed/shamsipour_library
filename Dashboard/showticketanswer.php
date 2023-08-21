<?php
if(!isset($_GET["id"]))
    header("Location:showticket.php");
$id=$_GET["id"];
$tittle="داشبورد کاربری|نمایش رزرو";
include "essential.php";
?>
<div class="main-dashboard">
    <?php
    $sql = "SELECT * FROM ticket WHERE tid=$id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        ?>
        <h4 class="usual_title">تیکت : </h4>
        <p class="bold"><?php echo $row["ttitle"];?></p>
        <p><?php echo $row["tdescription"];?></p>
        <hr>
        <h4 class="usual_title">پاسخ : </h4>
        <p><?php echo $row["tanswer"];?></p>
        <span class="tag-orange" style="font-size:14px"><?php echo $row["tdate"];?></span>
        <hr>

        <?php
      }
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>
    
    <div class="alert alert-info">درصورت کامل نبودن پاسخ میتوانید دوباره تیکتی ارسال کنید و درخواست خودرا کامل تر ثبت کنید</div>
</div>
<?php
include "../MasterPageOfFooterRelationship.php";
?>
<?php
$tittle="داشبورد کاربری|ارسال تیکت";
include "essential.php";
?>
<div class="main-dashboard">
    <div class="alert alert-primary">
        در صورت بروز هرگونه مشکلی میتوانید با تیکت ان را اطلاع بدهید
    </div>

    <div class="alert alert-warning">
عنوان تیکت خلاصه و مفید باشد
    </div>
    <br>
    <?php
    if(isset($_POST['sub-btn']))
    {
        $title=$_POST['title'];
        $usercode=$_COOKIE["usercode"];
        $description=$_POST['description'];
        $date=date("Y-m-d-H:i:s");
        $sql = "INSERT INTO `ticket`( `scode`, `ttitle`, `tdescription`, `tdate`, `tstatus`) VALUES ('$usercode','$title','$description','$date',0)";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>تیکت جدید با موفقیت اضافه گردید</div>";
            insertLOG("$usercode","0","اضافه کردن تیکت");
        } else {
            echo "<div class='alert alert-danger'>تیکت جدید با موفقیت اضافه نگردید</div>";
        }

        $conn->close();
    }

    ?>
    <form class="form-bug" method="post" action="">
        <input type="text" name="title"  placeholder="عنوان ">
        <br><br>
        <textarea style="width: 80%" name="description" placeholder="شرح تیکت ..."></textarea><br><br>
        <input class="btn btn-success" type="submit" name="sub-btn" value="ارسال تیکت">
        <input class="btn btn-danger" type="reset" name="sub-btn" value="بازنویسی"><br>

    </form>

</div>
<?php
include "../MasterPageOfFooterRelationship.php";
?>


<?php

$tittle="داشبورد کاربری|همکاری";
include "essential.php";
?>
<div class="main-dashboard">
    <h4 class="usual_title">همکاری</h4>
    <p>
        شما میتوانید در هر زمینه ای که علاقه داشته باشید به بهبود خدمات کمک کنید مانند:
        <ul>
        <li>برنامه نویسی</li>
        <li>اضافه کردن کتاب</li>
        <li>حذف باگ ها</li>
        <li>و ....</li>
    </ul>
    <br>
    <b>برای داشتن همکاری کافیست دکمه ی زیر را بفشارید تا کتابدار با شما تماس بگیرد.
    </b>
    <br>
    <br>
    <?php
    if (isset($_POST['btn-communication']))
    {
        $date=date("y-m-d");
        $sql = "INSERT INTO `request`(`scode`, `title`, `description`, `rtime`, `rstatus`) VALUES
 ($_COOKIE[usercode], 'همکاری','همکاری','$date',0)";

        if ($conn->query($sql) === TRUE) {
            $usercode=$_COOKIE['usercode'];
            echo "<div class='alert alert-success'>درخواست همکاری با موفقیت اضافه گردید</div>";
            insertLOG("$usercode","0","اضافه کردن درخواست همکاری");
        } else {
            echo "<div class='alert alert-danger'>درخواست همکاری با موفقیت اضافه نگردید</div>";
        }
    }
    ?>
    <form method="post" action="">
        <button type="submit" class="btn btn-info" name="btn-communication">ثبت برای همکاری</button>
    </form>
    </p>
</div>
<?php
include "../MasterPageOfFooterRelationship.php";
?>


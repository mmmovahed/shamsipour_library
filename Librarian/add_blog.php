<?php
$tittle="درج بلاگ";
include "essential.php";
?>
<div class="main-dashboard">
    <h4 class="usual_title">درج بلاگ</h4>
    <form method="post">
        <div class="row">
        <?php
        if (isset($_POST["btn"]))
        {
            $title=$_POST["title"];
            $img=$_POST["img"];
            $descrip=$_POST["descrip"];
            $rate=$_POST["rate"];
            $group=$_POST["group"];
            $date=$_POST["month"]." ".$_POST["year"];
            $content=mysqli_real_escape_string($conn,$_POST["content"]);
            $sql="INSERT INTO `blog`(`btitle`, `bimg`, `bcontent`, `bdescription`, `major`, `date`, `brate`, `status`)
        VALUES ('$title','$img','$content','$descrip','$group','$date','$rate',2)";
            if ($conn->query($sql) === TRUE) {
                $scode=$_COOKIE["usercode"];
                insertLOG("$scode","0","درج بلاگُ");
                echo "<div class='alert alert-success'>بلاگ با موفقیت اضافه گردید</div>";

            } else {
                echo "<div class='alert alert-danger'>بلاگ با موفقیت اضافه نگردید</div>";
            }

            $conn->close();
        }
        ?>
        <input type="text" class="col-5 input-form" name="title" placeholder="عنوان">
        <input type="text" class="col-5 input-form" name="img" placeholder="لینک تصویر">
        <input type="text" class="col-5 input-form" name="descrip" placeholder="خلاصه">
        <input type="text" class="col-5 input-form" name="rate" placeholder="امتیاز">
        <select class="col-11 col-lg-3" name="group">
            <option value="کامپیوتر">کامپیوتر</option>
            <option value="الکترونیک">الکترونیک</option>
            <option value="حسابداری">حسابداری</option>
            <option value="عمومی">عمومی</option>
        </select><br><br>

        <select name="month" class="col-3 input-form">
            <option value="فروردین">فروردین</option>
            <option value="اردیبهشت">اردیبهشت</option>
            <option value="خرداد">خرداد</option>
            <option value="تیر">تیر</option>
            <option value="مرداد">مرداد</option>
            <option value="شهریور">شهریور</option>
            <option value="مهر">مهر</option>
            <option value="آبان">آبان</option>
            <option value="آذر">آذر</option>
            <option value="دی">دی</option>
            <option value="بهمن">بهمن</option>
            <option value="اسفند">اسفند</option>
        </select>
        <select name="year" class="col-3 input-form">
            <option value="1401">1401</option>
        </select>
        <br>
        <textarea class="col-9" name="content">مقاله</textarea>
        <script>
            CKEDITOR.replace("content");
        </script>
            <br>
            <br>
            <button name="btn" class="btn btn-success">ثبت بلاگ</button>
        </div>
    </form>
</div>
<?php
include "footer.php";
?>
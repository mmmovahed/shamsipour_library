<?php
$tittle="درج خبر";
include "essential.php";
$scode=$_COOKIE["usercode"];
?>
    <div class="main-dashboard">
        <h4 class="usual_title">درج خبر</h4>
        <form method="post">
            <div class="row">
                <?php
                if (isset($_POST["btn"]))
                {
                    $title=$_POST["title"];
                    $img=$_POST["img"];
                    $status=$_POST["status"];
                    $date=date("Y-m-d");
                    $content=mysqli_real_escape_string($conn,$_POST["content"]);
                    $sql="INSERT INTO `news`(`ntitle`, `nimg`, `ncontent`, `ntime`, `nstatus`, `nwriter`)
        VALUES ('$title','$img','$content','$date','$status','$scode')";
                    if ($conn->query($sql) === TRUE) {
                        insertLOG("$scode","0","درج خبر");
                        echo "<div class='alert alert-success'>خبر با موفقیت اضافه گردید</div>";

                    } else {
                        echo "<div class='alert alert-danger'>خبر با موفقیت اضافه نگردید</div>";
                    }

                    $conn->close();
                }
                ?>
                <input type="text" class="col-5 input-form" name="title" placeholder="عنوان">
                <input type="text" class="col-5 input-form" name="img" placeholder="لینک تصویر">
                <select class="col-11 col-lg-3" name="status">
                    <option value="1">مهم</option>
                    <option value="2">عادی</option>
                </select>
                <br>
                <hr width="10px">
                <textarea class="col-9" name="content">محتوا</textarea>
                <script>
                    CKEDITOR.replace("content");
                </script>
                <br>
                <br>
                <button name="btn" class="btn btn-success">ثبت خبر</button>
            </div>
        </form>
    </div>
<?php
include "footer.php";
?>
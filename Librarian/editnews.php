<?php
if (!isset($_POST["id"]))
    header("Location:news.php");
else
    $id=$_POST["id"];


$statuss=$_POST["state"];

$tittle="ویرایش خبر";
include "essential.php";
?>
<div class="main-dashboard">
    <h4 class="usual_title">ویرایش خبر</h4>
    <?php
    $scode=$_COOKIE["usercode"];
    if(isset($_POST["accept-blog"]))
    {
            $sql="DELETE FROM news WHERE nid=$id";
            if($conn->query($sql)===true){
                insertLOG("$scode","0","حذف خبر");
                echo"<div class='alert alert-success'>حذف خبر با موفقیت انجام شد</div>";
            }
            else
                echo"<div class='alert alert-success'>حذف خبر با موفقیت انجام نشد</div>";
    }

    if (isset($_POST["edit-blog"]))
    {
        $title=$_POST["title"];
        $img=$_POST["img"];
        $status=$_POST["status"];
        $content=$_POST["content"];

        if (empty($_POST["status"]))
            $status=$statuss;

        $sql="UPDATE `news` SET `ntitle`='$title',`nimg`='$img',`ncontent`='$content',`nstatus`='$status' WHERE nid=$id";
        if($conn->query($sql)===true){
            insertLOG("$scode","0","ویرایش خبر");
            echo"<div class='alert alert-success'>ویرایش با موفقیت انجام شد</div>";
        }
        else
            echo"<div class='alert alert-danger'>ویرایش با موفقیت انجام نشد</div>";
    }
    ?>


    <?php
    $sql="SELECT * FROM news WHERE nid=$id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            ?>
            <form method="post" action="" class="col-12">
                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="hidden" name="state" value="<?php echo $statuss?>">
                <div class="row col-12">
                    <h4 class="usual_title"><?php echo $row['nwriter']?></h4>
                    <input value="<?php echo $row['ntitle']?>" class="input-form col-12 col-lg-5" type="text" name="title" placeholder="عنوان">
                    <input value="<?php echo $row['nimg']?>" class="input-form col-12 col-lg-5" type="text" name="img" placeholder="لینک تصویر">
                    <br>
                    <?php
                    if ($row["nstatus"] == 2)
                        $status="عادی";
                    else if ($row["nstatus"] == 1)
                        $status="مهم";
                    ?>
                    <span>وضعیت : <?php echo $status?></span>
                    <select class="input-form col-12 col-lg-5" type="text" name="status">
                        <option>ویرایش وضعیت</option>
                        <option value="2">عادی</option>
                        <option value="1">مهم</option>
                    </select>
                    <hr>
                    <br><br>
                    <span>محتوا</span>
                    <textarea class="input-form col-12 col-lg-5" name="content"><?php echo $row['ncontent']?></textarea>

                    <script>
                        CKEDITOR.replace("content");
                    </script>
                </div>
                <br>
                <br>
                <button class="btn btn-danger" name="accept-blog">حذف خبر</button>
                <button class="btn btn-success" name="edit-blog">ویرایش خبر</button>
            </form>
            <?php
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</div>
<?php
include "footer.php";
?>>

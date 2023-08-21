<?php
if (!isset($_POST["id"]))
    header("Location:blogs.php");
else
    $id=$_POST["id"];
$statuss=$_POST["statuss"];
$majorr=$_POST["majorr"];

$tittle="ویرایش بلاگ";
include "essential.php";
?>
<div class="main-dashboard">
    <h4 class="usual_title">ویرایش بلاگ</h4>
    <?php
    $scode=$_COOKIE["usercode"];
    if(isset($_POST["accept-blog"]))
    {
        if(!empty($_POST["status"]) || $_POST["status"]==0)
        {
            $status1=$_POST["status"];
            $sql="UPDATE blog SET status=$status1 WHERE blid=$id";
            if($conn->query($sql)===true){
                insertLOG("$scode","0","ویرایش وضعیت بلاگ");
                echo"<div class='alert alert-success'>ویرایش وضعیت با موفقیت انجام شد</div>";
            }
            else
                echo"<div class='alert alert-danger'>ویرایش وضعیت با موفقیت انجام نشد</div>";
        }
        else
        {
            echo"<div class='alert alert-danger'>فیلد وضعیت را پر کنید</div>";
        }
    }

    if (isset($_POST["edit-blog"]))
    {
        $title=$_POST["title"];
        $img=$_POST["img"];
        $major=$_POST["major"];
        $rate=$_POST["rate"];
        $status=$_POST["status"];
        $descrip=$_POST["descrip"];
        $content=$_POST["content"];

        if (empty($_POST["major"]))
            $major=$majorr;

        if (empty($_POST["status"]))
            $status=$statuss;


        $sql="UPDATE `blog` SET `btitle`='$title',`bimg`='$img',`bcontent`='$content',
`bdescription`='$descrip',`major`='$major',`brate`='$rate',`status`='$status' WHERE blid='$id'";
        if($conn->query($sql)===true){
            insertLOG("$scode","0","ویرایش بلاگ");
            echo"<div class='alert alert-success'>ویرایش با موفقیت انجام شد</div>";
        }
        else
            echo"<div class='alert alert-danger'>ویرایش با موفقیت انجام نشد</div>";
    }
    ?>


<?php
$sql="SELECT * FROM blog WHERE blid=$id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ?>
        <form method="post" action="" class="col-12">
    <input type="hidden" name="id" value="<?php echo $id?>">
    <input type="hidden" name="majorr" value="<?php echo $majorr?>">
    <input type="hidden" name="statuss" value="<?php echo $statuss?>">
            <div class="row col-12">
                <h4 class="usual_title"><?php echo $row['scode']?></h4>
            <input value="<?php echo $row['btitle']?>" class="input-form col-12 col-lg-5" type="text" name="title" placeholder="عنوان">
            <input value="<?php echo $row['bimg']?>" class="input-form col-12 col-lg-5" type="text" name="img" placeholder="لینک تصویر">
            <br>
            <span>رشته : <?php echo $row["major"]?></span>
            <select class="input-form col-12 col-lg-5" type="text" name="major">
                <option value="">ویرایش رشته</option>
                <option value="کامپیوتر">کامپیوتر</option>
                <option value="الکترونیک">الکترونیک</option>
                <option value="حسابداری">حسابداری</option>
                <option value="عمومی">عمومی</option>
            </select>
            <input value="<?php echo $row['brate']?>" class="input-form col-12 col-lg-5" type="number" name="rate" placeholder="امتیاز">
            <br>
                <?php
                if ($row["status"] == 0)
                    $status="غیرفعال";
                else if ($row["status"] == 2)
                    $status="فعال رسمی";
                else if ($row["status"] == 1)
                    $status="فعال غیررسمی";
                ?>
            <span>وضعیت : <?php echo $status?></span>
            <select class="input-form col-12 col-lg-5" type="text" name="status">
                <option value="">ویرایش وضعیت</option>
                <option value="2">فعال رسمی</option>
                <option value="1">فعال غیررسمی</option>
                <option value="0">غیرفعال</option>
            </select>
                <hr>
                <br><br>
                <span>خلاصه</span>
            <textarea class="input-form col-12 col-lg-5" name="descrip"><?php echo $row['bdescription']?></textarea>
                <hr>
                <br><br>
                <span>محتوا</span>
            <textarea class="input-form col-12 col-lg-5" name="content"><?php echo $row['bcontent']?></textarea>

                <script>
                    CKEDITOR.replace("descrip");
                    CKEDITOR.replace("content");
                </script>
            </div>
            <br>
            <br>
            <button class="btn btn-warning" name="accept-blog">قبول کردن بلاگ</button>
            <button class="btn btn-success" name="edit-blog">ویرایش بلاگ</button>
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

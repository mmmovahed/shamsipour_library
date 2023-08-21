<?php
$tittle="ویرایش کتاب دیجیتال";
include "essential.php";
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<div class='alert alert-danger col-12 col-lg-5 text-center' style='margin: auto'>ابتدا کتاب را انتخاب کنید</div>";
}else
{
    $id=$_GET['id'];
?>
<div class="main-dashboard">
    <div class="alert alert-warning">
        <h4>نکته هایی که باید رعایت شود</h4>
        <hr width="80px">
        <p>
            برای فیلد های عددی حتما باید عدد وارد شود
            <br>
            <br>
            بعضی از فیلدها الزامی هستند وبعضی خیر ، در صورت نبودن اطلاعات برای فیلد های غیر الزامی سه خط تیره بگذارید
            <br>
            <br>
            فیلد وضعیت نحوه نمایش کتاب است . 1 به معنی موجود برای دانلود;0 به معنی موجود نبودن
        </p>
    </div>

    <?php
    if(isset($_POST['btn-update']))
    {
        $bname=$_POST['bname'];
        $bimg=$_POST['bimg'];
        $bauther=$_POST['bauther'];
        $btranslator=$_POST['btranslator'];
        $publisher=$_POST['publisher'];
        $publish_time=$_POST['publish_time'];
        $download_link=$_POST['download_link'];
        $password_link=$_POST['password_link'];
        $bdescription=mysqli_real_escape_string($conn,$_POST['bdescription']);
        $bedition=$_POST['bedition'];
        $page_count=$_POST['page_count'];
        $bcategory=$_POST['bcategory'];
        $bmajor=$_POST['bmajor'];
        $bprice=$_POST['bprice'];
        $blang=$_POST['blang'];
        $brate=$_POST['brate'];
        $bstatus=$_POST['bstatus'];

        $sql = "UPDATE `book` SET `bname`='$bname',`bimg`='$bimg',`bauther`='$bauther',
`btranslator`='$btranslator',`publisher`='$publisher',`publish_time`='$publish_time',`download_link`='$download_link',
`password_link`='$password_link',`bdescription`='$bdescription',`bedition`='$bedition',`page_count`='$page_count',
`bcategory`='$bcategory',`bmajor`='$bmajor',`bprice`='$bprice',`blang`='$blang',`brate`='$brate',
`bstatus`='$bstatus' WHERE bid=$id";

        if ($conn->query($sql) === TRUE) {
            $usercode=$_COOKIE["usercode"];
            insertLOG("$usercode","$id","ویرایش کتاب دیجیتال");
            echo "<div class='alert alert-success'>کتاب مورد نظر با موفقیت ویرایش شد</div>";
        } else {
            echo "<div class='alert alert-danger'>کتاب مورد نظر با موفقیت ویرایش نشد</div>";
        }

    }
    ?>
    <?php
    $sql = "SELECT * FROM book WHERE bid=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    ?>
      <div class="edit-form">
          <form class="row" method="post" action="">
                <div class="col-6">نام :<textarea class="col-12 col-lg-9" name="bname"><?php echo $row['bname']?></textarea></div>
                <div class="col-6">آدرس عکس :<textarea class="col-12 col-lg-9" name="bimg"><?php echo $row['bimg']?></textarea></div>
                <div class="col-6">نویسنده :<textarea class="col-12 col-lg-9" name="bauther"><?php echo $row['bauther']?></textarea></div>
                <div class="col-6">مترجم :<textarea class="col-12 col-lg-9" name="btranslator"><?php echo $row['btranslator']?></textarea></div>
                <div class="col-6">ناشر :<textarea class="col-12 col-lg-9" name="publisher"><?php echo $row['publisher']?></textarea></div>
                <div class="col-6">تاریخ انتشار :<textarea class="col-12 col-lg-9" name="publish_time"><?php echo $row['publish_time']?></textarea></div>
                <div class="col-6">لینک دانلود :<textarea class="col-12 col-lg-9" name="download_link"><?php echo $row['download_link']?></textarea></div>
                <div class="col-6">رمز فایل :<textarea class="col-12 col-lg-9" name="password_link"><?php echo $row['password_link']?></textarea></div>
                <div class="col-6">توضیحات :<textarea class="col-12 col-lg-9" name="bdescription"><?php echo $row['bdescription']?></textarea></div>
                <div class="col-6">ویرایش :<textarea class="col-12 col-lg-9" name="bedition"><?php echo $row['bedition']?></textarea></div>
                <div class="col-6">تعداد صفحه :<textarea class="col-12 col-lg-9" name="page_count"><?php echo $row['page_count']?></textarea></div>
                <div class="col-6">گروه :<textarea class="col-12 col-lg-9" name="bcategory"><?php echo $row['bcategory']?></textarea></div>
                <div class="col-6">رشته تخصصی :<textarea class="col-12 col-lg-9" name="bmajor"><?php echo $row['bmajor']?></textarea></div>
                <div class="col-6">قیمت :<textarea class="col-12 col-lg-9" name="bprice"><?php echo $row['bprice']?></textarea></div>
                <div class="col-6">زبان :<textarea class="col-12 col-lg-9" name="blang"><?php echo $row['blang']?></textarea></div>
                <div class="col-6">امتیاز :<textarea class="col-12 col-lg-9" name="brate"><?php echo $row['brate']?></textarea></div>
                <div class="col-6">وضعیت :<textarea class="col-12 col-lg-9" name="bstatus"><?php echo $row['bstatus']?></textarea></div>
                  <br>
              <script>
                  CKEDITOR.replace("bdescription");
              </script>
              <input type="submit" class="btn btn-success" value="ویرایش اطلاعات" name="btn-update">
          </form>
      </div>


      <?php
  }
} else {
        echo "0 results";
    }
    ?>

</div>
<?php
}
include "footer.php";
?>
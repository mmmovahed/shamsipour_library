<?php
$tittle="داشبورد همکار | اضافه کردن کتاب دیجیتال";
include "essential.php";
?>


<div class="main-dashboard">
<div class="alert alert-primary">اضافه کردن کتاب دیجیتال برای دانلود از وبسایت<br>لطفا کتاب را در یک اپلود سنتر اپلود کنید و لینک آن را در وبسیات قرار دهید</div>
    <div class="alert alert-warning">در صورت نداشتن اطلاعات خط تیره بگذارید</div>
    <hr>
    <button onclick="show()" class="btn btn-primary" id="btn-show">نمایش مثال برای نحوه وارد کردن مقادیر </button>
    <br>
    <form id="form" style="background-color: #eee" class="close-element col-12 col-lg-12 form-add-book" method="post" action="">
<?php
$sql = "SELECT * FROM Book WHERE bid=1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

?>

        <input disabled type="text" maxlength="50" placeholder="نام کتاب" class="col-11 col-lg-3" value=<?php echo $row['bname']?>>
        <input disabled type="text" placeholder="لینک عکس کتاب"  class="col-11 col-lg-3" value=<?php echo $row['bimg']?>>
        <input disabled type="text" placeholder="نویسنده" class="col-11 col-lg-3" value=<?php echo $row['bauther']?>>
        <br><br>
        <input disabled type="text" placeholder="مترجم" class="col-11 col-lg-3" value=<?php echo $row['btranslator']?>>
        <input disabled type="text" placeholder="ناشر" class="col-11 col-lg-3" value=<?php echo $row['publisher']?>>
        <input disabled type="text" placeholder="تاریخ انتشار" class="col-11 col-lg-3" value=<?php echo $row['publish_time']?>>
        <br><br>
        <input disabled type="text" placeholder="ویرایش" class="col-11 col-lg-3" value=<?php echo $row['bedition']?>>
        <input disabled type="text" placeholder="تعداد صفحات" class="col-11 col-lg-3" value=<?php echo $row['page_count']?>>
        <input disabled type="text" placeholder="گروه" class="col-11 col-lg-3" value=<?php echo $row['bcategory']?>>
<br><br>

        <input disabled type="text" placeholder="رشته" class="col-11 col-lg-3" value=<?php echo $row['bmajor']?>>
        <input disabled type="text" placeholder="قیمت" class="col-11 col-lg-3" value=<?php echo $row['bprice']?>>
        <input disabled type="text" placeholder="زبان" class="col-11 col-lg-3" value=<?php echo $row['blang']?>><br><br>
        <input disabled type="text" placeholder="امتیاز" class="col-11 col-lg-3" value=<?php echo $row['brate']?>>
        <br><br>
        <textarea disabled style="height: 100px;" placeholder="لینک دانلود" class="col-11 col-lg-3"><?php echo $row['download_link']?></textarea>
        <textarea disabled style="height: 100px;" placeholder="رمز فایل در صورت وجود" class="col-11 col-lg-3"><?php echo $row['password_link']?></textarea>
        <textarea disabled style="height: 100px;" placeholder="توضیحات" class="col-11 col-lg-3"><?php echo $row['bdescription']?></textarea>
        <script>
            function show() {
                document.getElementById('form').classList.toggle("close-element");
                document.getElementById('form').classList.toggle("show-element");
            }
        </script>
        <?php
    }
}
?>
       <br>
    </form>
    <hr>
    <?php
    if (isset($_POST['subbtn']))
    {
        $bname=$_POST['name'];
        $img=$_POST['img'];
        $auther=$_POST['auther'];
        $translator=$_POST['translator'];
        $publisher=$_POST['publisher'];
        $publishdate=$_POST['publishdate'];
        $edition=$_POST['edition'];
        $pagenum=$_POST['pagenum'];
        $group=$_POST['group'];
        $major=$_POST['major'];
        $price=$_POST['price'];
        $lang=$_POST['lang'];
        $rate=$_POST['rate'];
        $download=$_POST['download'];
        $pass=$_POST['pass'];
        $descrip=mysqli_real_escape_string($conn,$_POST['descrip']);
        if(!empty($bname)&&!empty($img)&&!empty($auther)&&!empty($translator)&&!empty($publisher)&&!empty($publishdate)&&!empty($edition)&&
            !empty($group)&&!empty($major)&&!empty($price)&&!empty($lang)&&!empty($rate)&&!empty($download)&&!empty($descrip))
        {
            $sql = "INSERT INTO book (`bname`, `bimg`, `bauther`, `btranslator`, `publisher`, `publish_time`, `download_link`
, `password_link`,`bdescription`, `bedition`, `page_count`, `bcategory`, `bmajor`, `bprice`, `blang`, `brate`, `bstatus`)
VALUES ('$bname','$img','$auther','$translator','$publisher','$publishdate','$download','$pass','$descrip','$edition','$pagenum'
,'$group','$major','$price','$lang',$rate,1)";

            if ($conn->query($sql) === TRUE) {
                $usercode=$_COOKIE["usercode"];
                insertLOG("$usercode","$bname","اضافه کردن کتاب دیجیتال");
                echo "<div class='alert alert-success'>درج کتاب جدید با موفقیت انجام شد</div>";
            } else {
                echo "<div class='alert alert-danger'>درج کتاب جدید با موفقیت انجام نشد</div>";
            }
        }
        else {
            ?>
            <div class="alert alert-danger">
                لطفا فیلدهارا کامل کنید.
            </div>
    <?php
        }
    }
    ?>
<form class="col-12 col-lg-12 form-add-book" method="post" action="">

    <input type="text" placeholder="نام کتاب" class="col-11 col-lg-3" name="name">
    <input type="text" placeholder="لینک عکس کتاب"  class="col-11 col-lg-3" name="img">
    <input type="text" placeholder="نویسنده" class="col-11 col-lg-3" name="auther">
    <br><br>
    <input type="text" placeholder="مترجم" class="col-11 col-lg-3" name="translator">
    <input type="text" placeholder="ناشر" class="col-11 col-lg-3" name="publisher">
    <input type="text" placeholder="تاریخ انتشار" class="col-11 col-lg-3" name="publishdate">
    <br><br>
    <input type="text" placeholder="ویرایش" class="col-11 col-lg-3" name="edition">
    <input type="text" placeholder="تعداد صفحات" class="col-11 col-lg-3" name="pagenum">
    <select class="col-11 col-lg-3" name="group">
        <option value="">گروه</option>
        <option value="کامپیوتر">کامپیوتر</option>
        <option value="الکترونیک">الکترونیک</option>
        <option value="حسابداری">حسابداری</option>
        <option value="عمومی">عمومی</option>
    </select><br><br>
    <select class="col-11 col-lg-3" name="major">
        <option value="">رشته</option>
        <option value="کامپیوتر(شبکه)">کامپیوتر(شبکه)</option>
        <option value="کامپیوتر(نرم افزار)">کامپیوتر(نرم افزار)</option>
        <option value="کامپیوتر(عمومی)">کامپیوتر(عمومی)</option>
        <option value="الکترونیک(عمومی)">الکترونیک(عمومی)</option>
        <option value="حسابداری(عمومی)">حسابداری(عمومی)</option>
        <option value="مناسب برای همه">مناسب برای همه</option>
    </select>
    <input type="text" placeholder="قیمت" class="col-11 col-lg-3" name="price">
    <select class="col-11 col-lg-3" name="lang">
        <option value="">زبان</option>
        <option value="فارسی">فارسی</option>
        <option value="انگلیسی">انگلیسی</option>
        <option value="سایر">سایر</option>
    </select><br><br>
    <input type="text" placeholder="امتیاز" class="col-11 col-lg-3" name="rate">
<br><br>
    <textarea style="height: 100px;" placeholder="لینک دانلود" class="col-11 col-lg-3" name="download"></textarea>
    <textarea style="height: 100px;" placeholder="رمز فایل در صورت وجود" class="col-11 col-lg-3" name="pass"></textarea>
    <textarea style="height: 100px;" placeholder="توضیحات" class="col-11 col-lg-3" name="descrip"></textarea>
    <br>
    <script>
        CKEDITOR.replace("descrip");
    </script>
    <button style="float: left" type="submit" class="btn btn-success" name="subbtn">ثبت کتاب دیجیتال</button>
    <button style="float: left;margin-left: 2px;" type="reset" class="btn btn-warning">بازنویسی</button>
    <br>
    <br>
    <br>
</form>
</div>
<?php include "footer.php";?>

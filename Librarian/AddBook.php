<?php
$tittle="داشبورد کتابدار | اضافه کردن کتاب";
include "essential.php";
?>


<div class="main-dashboard">
    <div class="alert alert-primary">این کتاب ها برای رزرو اضافه می شوند</div>
    <div class="alert alert-warning">در صورت نداشتن اطلاعات خط تیره بگذارید</div>
    <hr>
    <button onclick="show()" class="btn btn-primary" id="btn-show">نمایش مثال برای نحوه وارد کردن مقادیر </button>
    <br>
    <form id="form" style="background-color: #eee" class="close-element col-12 col-lg-12 form-add-book" method="post" action="">
        <?php
        $sql = "SELECT * FROM reservable_book WHERE rbid=1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {

                ?>

                <input disabled type="text" maxlength="50" placeholder="نام کتاب" class="col-11 col-lg-3" value=<?php echo $row['rbname']?>>
                <input disabled type="text" placeholder="نویسنده" class="col-11 col-lg-3" value=<?php echo $row['rbauther']?>>
                <input disabled type="text" placeholder="ویرایش" class="col-11 col-lg-3" value=<?php echo $row['rbedition']?>><br><br>
                <input disabled type="text" placeholder="گروه" class="col-11 col-lg-3" value=<?php echo $row['rbmajor']?>>
                <input disabled type="text" placeholder="رشته" class="col-11 col-lg-3" value=<?php echo $row['rbfilled']?>>
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
        $auther=$_POST['auther'];
        $edition=$_POST['edition'];
        $group=$_POST['group'];
        $major=$_POST['major'];

        if(!empty($bname)&&!empty($auther)&&!empty($edition)&&!empty($group)&&!empty($major))
        {
            $sql = "INSERT INTO `reservable_book`(`rbname`, `rbauther`, `rbedition`, `rbmajor`, `rbfilled`, `rbstatus`) 
VALUES ('$bname','$auther','$edition','$group','$major',1)";

            if ($conn->query($sql) === TRUE) {
                ?>
                <div class="alert alert-success">با موفقت انجام شد</div>
                <?php
                $usercode=$_COOKIE['usercode'];
                insertLOG("$usercode","$bname","اضافه کردن کتاب");
            } else {
?>
                <div class="alert alert-danger">با موفقت انجام نشد</div>

                <?php
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
        <input type="text" placeholder="نویسنده" class="col-11 col-lg-3" name="auther">
        <input type="text" placeholder="ویرایش" class="col-11 col-lg-3" name="edition"><br><br>
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
        <button style="float: left" type="submit" class="btn btn-success" name="subbtn">ثبت کتاب دیجیتال</button>
        <button style="float: left;margin-left: 2px;" type="reset" class="btn btn-warning">بازنویسی</button>
        <br>
        <br>
        <br>
        <br>
    </form>
</div>
<?php include "footer.php";?>

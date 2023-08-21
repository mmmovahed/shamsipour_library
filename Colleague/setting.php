<?php
$tittle="تنظیمات کاربری";
include "essential.php";
$scode=$_COOKIE["usercode"];?>
<div class="main-dashboard">
    <h4 class="usual_title">تنطیمات کاربری</h4>

    <?php
    if (isset($_POST["btn"]))
    {
        $IsPasswordchanged=false;
        if (($_POST["pass"] == $_POST["repass"]))
        {
                if ($_POST["pass"] == "password")
                {
                    $IsPasswordchanged=false;
                    $pass=$_POST["lastpass"];
                }
                else
                {
                    $pass=$_POST["pass"];
                }
                $img=$_POST["img"];
                $phone=$_POST["phone"];


                $sql="UPDATE student SET img='$img' , sphone='$phone' , spassword='$pass' WHERE scode='$scode'";
                if ($conn->query($sql)===true)
                {
                    echo "<div class='alert alert-success'>ویرایش با موفقیت انجام شد</div>";
                }
                else
                {
                    echo "<div class='alert alert-danger'>ویرایش با موفقیت انجام نشد</div>";
                }
        }
        else
        {
            echo "<div class='alert alert-danger'>رمزعبور را به درستی وارد کنید</div>";
        }
    }
    ?>
    <form method="post" action="">
        <?php
        $sql = "SELECT sid,semail,img,scode,sphone,spassword FROM student WHERE scode='$scode'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <img src="<?php echo $row['img']?>" class="rounded-circle col-12 col-lg-1">
                <br>
                <label style="width: 115px">شماره دانشجویی</label>
                <input type="text" disabled value="<?php echo $row['scode']?>" class="input-form col-12 col-lg-5">
                <br>
                <label style="width: 115px">شماره تلفن</label>
                <input type="text" name="phone" value="<?php echo $row['sphone']?>" class="input-form col-12 col-lg-5">
                <br>
                <label style="width: 115px">لینک تصویر نمایه</label>
                <input type="text" name="img" value="<?php echo $row['img']?>" class="input-form col-12 col-lg-5">
                <br>
                <label style="width: 115px">رمز عبور</label>
                <input type="password" name="pass" value="password" class="input-form col-12 col-lg-5">
                <br>
                <label style="width: 115px">تکرار رمز عبور</label>
                <input type="password" name="repass" value="password" class="input-form col-12 col-lg-5">
                <br>
                <br>
                <input type="hidden" name="lastpass" value=<?php echo $row['spassword']?>>
                <button style="margin-right: 50px;" name="btn" class="btn btn-success">ویرایش</button>
                <?php
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </form>
</div>
<?php
include "footer.php";
?>

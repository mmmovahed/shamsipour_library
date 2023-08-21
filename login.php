
<?php

include "connectToDB.php";
include "assets/func/func.php";
$err="";
$message="";
if(isset($_POST['btn-sub']))
{
    if(!empty($_POST['scode']) && !empty($_POST['pass']))
    {

        $pass=$_POST['pass'];
        $suserstudentcode=$_POST['scode'];
        $date=date("Y-m-d");
        $sql = "SELECT scode, spassword,status FROM student WHERE scode='$suserstudentcode' && spassword='$pass' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $message="<div class='alert alert-success' style='z-index: 0;'>"."ورود با موفقیت انجام شد."."</div>";
            while($row = $result->fetch_assoc()) {
                setcookie("usercode", $row["scode"], time() + (86400 * 10), "/");

                if ($row["status"] == 1 || $row['status'] == 2) {
                    setcookie("status", "1051265749", time() + (86400 * 10), "/");

                    insertLOG($suserstudentcode,"0","ورود استاد یا دانشجو");
                    header("Location:Dashboard/");
                } else if ($row['status'] == 3) {
                    setcookie("status", "1457842154", time() + (86400 * 10), "/");

                    insertLOG($suserstudentcode,"0","ورود همکار");
                    header("Location:Colleague/");
                } else if ($row['status'] == 4) {
                    setcookie("status", "4548751659", time() + (86400 * 10), "/");

                    insertLOG($suserstudentcode,"0","ورود کتابدار");
                    header("Location:Librarian/");
                } else if ($row['status'] == 5) {
                    setcookie("status", "7846486454", time() + (86400 * 10), "/");

                    insertLOG($suserstudentcode,"0","ورود ادمین");
                    header("Location:Admin/");
                } else {
                    setcookie("status", "0", time() + (86400 * 10), "/");
                    $message= "<div class='alert alert-info'>ثبت نام شما هنوز به اتمام نرسیده</div>";
                    header("Location:");
                }
            }

        }
        else
        {
            $err="<div class='alert alert-danger' style='z-index: 0;'>"."شماره دانشجویی یا رمز عبور نادرست است."."</div>";
            setcookie("status", "0", time() + (86400 * 10), "/");

        }
    }

    $conn->close();

}

?>

<?php
$tittle="ورود";
include "MasterPageOfHeaderRelationship.php";
include "navbar.php";
?>



<br>
<div class="container col-11 col-lg-10 usual-box" style="margin: auto;padding: 0;border: none;">
    <div class="row">
        <div class="col-12 col-lg-6 login-right">
            <h1>
                فرم ورود...
            </h1>
            <hr width="100" style="margin:20px auto;">
            <p>
                وارد شوید و از داشبورد کاربری خود عملیات مختلف را انجام دهید
            </p>
            <button class="btn btn-light"><a href="signup.php">هنوز ثبت نام نکردید؟</a></button>
        </div>
        <div class="col-12 col-lg-6 login-left">
            <div class="col-11 col-lg-9 usual-box" style="margin: auto;box-shadow: none;">
                <?php echo $message;?>
                <?php echo $err;?>
                <form action="" method="post">
                    <input name="scode" type="text" placeholder="شماره دانشجویی">
                           <br>
                           <br>
                    <input name="pass" type="password" placeholder="رمز عبور">
                    <br>
                    <br>

                    <button style="float: left" type="submit" name="btn-sub" class="btn btn-success">وارد شوید</button>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<?php
include "footer.php";
include "MasterPageOfFooterRelationship.php";
?>
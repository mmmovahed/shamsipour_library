<nav style="padding: 10px;" class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../Shamsipour_library"><img src="assets/img/logo/logo.png" width="40"></a>
    <button style="float: left;" onclick="funme()" id="navbar-toggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
<?php
include "connectToDB.php";
if (isset($_COOKIE['usercode']))
{
    $a=$_COOKIE['usercode'];
    $sql = "SELECT * FROM student WHERE scode=$a";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $img=$row['img'];
        }
    } else {
    }
    $conn->close();
}

?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">صفحه نخست <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="news.php">اخبار <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="blog.php">بلاگ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="shamsipour.php">درباره ما  <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="contact.php">تماس با ما <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="http://shamsipour.tvu.ac.ir">سایت دانشکده<span class="sr-only">(current)</span></a>
            </li>
    </div>
    <?php
    if(isset($_COOKIE["usercode"]) && isset($_COOKIE["status"]))
    {
        //teacher and student
        if($_COOKIE["status"]==1051265749)
        {
    ?>
        <li class="nav-item dropdown" onclick="funcdropdown()" style="list-style: none;">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <img src=<?php echo $img;?> width="40">
            </a>



            <div id="dropdown-menu" class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="Dashboard/index.php"><i class="fa fa-home icon-userbox"></i> داشبورد</a>
                <a class="dropdown-item" href="Dashboard/askforReseve.php"><i class="fa fa-calendar-check icon-userbox"></i>درخواست رزرو</a>
                <a class="dropdown-item" href="Dashboard/sentTicket.php"><i class="fa fa-ticket icon-userbox"></i>ارسال تیکت</a>
                <a class="dropdown-item" href="Dashboard/haveCommunication.php"><i class="fa fa-handshake icon-userbox"></i>همکاری</a>
                <a class="dropdown-item" href="Dashboard/suggestion.php"><i class="fa fa-comment icon-userbox"></i>پیشنهادات و انتقادات</a>
                <a class="dropdown-item" href="Dashboard/reportBug.php"><i class="fa fa-bug icon-userbox"></i>گزارش خطا</a>
                <div class="dropdown-divider"></div
                    <br>
                <a class="dropdown-item" href="exit.php"> <i class="fa-sharp fa-solid fa-right-from-bracket icon-userbox"></i>خروج</a>
            </div>
        </li>

<?php
    }
        //Colleague
    if($_COOKIE["status"]==1457842154)
    {
        ?>
        <li class="nav-item dropdown" onclick="funcdropdown()" style="list-style: none;">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src=<?php echo $img;?> width="40">
            </a>



            <div id="dropdown-menu" class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="Colleague/index.php"><i class="fa fa-home icon-userbox"></i> داشبورد همکاری</a>
        <a class="dropdown-item" href="Colleague/AddDigitalBook.php"><i class="fa fa-book-atlas icon-userbox"></i>اضافه کردن کتاب دیجیتال</a>
        <a class="dropdown-item" href="Colleague/AddBook.php"><i class="fa fa-book  icon-userbox"></i>اضافه کردن کتاب</a>
        <a class="dropdown-item" href="Colleague/EditDigitalBook.php"><i class="fa fa-book-atlas  icon-userbox"></i>ویرایش کتاب دیجیتال</a>
        <a class="dropdown-item" href="EditBook.php"><i class="fa fa-book icon-menu-admin icon-userbox"></i>ویرایش کردن کتاب</a>
                <div class="dropdown-divider"></div
                <br>
                <a class="dropdown-item" href="exit.php"> <i class="fa-sharp fa-solid fa-right-from-bracket icon-userbox"></i>خروج</a>
            </div>
        </li>
        <?php
}
    //Librarian
        if($_COOKIE["status"]==4548751659)
        {
            ?>
            <li class="nav-item dropdown" onclick="funcdropdown()" style="list-style: none;">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src=<?php echo $img;?> width="40">
                </a>



                <div id="dropdown-menu" class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="Librarian/index.php"><i class="fa fa-home icon-userbox"></i> داشبورد</a>
                    <a class="dropdown-item" href="Librarian/asks.php"><i class="fa fa-calendar-check icon-userbox"></i>درخواست ها</a>
                    <a class="dropdown-item" href="Librarian/logs.php"><i class="fa fa-ticket icon-userbox"></i>لاگ سیستم</a>
                    <a class="dropdown-item" href="Librarian/notifs.php"><i class="fa fa-handshake icon-userbox"></i>اعلان ها</a>
                    <a class="dropdown-item" href="Librarian/users.php"><i class="fa fa-comment icon-userbox"></i>کاربران</a>
                    <div class="dropdown-divider"></div
                    <br>
                    <a class="dropdown-item" href="exit.php"> <i class="fa-sharp fa-solid fa-right-from-bracket icon-userbox"></i>خروج</a>
                </div>
            </li>
            <?php
        }
        //Admin
        if($_COOKIE["status"]==7846486454)
        {
            ?>
            <li class="nav-item dropdown" onclick="funcdropdown()" style="list-style: none;">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src=<?php echo $img;?> width="40">
                </a>



                <div id="dropdown-menu" class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="admin/index.php"><i class="fa fa-home icon-userbox"></i> داشبورد</a>
                    <a class="dropdown-item" href="admin/asks.php"><i class="fa fa-calendar-check icon-userbox"></i>درخواست ها</a>
                    <a class="dropdown-item" href="admin/logs.php"><i class="fa fa-ticket icon-userbox"></i>لاگ سیستم</a>
                    <a class="dropdown-item" href="admin/notifs.php"><i class="fa fa-handshake icon-userbox"></i>اعلان ها</a>
                    <a class="dropdown-item" href="admin/users.php"><i class="fa fa-comment icon-userbox"></i>کاربران</a>
                    <div class="dropdown-divider"></div
                    <br>
                    <a class="dropdown-item" href="exit.php"> <i class="fa-sharp fa-solid fa-right-from-bracket icon-userbox"></i>خروج</a>
                </div>
            </li>
            <?php
        }
        if($_COOKIE["status"]==0)
        {
            ?>
            <li class="nav-item active nav-item-login-signup">
                <a class="nav-link" href="#"><a href="msg.php?id=signedinbutnotacceptedfromlibrarian">وضعیت</a><span class="sr-only">(current)</span></a>
            </li>
            <?php
        }
        if($_COOKIE["status"]==-1)
        {
            ?>

            <?php
        }
    }
    else
    {
        ?>
        <li class="nav-item active nav-item-login-signup">
            <a class="nav-link" href="#"><a href="login.php">ورود</a><a style="margin: 0 3px"> / </a><a href="signup.php">عضویت</a><span class="sr-only">(current)</span></a>
        </li>     <?php
    }
?>
    <script>
        function funcdropdown() {
            document.getElementById('dropdown-menu').style.left='10px';
        }
    </script>
</nav>
<script>
    var countclickofnavbarbtn=0;
    var box=document.getElementById('userbox');
    box.style.visibility='hidden';
    function funuserboxicon() {
        box.style.visibility='visible';
    }

    function funme() {
        if (document.getElementById('navbar-toggler').classList.contains('collapsed')){
            alert(document.getElementById('navbar-toggler').classList.contains('collapsed'));
            box.classList.add('collapsetoshow');
        }
        else
        {
            box.classList.remove('collapsetoshow');
        }
    }
    function userboxleave()
    {
        setTimeout(() => {box.style.visibility = 'hidden'; }, 2000);
    }

 </script>

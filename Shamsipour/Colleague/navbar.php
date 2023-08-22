<?php
$status=$_COOKIE["status"];
if((!isset($_COOKIE["usercode"])))
    header("Location:../index.php");
if((!isset($_COOKIE["status"])))
        header("Location:../index.php");
if($status!="1457842154")
    header("Location:../index.php");
?>

<aside id="menu-admin" class="menu-admin">
<div class="col-12 col-lg-12">
    <div class="col-12 user-info">
        <?php
        if (isset($_POST['btn-exit']))
        {
            setcookie("usercode", null, time() -3600, "/");
            header("Location:../");
        }
        $sql = "SELECT * FROM student WHERE scode=".$_COOKIE["usercode"];
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $status=$row['status'];
                if($row['status']==0)
                {
                    setcookie("usercode", null, time() -3600, "/");
                    header("Location:../");
                }
                else if($row['status']==1)
                {
                    $status="دانشجو";
                }
                else if($row['status']==2)
                {
                    $status="استاد";
                }
                else if($row['status']==3)
                {
                    $status="همکار";
                }
?>
        <img src=<?php echo $row['img']?> width="65" class="icon-menu-admin"><br>
        <h5 class="title-menu-admin close-element"><?php echo $row['sname']." ".$row['sfamily']?></h5><br>
        <h6 class=""><?php echo $status?></h6>
        <h6 class="title-menu-admin close-element"><?php echo $row['sfilled']?></h6><br>
        <h6 class="title-menu-admin close-element"><?php echo $row['scode']?></h6><br>
        <h6 class="title-menu-admin close-element"><?php echo $row['semail']?></h6>
    <form method="post" action="">
        <button type="submit" name="btn-exit" class="btn btn-light"><i class="fa-sharp fa-solid fa-right-from-bracket icon-userbox" style="font-size: 20px;"></i></button>
    </form>
    </div>
            <?php

            }
            } else {
                echo "0 results";
            }
            ?>
    <hr>
    <div class="col-12 user-menu">
        <ul>
            <li><a href="index.php"><i class="fa fa-home icon-menu-admin"></i><span class="title-menu-admin close-element"> خانه</span></span></a></li>
            <li><a href="add_blog.php"><i class="fa fa-blog icon-menu-admin"></i><span class="title-menu-admin close-element"> درج بلاگ</span></span></a></li>
            <li><a href="AddDigitalBook.php"><i class="fa fa-book-atlas icon-menu-admin"></i><span class="title-menu-admin close-element">درج کتاب دیجیتال</span></a></li>
            <li><a href="AddBook.php"><i class="fa fa-book icon-menu-admin"></i><span class="title-menu-admin close-element">درج کتاب</span></a></li>
            <li><a href="ChooseBook.php"><i class="fa fa-edit icon-menu-admin"></i><span class="title-menu-admin close-element">انتخاب کتاب</span></a></li>
            <li><a href="../"><i class="fa fa-arrow-rotate-back icon-menu-admin"></i><span class="title-menu-admin close-element">صفحه اصلی سایت</span></a></li>
            <li><a href="reportBug.php"><i class="fa fa-bug icon-menu-admin"></i><span class="title-menu-admin close-element">گزارش خطا</span></a></li>
            <li><a href="setting.php"><i class="fa fa-gear icon-menu-admin"></i><span class="title-menu-admin close-element">تنظیمات</span></a></li>
        </ul>
    </div>

    <br>
    <button id="minimizer" onclick="funcmenuminimizer()" type="submit" class="btn btn-light col-12 col-lg-12 close"><i id="btn-close-icon" class="fa fa-navicon icon-userbox"></i></div>
    <script>
        document.getElementsByClassName("title-menu-admin").style.display="none";




        function funcmenuminimizer(){
        var minimizer=document.getElementById('minimizer');
            const titles = document.querySelectorAll('.title-menu-admin');



        if (minimizer.classList.contains("close"))
        {

            document.getElementById("menu-admin").style.width="270px";
            for (var i=0;i<titles.length;i++) {
                titles[i].classList.add("show-element");
                titles[i].classList.remove("close-element");
            }
            document.getElementById("btn-close-icon").classList.remove("fa-navicon");
            document.getElementById("btn-close-icon").classList.add("fa-close");
            minimizer.classList.remove("close");
            minimizer.classList.add("show");
        }
        else if (minimizer.classList.contains("show"))
        {
            document.getElementById("menu-admin").style.width="100px";


            for (var i=0;i<titles.length;i++) {
                titles[i].classList.remove("show-element");
                titles[i].classList.add("close-element");

            }
            document.getElementById("btn-close-icon").classList.remove("fa-close");
            document.getElementById("btn-close-icon").classList.add("fa-navicon");
            minimizer.classList.remove("show");
            minimizer.classList.add("close");
        }
    }
    </script>
</aside>


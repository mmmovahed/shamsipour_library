<?php
$tittle="داشبورد ادمین";
$scode=$_COOKIE["usercode"];
include "essential.php";
?>

<div class="main-dashboard">
    <div class="alert alert-primary">
        <b>به پنل مدیریت خوش آمدید</b>
        <br>
        <br>
        <?php
        $sql = "SELECT nid,ntitle FROM notification WHERE (nstatus=4 || nstatus=5 || (nstatus=6 && reciver=$scode)) ORDER BY nid DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='alert alert-info'><a href=notification.php?id=$row[nid]>$row[ntitle]</a></div>";
            }
        } else {
            echo "<p>اطلاعیه ی جدیدی موجود نمیباشد</p>";
        }
        ?>

    </div>
    <br>
    <div class="row">
        <div class="col-11 col-lg-5 box-dashboard">
            <h4 class="usual_title">فعالیت های اخیر شما</h4>
            <?php
            $sql = "SELECT * FROM logs WHERE scode=$scode ORDER BY lid DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each
                if($result->num_rows >= 5)
                    $j=5;
                else
                    $j=$result->num_rows;
                $i=0;
                while ($i < $j) {
                    $row = $result->fetch_assoc();
                    $i++;
                    echo "<p>$row[process] -- $row[ltime]</p>";
                }
            } else {
                echo "<p>لاگی موجود نمیباشد</p>";
            }
            ?>
        </div>
        <div class="col-11 col-lg-6 box-dashboard">
            <h4 class="usual_title">اعضای تازه اضافه شده</h4>
            <?php
            $sql = "SELECT * FROM student ORDER BY sid DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each
                if($result->num_rows >= 5)
                    $j=5;
                else
                    $j=$result->num_rows;
                $i=0;
                while ($i < $j) {
                    $row = $result->fetch_assoc();
                    $i++;
                    echo "<p>$row[sname] -- $row[sfamily] -- $row[sfilled] -- $row[status]</p>";
                }
            } else {
                echo "<p>کاربری موجود نمیباشد</p>";
            }
            ?>
        </div>
        <br>
        <div style="margin:10px" class="col-11 col-lg-4 box">
            <div class="box-info-purpule">
                <div class="row">
                    <div class="col-10">
                        تعداد کاربران<br>
                        <?php
                        $sql = "SELECT COUNT(sid) AS answer FROM student";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc())
                            {
                                echo "<small>$row[answer]</small>";
                            }
                        }

                        ?>
                    </div>
                    <div class="col-2">
                        <i style="color: white;float: left" class="fa fa-user"></i>
                    </div>
                </div>
            </div>
            <div class="box-info-yellow">

                <div class="row">
                    <div class="col-10">
                        تعداد کتاب های دیجیتال<br>
                        <?php
                        $sql = "SELECT COUNT(bid) AS answer FROM book";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc())
                            {
                                echo "<small>$row[answer]</small>";
                            }
                        }

                        ?>
                    </div>
                    <div class="col-2">
                        <i style="color: white;float: left" class="fa fa-book-atlas"></i>
                    </div>
                </div>
            </div>
            <div class="box-info-green">

                <div class="row">
                    <div class="col-10">
                        تعداد کتاب های فیزیکی<br>
                        <?php
                        $sql = "SELECT COUNT(rbid) AS answer FROM reservable_book";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc())
                            {
                                echo "<small>$row[answer]</small>";
                            }
                        }

                        ?>
                    </div>
                    <div class="col-2">
                        <i style="color: white;float: left" class="fa fa-book"></i>
                    </div>
                </div>
            </div>
            <div class="box-info-cyan">

                <div class="row">
                    <div class="col-10">
                        تعداد درخواست رزروها<br>
                        <?php
                        $sql = "SELECT COUNT(rrid) AS answer FROM request_reserve";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc())
                            {
                                echo "<small>$row[answer]</small>";
                            }
                        }

                        ?>
                    </div>
                    <div class="col-2">
                        <i style="color: white;float: left" class="fa fa-question"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-dashboard col-11 col-lg-4">
            <h4 class="usual_title">برخی همکاران شما</h4>
            <hr width="40px">
            <div class="row">
                <?php
                $sql = "SELECT * FROM student WHERE status=5 && scode !=$scode";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each
                    $i=0;
                    while ($row = $result->fetch_assoc()) {

                        $i++;
                        ?>
                        <div class="col-4">
                            <?php
                            echo "<img src=$row[img] width='65'>";
                            ?>
                        </div>
                        <div class="col-8">
                            <?php
                            echo "<p>$row[sname] $row[sfamily]</p>";
                            echo "<p>$row[smajor]</p>";
                            ?>
                        </div><hr>
                        <?php
                    }
                } else {
                    echo "<p>همکاری موجود نمیباشد</p>";
                }
                ?>
            </div>
        </div>
        <div class="box-dashboard col-11 col-lg-3">
            <h4 class="usual_title">
                ارسال اعلان
                <?php
                if(isset($_POST["sub-btn"]))
                {
                    $date=date("y-m-d--H:i:s");
                    $sql = "INSERT INTO `notification`( `ntitle`, `ndescription`, `from`, `reciver`, `ndate`, `nstatus`)
    VALUES ('$_POST[title]', '$_POST[description]', '$scode','$_POST[scode]','$date','$_POST[usertype]')";

                    if ($conn->query($sql) === TRUE) {
                        echo "<br><br><div class='alert alert-success'>اعلان با موفقت ارسال شد</div>";
                        insertLOG("$scode","0","ثبت اعلان");
                    } else {
                        echo "<br><br><div class='alert alert-danger'>اعلان با موفقت ارسال نشد</div>";
                    }
                }
                ?>
                <form method="post" action="">
                    <input name="scode" class="input-notif" type="text" placeholder="شماره دانشجویی برای ارسال تکی">
                    <br>
                    <br>
                    <input name="title" class="input-notif" type="text" placeholder="عنوان">
                    <br>
                    <br>
                    <select class="input-notif" name="usertype">
                        <option value="6">برای یک نفر</option>
                        <option value="2">برای دانشجو یا استادها</option>
                        <option value="1">برای همکار ها</option>
                        <option value="3">برای کتابدار ها</option>
                        <option value="4">برای ادمین ها</option>
                        <option value="5">برای همه</option>
                    </select>
                    <br>
                    <br>
                    <textarea name="description" class="input-notif" style="height: 60px" placeholder="متن اعلان"></textarea>
                    <br>
                    <br>

                    <button name="sub-btn" type="submit" class="btn btn-warning">ارسال اعلان</button>
                </form>
            </h4>
        </div>
    </div>

</div>


<?php include "footer.php"; ?>

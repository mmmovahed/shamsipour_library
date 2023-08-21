<?php
$tittle="داشبورد کاربری";
include "essential.php";
?>
    <div class="main-dashboard">
        <div class="alert alert-primary">
            <b>به پنل دانشجویی خوش آمدید</b>


            <br>
            <br>
            <?php
            $sql = "SELECT nid,ntitle FROM notification WHERE (nstatus=2 || nstatus=5 || (nstatus=6 && reciver=$scode)) ORDER BY nid DESC";
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
        <div class="container intourduce-admin-text">

            <br>
            <div class="row">
                <div class="col-lg-3"></div>
                <img class="col-12 col-lg-6 img-intourduce-box-admin" src="../assets/img/Student%20with%20laptop%20sitting%20on%20huge%20books%20in%20library.jpg">
                <div class="col-lg-3"></div>
            </div>

            <br>
            <h4>سلام ، به سامانه کتابخانه شهید شمسی پور خوش آمدید</h4>
            <p>
                سامانه کتابخانه شهید شمسی پور ، کتاب های رشته ی شمارا که در نوع خود بهترین هستند را جمع آوری کرده و همه را در سایت قابل استفاده کرده است.البته هنوز برای گروه های برق و حسابداری کمبود هایی در تعداد کتاب ها وجود دارد که با کمک شما و ارسال آنها در منوی همکاری ، این مشکل هم حل خواهد شد.
                <br>
                <br>
                اما از قابلیت هایی که میتوانید از آنها استفاده کنید
            <ul>
                <li>مشاهده کتاب ها به تفکیک رشته</li>
                <li>مشاهده خلاصه ای از هر کتاب و مشخصات آنها</li>
                <li>دانلود کردن به صورت فایل pdf</li>
                <li>
                    قابلیت های داشبورد کاربری
                    <ul>
                        <li>ارسال درخواست به کتابدار به منظور رزرو کتاب</li>
                        <li>ارسال تیکت</li>
                        <li>همکاری با کتابدار</li>
                        <li>ارسال انتقادات و پیشنهادات</li>
                        <li>و همچنین اطلاع از باگ ها سیستم</li>
                    </ul>
                </li>
            </ul>

            <br>
            <p>نکته:نحوه ی درخواست کتاب به این صورت است که شما درخواستی را مبنی بر امانت گرفتن کتاب برای کتابدار ارسال میکنید و ایشان بعد از مشاهده درخواست به شما اعلام میکنند که کتاب مذکور موجود میباشد یا خیر</p>
            </p>
        </div>


    </div>

<?php
include "../MasterPageOfFooterRelationship.php";
?>
<?php
if(!isset($_GET['book_id']) || empty($_GET['book_id']))
    header("Location:index.php");
else{
$tittle="سامانه کتابخانه دانشکده شهید شمسی پور";
include "MasterPageOfHeaderRelationship.php";
include "navbar.php";
include "assets/func/func.php";
include "connectToDB.php";


$book_id=$_GET['book_id'];

$sql = "SELECT * FROM book WHERE bid=$book_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if ($row["bstatus"]==1)
            $bookstatus="موجود برای دانلود";
        else if($row["bstatus"]==2)
            $bookstatus="موجود برای رزرو";
        else
            $bookstatus="در حال حاضر قابل دسترسی نمیباشد";


        ?>

        <div dir="ltr" class="book-into">
            <div class="row">
                <div dir="rtl" class="col-12 col-md-12 col-lg-8 book-box-name">
                    <h4><b><?php echo $row['bname']?></b></h4>
                    <br>
                    <p>گروه کتاب : <?php echo $row["bcategory"];?></>
                    <p>رشته تخصصی کتاب : <?php echo $row["bmajor"];?></>
                    <p>نویسنده کتاب : <?php echo $row["bauther"];?></>
                    <p>وضعیت کتاب کتاب : <?php echo $bookstatus;?></>

                </div>
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="book-img">
                        <img src="<?php echo $row["bimg"];?>" width="200" height="270">
                    </div>
                </div>
            </div>

        </div>
        <div class="container col-12">
            <div class="row">
                <div class="col-12 col-lg-4 book-info-box">
                    <h4><b><?php echo $row['bname']?></b></h4>
                    <br>
                    <p><i class="fa fa-layer-group"></i>گروه کتاب : <?php echo $row["bcategory"];?></p>
                    <p><i class="fa fa-book"></i>رشته تخصصی کتاب : <?php echo $row["bmajor"];?></p>
                    <p><i class="fa fa-user"></i>نویسنده کتاب : <?php echo $row["bauther"];?></p>
                    <p><i class="fa fa-user"></i>نشر : <?php echo $row["publisher"];?></p>
                    <p><i class="fa fa-calendar"></i>تاریخ انتشار  : <?php echo $row["publish_time"];?></p>
                    <p><i class="fa fa-edit"></i>نگارش  : <?php echo $row["bedition"];?></p>
                    <p><i class="fa fa-list-numeric"></i>تعداد صفحه کتاب : <?php echo $row["page_count"];?></p>
                    <p><i class="fa fa-cart-shopping"></i>وضعیت کتاب : <?php echo $bookstatus;?></p>
                    <p><i class="fa-solid fa-money-bill-1-wave"></i>قیمت کتاب : <?php echo $row["bprice"];?></p>
                    <p><i class="fa-solid fa-earth-americas"></i>زبان کتاب : <?php echo $row["blang"];?></p>
                    <p><i class="fa fa-star"></i>امتیاز کتاب : <?php echo $row["brate"];?></p>
                    <?php
                    if(isset($_COOKIE["usercode"]))
                    {
                    ?>
                    <div class="col-12 ticketbox-book">
                        <a href="Dashboard/sentTicket.php" style="color:#7161EF;">
                            <div><i class="fa fa-ticket"></i></div>
                            <br>
                            در صورت وجود مشکل تیکت بزنید.
                        </a>

                    </div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="col-12 ticketbox-book">
                            <a href="login.php" style="color:#7161EF;">
                                <div><i class="fa fa-ticket"></i></div>
                                <br>
                                در صورت وجود مشکل تیکت بزنید.
                            </a>

                        </div>
                         <?php
                    }
                    ?>
                    <br>
                    <button type="submit" class="btn-download"><a href="<?php echo $row["download_link"]?>" download> دانلود کتاب <i class="fa fa-download"></i> </a></button>
                    <?php
                    if($row["password_link"] != ""){
                    ?>
                    <div class="col-12 copy-password-box row">
                        <div class="col-7"><?php echo $row["password_link"];?></div>
                        <input type="text" style="display: none" id="copytext" value="<?php echo $row["password_link"];?>">
                        <div class="col-5">|<button id="liveToastBtn" onclick="copypassword()"  type="submit" class="btn-copy"><i style="font-size:20px;" class="fa fa-copy"></i></button></div>

                        <script>
                            function copypassword() {
                                var copyText = document.getElementById("copytext");
                                copyText.select();
                                copyText.setSelectionRange(0, 99999); // For mobile devices
                                navigator.clipboard.writeText(copyText.value);
                                document.getElementById("liveToastBtn").innerHTML="کپی شد !";
                            }
                        </script>
                    </div>
                        <?php
                    }
                        ?>
                </div>
                <div class="col-12 col-lg-7 book-box">
                    <?php
                    $string=$row["bdescription"];
                    if (!preg_match('/^[^\x{600}-\x{6FF}]+$/u', str_replace("\\\\", "", $string))) {
                        echo "<div class='decription' dir='rtl'><h4>توضیحات : </h4>"."<br>".$string;
                    }
                    else {
                        echo "<div class='decription' dir='ltr'><h4>Description : </h4>"."<br>".$string;
                    }
                            ?>



                </div>
            </div>
        </div>
</div>
        <br>
        <br>





        <?php
    }
} else {
    echo "0 results";
}
$conn->close();
}
?>

<?php include "footer.php"?>

<?php include "MasterPageOfFooterRelationship.php";?>
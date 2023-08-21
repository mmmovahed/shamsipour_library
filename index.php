<?php
$tittle="سامانه کتابخانه دانشکده شهید شمسی پور";
include "MasterPageOfHeaderRelationship.php";
include "navbar.php";
include "assets/func/func.php";
include "connectToDB.php";
?>
<div class="col-12 col-lg-12 mainlanding ">

    <div class="container">
        <div class="row">
            <div class="col-1 col-lg-3"></div>
            <div class="col-10 col-lg-6">
                <img style="filter: brightness(0) invert(1);" src="assets/img/1200px-STVC.svg.png" width="40%" class="rounded mx-auto d-block">
                <br>
                <h1 class="title-landing">به سامانه کتابخانه دانشکده شهید شمسی پور خوش آمدید</h1>
                <br>
                <form class="form-input-search col-7" method="get" action="">
                    <input  onkeyup="showResult(this.value)" type="text" name="search-input" placeholder="دنبال چه کتابی میگردی؟" class="input-search ">
                    <button name="search-btn" class="btn-search disable"><i class="fa fa-search"></i></button>
                    <div id="result-search" class="result-search">
                        <h4 class="usual_title" id="txtHint"></h4>
                    </div>
                    <script>
                        function showResult(str) {
                            if (str.length < 4 ) {
                                document.getElementById("txtHint").innerHTML = "empty";
                                document.getElementById("result-search").style.display="none";

                                return;
                            } else {
                                document.getElementById("result-search").style.display="block";

                                var xmlhttp = new XMLHttpRequest();
                                xmlhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        document.getElementById("txtHint").innerHTML = this.responseText;
                                    }
                                };
                                var path="livesearch.php?q="+str;
                                xmlhttp.open("GET",path,true);
                                xmlhttp.send();
                            }
                        }
                    </script>
                </form>
                <br>
                <br>
            </div>
            <div class="col-1 col-lg-3"></div>
        </div>
    </div>
</div>
<div class="col-12 container ">
    <img src="https://www.nlai.ir/nlai-theme/images/custom/logo.png" class="col-11 col-lg-3 rounded mx-auto d-block" style="margin:10px 0">
    <hr width="100" style="margin: 10px auto">
    <div class="row container">
        <div class="irlib col-4 col-lg-2">
            <a target="_blank" href="https://docs.nlai.ir/" class="link-irlib">
            <img src="https://hmi.nlai.ir/static/images/document.svg" width="50">
            <h6>شبکه مراکز اسناد کشور</h6>
            </a>
        </div>
        <div class="irlib col-4 col-lg-2">
            <a target="_blank" href="https://libs.nlai.ir/" class="link-irlib">
            <img src="https://hmi.nlai.ir/static/images/library.svg" width="50">
            <h6>شبکه کتابخانه‌های کشور</h6>
            </a>
        </div>
        <div class="irlib col-4 col-lg-2">
            <a target="_blank" href="https://sana.nlai.ir/" class="link-irlib">
            <img src="http://portals.nlai.ir/images/sana.svg" width="50">
            <h6>سنا (سامانه نشریات ایران)</h6>
            </a>
        </div>
        <div class="irlib col-4 col-lg-2">
            <a target="_blank" href="https://iranjournals.nlai.ir/" class="link-irlib">
            <img src="http://portals.nlai.ir/images/iranjournal.svg" width="50">
            <h6>سامانه نشریات علمی ایران</h6>
            </a>
        </div>
        <div class="irlib col-4 col-lg-2">
            <a target="_blank" href="http://dl.nlai.ir/" class="link-irlib">
            <img src="http://portals.nlai.ir/images/dl.svg" width="50">
            <h6>کتابخانه دیجیتال</h6>
            </a>
        </div>
       <div class="irlib col-4 col-lg-2">
           <a target="_blank" href="http://nlai.ir/digital-donation/" class="link-irlib">
                <img src="http://portals.nlai.ir/images/donation.svg" width="50">
                <h6>اهدای منابع دیجیتال</h6>
            </a>
       </div>
    </div>

</div>
<br>
<br>
<br>
<div class="container">
    <h1 style="" class="title-stepper">برای ثبت نام باید چی کار کنم؟</h1>
    <div class="stepper-main">
    <div di class="stepper d-flex flex-column mt-5 ml-2">
        <div class="d-flex mb-1">
            <div class="d-flex flex-column pr-4 align-items-center">
                <div class="rounded-circle py-2 px-3 bg-primary text-white mb-1">1</div>
                <div class="line h-100"></div>
            </div>
            <div>
                <h5 class="text-dark">گام اول</h5>
                <p class="lead text-muted pb-3">در مرحله اول شما بایستی در سایت ثبت نام کنید و موارد خواسته شده را وارد کنید.</p>
            </div>
        </div>
        <div class="d-flex mb-1">
            <div class="d-flex flex-column pr-4 align-items-center">
                <div class="rounded-circle py-2 px-3 bg-primary text-white mb-1">2</div>
                <div class="line h-100"></div>
            </div>
            <div>
                <h5 class="text-dark">گام دوم</h5>
                <p class="lead text-muted pb-3">کتابدار کتابخانه اطلاعات شما را دریافت و صحت آنها را چک میکند و در صورت درستی دسترسی شما برای استفاده از ابزار ها باز میشود</p>
            </div>
        </div>
        <div class="d-flex mb-1">
            <div class="d-flex flex-column pr-4 align-items-center">
                <div class="rounded-circle py-2 px-3 bg-primary text-white mb-1">3</div>
                <div class="line h-100 d-none"></div>
            </div>
            <div>
                <h5 class="text-dark">گام سوم</h5>
                <p class="lead text-muted pb-3">با نام کاربری و گذرواژه وارد سیستم شده و از امکانات آن استفاده نمایید</p>
            </div>
        </div>
    </div>
</div>
</div>
<br>
<div class="col-12" style="padding: 10px;background-color: #eee">
<div class="row col-12 col-lg-7" style="margin: auto">
    <?php
    $sql = "SELECT nid, ntitle, nimg,ncontent FROM news WHERE nstatus=1 ORDER BY nid DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
?>
      <div class="box-news box-news-bigger col-12 col-lg-7 row">
          <div class="col-4 col-lg-4">
              <img class="col-12" src=<?php echo $row['nimg'];?>>
          </div>
          <div class="col-8 col-lg-8">
              <h5><a href="shownews.php?id=<?php echo $row['nid']?>"><?php echo $row['ntitle'];?></a></h5>
              <p><?php echo short_content_intorducing($row['nimg']);?></p>
          </div>
      </div>
    <?php

} else {
        echo "0 results";
    }
    ?>

    <div class=" col-12 col-lg-5">
        <?php
        $sql = "SELECT nid, ntitle, nimg,ncontent FROM news WHERE nstatus=2 ORDER BY nid DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $i=1;
            while($i<=2) {
                $row = $result->fetch_assoc();
                ?>
                <div class="box-news col-12 col-lg-12 row">
                    <div class="col-4 col-lg-3">
                        <img class="col-12" src=<?php echo $row['nimg']?>>
                    </div>
                    <div class="col-8 col-lg-9">
                        <h6><a href="shownews.php?id=<?php echo $row['nid']?>"><?php echo $row['ntitle']?></a></h6>
                    </div>
                </div>
                <?php
                $i++;
            }
        } else {
            echo "0 results";
        }
        ?>


    </div>
</div>
</div>

<br>

<div style="background-color: black;">
<div class="quote-1">
<h1 style="padding: 5% 15%;" class="title-landing">
    اگر میخواهی راحت باشی کمتر بدان واگر میخواهی خوشبخت باشی بیشتر بخوان ؛
<br>
    با اینحال ، خوشبختی را بر راحتی های زودگذر ارجح بدان …
</h1>
</div>
</div>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-3 img-fluid">
            <a href="technical_book.php?major=1"><img src="assets/img/0001.jpg" style="width: 100%" class="book-genre-img"></a>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <a href="technical_book.php?major=2"><img src="assets/img/0002.jpg" style="width: 100%" class="book-genre-img"></a>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <a href="technical_book.php?major=3"><img src="assets/img/0003.jpg" style="width: 100%" class="book-genre-img"></a>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <a href="technical_book.php?major=4"><img src="assets/img/0004.jpg" style="width: 100%" class="book-genre-img"></a>
        </div>
    </div>
</div>

<br>
<br>

<div class="col-12 col-lg-12 intorduce-box">
    <div class="container">
        <div class="row col-12 col-lg-12" style="margin-right: 0px;">
            <h5 class="usual_title">مفید ترین کتاب ها در گروه کامپیوتر</h5>
            <?php


            $sql = "SELECT * FROM book WHERE bcategory='کامپیوتر' ORDER BY brate DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                $i=0;
                while($i<4) {
                    $row = $result->fetch_assoc();
                    $i++;
                    ?>


                    <div class="col-12 col-md-6 col-lg-3 intorduce-box-card-purpule-gray">
                <h6><?php echo $row["bname"]?></h6>
                        <?php
                        $string=$row["bdescription"];
                        if (!preg_match('/^[^\x{600}-\x{6FF}]+$/u', str_replace("\\\\", "", $string))) {
                            ?><p>
                            <?php
                               echo(short_content($row["bdescription"]));
                            ?>
                        </p>
                        <?php
                        } else {
                            ?>
                            <p style="text-align: justify;direction: ltr;">
                                Description : <br>
                            <?php
                            echo(short_content($row["bdescription"]));
                            ?>

                            </p>
                            <?php
                        }
                        ?>
                <hr>
                <div class="row">
                    <div class="col-12"><span style="font-size: 13px;"><i class="fa fa-user"></i>نویسنده : <?php echo $row["bauther"]?></span></div>
                    <div class="col-12"><span style="font-size: 13px;"><i class="fa fa-language"></i>زبان : <?php echo $row["blang"]?></span></div>
                    <div class="col-12"><span style="font-size: 13px;"><i class="fa fa-magnifying-glass"></i>رشته ی تخصصی : <?php echo $row["bmajor"]?></span></div>
                    <div class="col-12"><span style="font-size: 13px;"><i class="fa fa-star"></i>امتیاز : <?php echo $row["brate"]?></span></div>

                    <div class="col-12">
                        <button type="submit" class="btn-intorduce-box-purpule-gray" ><a href="Book_Page.php?book_id=<?php echo $row['bid'];?>">ادامه ...</a></button>
                    </div>
                </div>
            </div>
            <?php
            }
            } else {
                echo "0 results";
            }

            ?>
         </div>
    </div>
</div>


<br>
<br>
<div class="jumbotron">
    <div class="" style="background: rgba(0,0,0,0.5);z-index: 2;height: inherit;">
        <br>
        <br>
     <br>
        <h1 class="display-4">به زودی</h1>
        <p class="lead">کتاب های رشته های الکترونیک و حسابداری به تعداد بیشتری اضافه میشوند<br>البته با کمک شما

            <br>
            <br>
            <br>
            <br>
            <br>
    </div>
</div>
<br>
<br>


<div class="col-12 col-lg-12 intorduce-box">
    <div class="container">
        <div class="row col-12 col-lg-12" style="margin-right: 0px;">
            <h5 class="usual_title">مفید ترین کتاب ها در گروه الکترونیک</h5>
            <?php


            $sql = "SELECT * FROM book WHERE bcategory='الکترونیک' ORDER BY brate DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                $i=0;
                while($i<3) {
                    $row = $result->fetch_assoc();
                    $i++;
                    ?>


                    <div class="col-12 col-md-6 col-lg-3 intorduce-box-card-blue-gray">
                        <h6><?php echo $row["bname"]?></h6>
                        <?php
                        $string=$row["bdescription"];
                        if (!preg_match('/^[^\x{600}-\x{6FF}]+$/u', str_replace("\\\\", "", $string))) {
                            ?><p>
                            <?php
                            echo(short_content($row["bdescription"]));
                            ?>
                            </p>
                            <?php
                        } else {
                            ?>
                            <p style="text-align: justify;direction: ltr;">
                                Description : <br>
                                <?php
                                echo(short_content($row["bdescription"]));
                                ?>

                            </p>
                            <?php
                        }
                        ?>
                        <hr>
                        <div class="row">
                            <div class="col-12"><span style="font-size: 13px;"><i class="fa fa-user"></i>نویسنده : <?php echo $row["bauther"]?></span></div>
                            <div class="col-12"><span style="font-size: 13px;"><i class="fa fa-language"></i>زبان : <?php echo $row["blang"]?></span></div>
                            <div class="col-12"><span style="font-size: 13px;"><i class="fa fa-magnifying-glass"></i>رشته ی تخصصی : <?php echo $row["bmajor"]?></span></div>
                            <div class="col-12"><span style="font-size: 13px;"><i class="fa fa-star"></i>امتیاز : <?php echo $row["brate"]?></span></div>

                            <div class="col-12">
                                <button type="submit" class="btn-intorduce-box-blue-gray" ><a href="Book_Page.php?book_id=<?php echo $row['bid'];?>">ادامه ...</a></button>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "0 results";
            }

            ?>
           </div>
    </div>
</div>
<br>
<br>

<div class="col-12 col-lg-12 intorduce-box">
    <div class="container">
        <div class="row col-12 col-lg-12" style="margin-right: 0px;">
            <h5 class="usual_title">مفید ترین بلاگ ها</h5>

                <?php


                $sql = "SELECT * FROM blog WHERE status > 0 ORDER BY brate DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                $j=0;
                while($j<3) {
                $row = $result->fetch_assoc();
                $j++;
                ?>
            <div class="col-11 col-lg-4" style="margin: 0 ;">
                <div class="usual-box blog-box" style="padding: 9px 15px;">
                    <?php
                    $tag=array("tag-pink","tag-red","tag-blue","tag-green","tag-orange");
                    $i=rand(0,4);
                    ?>
                    <span class="<?php echo $tag[$i];?>" style="margin-top: -15px;"><?php echo $row["major"];?></span>
                    <?php
                    if($row["status"]<=0)
                        echo"<span class='tag-black'>غیرفعال</span>";
                    ?>


                    <br>
                    <div><a href="show_blog.php?id=<?php echo $row['blid'];?>"><img src="<?php echo $row["bimg"];?>" class="col-12 shadow p-2 bg-white rounded"></a></div>
                    <div class="row">
                        <div class="col-6" style="text-align: right" dir="ltr"><?php echo $row["bview"];?><i class="fa fa-eye" style="font-size: 12px;"></i></div>
                        <div class="col-6" style="text-align: left"><?php echo $row["date"];?></div>
                    </div>
                    <p><?php echo $row["btitle"];?></p>

                </div>
            </div>
            <?php

                }
                }else
                {
                    echo "بلاگی موجود نیست";
                }
            ?>
        </div>
    </div>
    <br>
</div>
<br>
<br>
<div class="col-12 col-lg-12 intorduce-box">
    <div class="container">
        <div class="row col-12 col-lg-12" style="margin-right: 0px;">
            <h5 class="usual_title">مفید ترین کتاب ها در گروه حسابداری</h5>
            <?php

            $sql = "SELECT * FROM book WHERE bcategory='حسابداری' ORDER BY brate DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                $i=0;
                while($i<3) {
                    $row = $result->fetch_assoc();
                    $i++;
                    ?>


                    <div class="col-12 col-md-6 col-lg-3 intorduce-box-card-yellow-gray">
                        <h6><?php echo $row["bname"]?></h6>
                        <?php
                        $string=$row["bdescription"];
                        if (!preg_match('/^[^\x{600}-\x{6FF}]+$/u', str_replace("\\\\", "", $string))) {
                            ?><p>
                            <?php
                            echo(short_content($row["bdescription"]));
                            ?>
                            </p>
                            <?php
                        } else {
                            ?>
                            <p style="text-align: justify;direction: ltr;">
                                Description : <br>
                                <?php
                                echo(short_content($row["bdescription"]));
                                ?>

                            </p>
                            <?php
                        }
                        ?>
                        <hr>
                        <div class="row">
                            <div class="col-12"><span style="font-size: 13px;"><i class="fa fa-user"></i>نویسنده : <?php echo $row["bauther"]?></span></div>
                            <div class="col-12"><span style="font-size: 13px;"><i class="fa fa-language"></i>زبان : <?php echo $row["blang"]?></span></div>
                            <div class="col-12"><span style="font-size: 13px;"><i class="fa fa-magnifying-glass"></i>رشته ی تخصصی : <?php echo $row["bmajor"]?></span></div>
                            <div class="col-12"><span style="font-size: 13px;"><i class="fa fa-star"></i>امتیاز : <?php echo $row["brate"]?></span></div>

                            <div class="col-12">
                                <button type="submit" class="btn-intorduce-box-yellow-gray" ><a href="Book_Page.php?book_id=<?php echo $row['bid'];?>">ادامه ...</a></button>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "0 results";
            }
            ?>
            </div>
    </div>
</div>
<br>
<br>

<div class="col-12 col-lg-12 intorduce-box">
    <div class="container">
        <div class="row col-12 col-lg-12" style="margin-right: 0px;">
            <h5 class="usual_title">مفید ترین کتاب های زبان فارسی</h5>
            <?php

            $sql = "SELECT * FROM book WHERE blang='فارسی' ORDER BY brate DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $i=0;
                while($i<3) {
                    $row = $result->fetch_assoc();
                    $i++;
                    ?>


                    <div class="col-12 col-md-6 col-lg-3 intorduce-box-card-purpule-gray">
                        <h6><?php echo $row["bname"]?></h6>
                        <?php
                        $string=$row["bdescription"];
                        if (!preg_match('/^[^\x{600}-\x{6FF}]+$/u', str_replace("\\\\", "", $string))) {
                            ?><p>
                            <?php
                            echo(short_content($row["bdescription"]));
                            ?>
                            </p>
                            <?php
                        } else {
                            ?>
                            <p style="text-align: justify;direction: ltr;">
                                Description : <br>
                                <?php
                                echo(short_content($row["bdescription"]));
                                ?>

                            </p>
                            <?php
                        }
                        ?>
                        <hr>
                        <div class="row">
                            <div class="col-12"><span style="font-size: 13px;"><i class="fa fa-user"></i>نویسنده : <?php echo $row["bauther"]?></span></div>
                            <div class="col-12"><span style="font-size: 13px;"><i class="fa fa-language"></i>زبان : <?php echo $row["blang"]?></span></div>
                            <div class="col-12"><span style="font-size: 13px;"><i class="fa fa-magnifying-glass"></i>رشته ی تخصصی : <?php echo $row["bmajor"]?></span></div>
                            <div class="col-12"><span style="font-size: 13px;"><i class="fa fa-star"></i>امتیاز : <?php echo $row["brate"]?></span></div>

                            <div class="col-12">
                                <button type="submit" class="btn-intorduce-box-purpule-gray" ><a href="Book_Page.php?book_id=<?php echo $row['bid'];?>">ادامه ...</a></button>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "0 results";
            }
            ?>
           </div>
    </div>
</div>
<br>
<br>
<div class="col-12 col-lg-12 intorduce-box">
    <div class="container">
        <div class="row col-12 col-lg-12" style="margin-right: 0px;">
            <h5 class="usual_title">مفید ترین کتاب های زبان انگلیسی</h5>
            <?php

            $sql = "SELECT * FROM book WHERE blang='انگلیسی' ORDER BY brate DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                $i=0;
                while($i<3) {
                    $row = $result->fetch_assoc();
                    $i++;
                    ?>


                    <div class="col-12 col-md-6 col-lg-3 intorduce-box-card-blue-gray">
                        <h6><?php echo $row["bname"]?></h6>
                        <?php
                        $string=$row["bdescription"];
                        if (!preg_match('/^[^\x{600}-\x{6FF}]+$/u', str_replace("\\\\", "", $string))) {
                            ?><p>
                            <?php
                            echo(short_content($row["bdescription"]));
                            ?>
                            </p>
                            <?php
                        } else {
                            ?>
                            <p style="text-align: justify;direction: ltr;">
                                Description : <br>
                                <?php
                                echo(short_content($row["bdescription"]));
                                ?>

                            </p>
                            <?php
                        }
                        ?>
                        <hr>
                        <div class="row">
                            <div class="col-12"><span style="font-size: 13px;"><i class="fa fa-user"></i>نویسنده : <?php echo $row["bauther"]?></span></div>
                            <div class="col-12"><span style="font-size: 13px;"><i class="fa fa-language"></i>زبان : <?php echo $row["blang"]?></span></div>
                            <div class="col-12"><span style="font-size: 13px;"><i class="fa fa-magnifying-glass"></i>رشته ی تخصصی : <?php echo $row["bmajor"]?></span></div>
                            <div class="col-12"><span style="font-size: 13px;"><i class="fa fa-star"></i>امتیاز : <?php echo $row["brate"]?></span></div>

                            <div class="col-12">
                                <button type="submit" class="btn-intorduce-box-blue-gray" ><a href="Book_Page.php?book_id=<?php echo $row['bid'];?>">ادامه ...</a></button>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "0 results";
            }
            $conn->close();

            ?>
         </div>
    </div>
</div>

<br>
<div style="background-color: black;">
    <div class="quote-2">
        <h1 style="padding: 5% 15%;" class="title-landing">
            مطالعه کتاب یعنی استحمام مغز<br>
            مطالعه کتاب یعنی تبدیل ساعات ملامت بار به ساعات لذت بخش
        </h1>
    </div>
</div>
<br>
<?php include "footer.php"?>
<?php include "MasterPageOfFooterRelationship.php";?>

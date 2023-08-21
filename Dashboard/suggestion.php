<?php
$tittle="داشبورد کاربری|پیشنهادات و انتقادات";
include "essential.php";
?>
<div class="main-dashboard">
    <div class="alert alert-primary">
        پیشنهادات و انتقادات شما در روند بهبود کار پروژه کمک میکند
        <br>
        پیشاپیش از این کمک شما سپاسگزاریم
    </div>
    <br>
    <table class="table table-striped table-info bg-primary">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ایدی تیکت</th>
            <th scope="col">عنوان</th>
            <th scope="col">توضیحات</th>
            <th scope="col">تاریخ</th>
            <th scope="col">وضعیت</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $sql ="SELECT * FROM `request` WHERE scode=".$_COOKIE['usercode']."&& title='انتقادات و پیشنهادات'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            $i=0;
            $status="";
            while($row = $result->fetch_assoc()) {
                $i++;
                if ($row['rstatus']==0)
                {
                    $status="<span class='tag-black'>مشاهده نشده</span>";

                }
                else if($row['rstatus']==1)
                {
                    $status="<span class='tag-red'>رد شده</span>";

                }
                else if($row['rstatus']==2)
                {
                    $status="<span class='tag-green'>انجام شده</span>";

                }
                ?>
                <tr>
                    <th scope="row"><?php echo $i;?></th>
                    <td><?php echo $row['rid'];?></td>
                    <td><?php echo $row['title'];?></td>
                    <td><?php echo short_content($row['description']);?></td>
                    <td><?php echo $row['rtime'];?></td>
                    <td><?php echo $status;?></td>

                </tr>
                <?php
            }
        }
        else{
            ?>
            <tr>
                <th colspan="7">پیشنهادی موجود نیست</th>
            </tr>
            <?php
        }

        ?>

        </tbody>
    </table>


    <?php


    if(isset($_POST['sub-btn']))
    {
        $usercode=$_COOKIE["usercode"];
//        $tittle=$_POST["title"];
        $description=$_POST['description'];
        $date=date("Y-m-d-H:i:s");
        $sql = "INSERT INTO `request`(`scode`, `title`, `description`, `rtime`, `rstatus`) VALUES ('$usercode','انتقادات و پیشنهادات','$description','$date',0)";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>پیشنهاد با موفقیت اضافه گردید</div>";
            insertLOG("$usercode","0","اضافه کردن پیشنهاد");
        } else {
            echo "<div class='alert alert-danger'>پیشنهاد با موفقیت اضافه نگردید</div>";
        }

        $conn->close();
    }

    ?>
    <form class="form-bug" method="post" action="">
        <input type="text" name="title" disabled value="انتقادات و پیشنهادات" >
        <br><br>
        <textarea style="width: 80%" maxlength="250" name="description" placeholder="شرح ... حداکثر 250 حرف"></textarea><br><br>
        <input class="btn btn-success" type="submit" name="sub-btn" value="ارسال ">
        <input class="btn btn-danger" type="reset" name="sub-btn" value="بازنویسی"><br>

    </form>

</div>
<?php
include "../MasterPageOfFooterRelationship.php";
?>


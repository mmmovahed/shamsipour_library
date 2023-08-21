<?php
$tittle="داشبورد کاربری|نمایش رزرو";
include "essential.php";
?>
<div class="main-dashboard">

    <div class="alert alert-danger just-in-phone">برای رزرو از کامپیوتر استفاده کنید</div>
    <div class="alert alert-primary">در صورت قبول شدن درخواست ، در تاریخ وارد شده مراجعه کنید</div>
    <div class="alert alert-warning">در صورت بروز مشکل ، تیکت بزنید</div>
    <table class="table table-striped table-info bg-primary">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ایدی کتاب</th>
            <th scope="col">اسم کتاب</th>
            <th scope="col">تاریخ</th>
            <th scope="col">توضیحات</th>
            <th scope="col">وضعیت</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $sql ="SELECT * FROM `request_reserve` WHERE scode=".$_COOKIE['usercode']." ORDER BY rrid DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            $i=0;
            $status="";
            while($row = $result->fetch_assoc()) {
                $i++;
                if ($row['status']==0)
                {
                    $status="<span class='tag-black'>مشاهده نشده</span>";

                }
                else if($row['status']==1)
                {
                    $status="<span class='tag-pink'>موجود نیست</span>";

                }
                else if($row['status']==2)
                {
                    $status="<span class='tag-orange'>تاریخ انتخابی در دسترس نیست</span>";

                }
                else if($row['status']==3)
                {
                    $status="<span class='tag-red'>رد شده</span>";

                }
                else if($row['status']==4)
                {
                    $status="<span class='tag-green'>قبول شده</span>";

                }
                else if($row['status']==5)
                {
                    $status="<span class='tag-blue'>حضوری درخواست کنید</span>";

                }
                ?>
                <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $row['rbid'];?></td>
                        <td><?php echo $row['rbname'];?></td>
                        <td><?php echo $row['date'];?></td>
                        <td><?php echo $row['description'];?></td>
                        <td><?php echo $status;?></td>

                </tr>
                <?php
            }
        }
        else{
            ?>
            <tr>
                <th colspan="7">کتاب انتخابی قابل رزرو موجود نیست</th>
            </tr>
            <?php
        }

        ?>

        </tbody>
    </table>


</div>
<?php
include "../MasterPageOfFooterRelationship.php";
?>


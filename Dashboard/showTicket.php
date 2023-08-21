<?php
$tittle="داشبورد کاربری|نمایش تیکت";
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
            <th scope="col">ایدی تیکت</th>
            <th scope="col">عنوان</th>
            <th scope="col">توضیحات</th>
            <th scope="col">تاریخ</th>
            <th scope="col">وضعیت</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $sql ="SELECT * FROM `ticket` WHERE scode=".$_COOKIE['usercode']." ORDER BY tid DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            $i=0;
            $status="";
            while($row = $result->fetch_assoc()) {
                $i++;
                if ($row['tstatus']==0)
                {
                    $status="<span class='tag-black'>مشاهده نشده</span>";

                }
                else if($row['tstatus']==1)
                {
                    $status="<span class='tag-red'>رد شده</span>";

                }
                else if($row['tstatus']==2)
                {
                    $status="<span class='tag-green'>انجام شده</span>";

                }
                else if($row['tstatus']==3)
                {
                    $status="<span class='tag-blue'>حضوری درخواست کنید</span>";

                }
                else if($row['tstatus']==4)
                {
                    $status="<a href='showticketanswer.php?id=$row[tid]'><span class='tag-pink'>پاسخ داده شده</span></a>";

                }
                ?>
                <tr>
                    <th scope="row"><?php echo $i;?></th>
                    <td><?php echo $row['tid'];?></td>
                    <td><?php echo $row['ttitle'];?></td>
                    <td><?php echo short_content($row['tdescription']);?></td>
                    <td><?php echo $row['tdate'];?></td>
                    <td><?php echo $status ;?></td>

                </tr>
                <?php
            }
        }
        else{
            ?>
            <tr>
                <th colspan="7">تیکتی موجود نیست</th>
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


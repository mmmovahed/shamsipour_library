<?php
$tittle="مدیریت تیکت ها";
include "essential.php"
?>
<div class="main-dashboard">
    <h4 class="usual_title">تیکت ها</h4>
    <div class="alert alert-danger d-none d-sm-block d-md-none">برای مشاهده با کامپیوتر وارد شوید</div>
    <div class="alert alert-danger d-block d-sm-none">برای مشاهده با کامپیوتر وارد شوید</div>
    <div class="d-none d-md-block">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">شماره دانشجویی</th>
                <th scope="col">عنوان</th>
                <th scope="col">توضیحات</th>
                <th scope="col">وضعیت</th>
                <th scope="col">ویرایش</th>
                <th scope="col">حذف</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM ticket ORDER BY tid DESC";
            $result = $conn->query($sql);
            $results_per_page = 15;
            $number_of_result = mysqli_num_rows($result);
            $number_of_page = ceil ($number_of_result / $results_per_page);
            if (!isset ($_GET['page']) ) {
                $page  =1;
            } else {
                $page = $_GET['page'];
            }
            $page_first_result = ($page-1) * $results_per_page;
            $query = "SELECT * FROM ticket ORDER BY tid DESC LIMIT " . $page_first_result . ',' . $results_per_page;
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
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
                    $status="<span class='tag-orange'>حضوری درخواست کنید</span>";

                }
                else if($row['tstatus']==4)
                {
                    $status="<span class='tag-blue'>پاسخ داده شده</span>";

                }
                ?>
                <tr>
                    <th scope="row"><?php echo $row['tid']?></th>
                    <td><?php echo $row['scode']?></td>
                    <td><?php echo $row['ttitle']?></td>
                    <td><?php echo short_content($row['tdescription']);?></td>
                    <td><?php echo $status;?></td>
                    <td><button class="btn btn-info"><a href="answerticket.php?id=<?php echo $row['tid']?>">ویرایش</a></button> </td>
                    <td><button class="btn btn-danger"><a style="color: white" href="delticket.php?id=<?php echo $row['tid']?>">حذف</a></button> </td>

                </tr>
            <?php
            }
            ?>

            </tbody>
        </table>

        <nav aria-label='Page navigation example'>
            <ul class='pagination'>
        <?php

        for($page = 1; $page<= $number_of_page; $page++) {
            echo "<li class='page-item'><a class='page-link' href='tickets.php?page=$page'>$page</a></li> ";
        }
        ?>
            </ul>
        </nav>
        <?php
        $conn->close();
        ?>
    </div>
</div>
<?php
include "footer.php";
?>

<?php
$tittle="مدیریت رزرو ها";
include "essential.php"
?>
<div class="main-dashboard">
    <h4 class="usual_title">رزرو ها</h4>
    <div class="alert alert-danger d-none d-sm-block d-md-none">برای مشاهده با کامپیوتر وارد شوید</div>
    <div class="alert alert-danger d-block d-sm-none">برای مشاهده با کامپیوتر وارد شوید</div>
    <div class="d-none d-md-block">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">شماره دانشجویی</th>
                <th scope="col">کتاب</th>
                <th scope="col">تاریخ</th>
                <th scope="col">وضعیت</th>
                <th scope="col">قبول</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM `request_reserve` ORDER BY rrid DESC";
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
            $query = "SELECT * FROM `request_reserve` ORDER BY rrid DESC LIMIT " . $page_first_result . ',' . $results_per_page;
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
                if ($row['status']==0)
                {
                    $status="<span class='tag-black'>مشاهده نشده</span>";

                }
                else if($row['status']==1)
                {
                    $status="<span class='tag-pink'> رد شده به دلیل موجودی</span>";

                }
                else if($row['status']==2)
                {
                    $status="<span class='tag-orange'> رد شده به دلیل تاریخ انتخابی</span>";

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
                    <th scope="row"><?php echo $row['rrid']?></th>
                    <td><?php echo $row['scode']?></td>
                    <td><?php echo $row['rbname']?></td>
                    <td><?php echo $row['description'];?></td>
                    <td><?php echo $status;?></td>
                    <form method="post" action="answerreserve.php">
                        <input type="hidden" name="id" value=<?php echo $row['rrid'];?>>
                        <td><button class="btn btn-info" name="accept-btn">پاسخ</button> </td>
                    </form>
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
            echo "<li class='page-item'><a class='page-link' href='reserve.php?page=$page'>$page</a></li> ";
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

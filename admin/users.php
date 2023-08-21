<?php
$tittle="مدیریت کاربران";
include "essential.php";
?>
<div class="main-dashboard">
    <h4 class="usual_title">کاربران<button onclick="showformadduser()" style="float: left" class="btn btn-success"><i class="fa-add"></i></button></h4>
    <div class="alert alert-danger d-none d-sm-block d-md-none">برای مشاهده با کامپیوتر وارد شوید</div>
    <div class="alert alert-danger d-block d-sm-none">برای مشاهده با کامپیوتر وارد شوید</div>
    <div class="d-none d-md-block">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">نام و نام خانوادگی</th>
                <th scope="col">شماره دانشجویی</th>
                <th scope="col">مقطع</th>
                <th scope="col">رشته تخصصی</th>
                <th scope="col">وضعیت</th>
                <th scope="col">ویرایش</th>
                <th scope="col">حذف</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM student ORDER BY sid DESC";
            $result = $conn->query($sql);
            $results_per_page = 10;
            $number_of_result = mysqli_num_rows($result);
            $number_of_page = ceil ($number_of_result / $results_per_page);
            if (!isset ($_GET['page']) ) {
                $page  =1;
            } else {
                $page = $_GET['page'];
            }
            $page_first_result = ($page-1) * $results_per_page;
            $query = "SELECT *FROM student LIMIT " . $page_first_result . ',' . $results_per_page;
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <th scope="row"><?php echo $row['sid']?></th>
                    <td><?php echo $row['sname']." ".$row['sfamily']?></td>
                    <td><?php echo $row['scode']?></td>
                    <td><?php echo $row['smajor']?></td>
                    <td><?php echo $row['sfilled']?></td>

                    <?php
                    if($row["status"]==-1)
                        $msg="<span class='tag-black'>غیرفعال شده</span>";
                    else if($row["status"]==0)
                        $msg="<span class='tag-green'>تایید نشده</span>";
                    else if($row["status"]==1)
                        $msg="<span class='tag-orange'>دانشجو</span>";
                    else if($row["status"]==2)
                        $msg="<span class='tag-blue'>استاد</span>";
                    else if($row["status"]==3)
                        $msg="<span class='tag-red'>همکار</span>";
                    else if($row["status"]==4)
                        $msg="<span class='tag-pink'>کتابدار</span>";
                    else if($row["status"]==5)
                        $msg="<span class='tag-pink'>ادمین</span>";
                    ?>

                    <td><?php echo $msg;?></td>
                    <td><button class="btn btn-info"><a href="edituser.php?id=<?php echo $row['sid']?>">ویرایش</a></button> </td>
                    <td><button class="btn btn-danger"><a style="color: white" href="deluser.php?id=<?php echo $row['sid']?>">حذف</a></button> </td>

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
            echo "<li class='page-item'><a class='page-link' href='users.php?page=$page'>$page</a></li> ";
        }
        ?>
            </ul>
        </nav>
        <?php
        $conn->close();
        ?>
    </div>
</div>
<script>
function showformadduser() {
    window.location.replace("../signup.php")
}
</script>
<?php
include "footer.php";
?>

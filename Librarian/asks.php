<?php
$tittle="مدیریت درخواست ها";
include "essential.php";
?>
<div class="main-dashboard">
    <h4 class="usual_title">درخواست ها</h4>
    <div class="alert alert-danger d-none d-sm-block d-md-none">برای مشاهده با کامپیوتر وارد شوید</div>
    <div class="alert alert-danger d-block d-sm-none">برای مشاهده با کامپیوتر وارد شوید</div>
    <div class="d-none d-md-block">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">شماره دانشجویی</th>
                <th scope="col">عنوان</th>
                <th scope="col">درخواست</th>
                <th scope="col">تاریخ</th>
                <th scope="col">وضعیت کنونی</th>
                <th scope="col">ویرایش وضعیت</th>
                <th scope="col">ویرایش</th>
                <th scope="col">حذف</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM request ORDER BY rid DESC";
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
            $query = "SELECT * FROM request ORDER BY rid DESC LIMIT " . $page_first_result . ',' . $results_per_page;
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
                ?>

                <tr>
                    <th scope="row"><?php echo $row['rid']?></th>
                    <td><?php echo $row['scode']?></td>
                    <td><?php echo $row['title']?></td>
                    <td><?php echo $row['description']?></td>
                    <td><?php echo $row['rtime']?></td>
                    <?php
                    if($row["rstatus"]==0)
                        $msg="<span class='tag-black'>انجام نشده</span>";
                    else if($row["rstatus"]==1)
                        $msg="<span class='tag-green'>انجام شده</span>";
                    else if($row["rstatus"]==2)
                        $msg="<span class='tag-orange'>حضوری پیگیری شود</span>";
                    ?>
                    <td><?php echo $msg;?></td>
                    <form action="editask.php" method="post">
                        <input name="id" type="hidden" value=<?php echo $row['rid']?>>

                      <td>
                          <select name="status" class="col-12">
                             <option value="">وضعیت</option>
                             <option value="1">انجام شده</option>
                             <option value="0">انجام نشده</option>
                             <option value="2">حضوری پیگیری شود</option>
                         </select>
                     </td>
                     <td><button name="btn-edit" class="btn btn-success">ویرایش</button> </td>
                        <td><button name="btn-del" class="btn btn-danger">حذف</button> </td>
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
                    echo "<li class='page-item'><a class='page-link' href='asks.php?page=$page'>$page</a></li> ";
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

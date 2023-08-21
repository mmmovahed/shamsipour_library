<?php
$tittle="مدیریت خبر ها";
include "essential.php";
?>
<div class="main-dashboard">
    <h4 class="usual_title">خبر ها</h4>
    <button class="btn btn-success float-left"><a style="color: white;" href="add_news.php">اضافه کردن خبر</a></button>
    <div class="alert alert-danger d-none d-sm-block d-md-none">برای مشاهده با کامپیوتر وارد شوید</div>
    <div class="alert alert-danger d-block d-sm-none">برای مشاهده با کامپیوتر وارد شوید</div>
    <div class="d-none d-md-block">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">عنوان</th>
                <th scope="col">وضعیت</th>
                <th scope="col">ویرایش</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT nid,ntitle,nstatus FROM news ORDER BY nid DESC";
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
            $query = "SELECT nid,ntitle,nstatus FROM news ORDER BY nid DESC LIMIT " . $page_first_result . ',' . $results_per_page;
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
                if ($row["nstatus"] == 1 )
                    $status="<span class='tag-orange'>مهم</span>";
                else if ($row["nstatus"] == 2 )
                    $status="<span class='tag-blue'>عادی</span>";
                ?>

                <tr>
                    <th scope="row"><?php echo $row['nid']?></th>
                    <td><?php echo $row['ntitle']?></td>
                    <td><?php echo $status?></td>
                    <form action="editnews.php" method="post">
                        <input name="id" type="hidden" value=<?php echo $row['nid']?>>
                        <input name="state" type="hidden" value=<?php echo $row['nstatus']?>>
                        <td><button name="btn-edit" class="btn btn-info">ویرایش</button> </td>
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
                    echo "<li class='page-item'><a class='page-link' href='news.php?page=$page'>$page</a></li> ";
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

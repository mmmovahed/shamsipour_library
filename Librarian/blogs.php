<?php
$tittle="مدیریت بلاگ ها";
include "essential.php";
?>
<div class="main-dashboard">
    <h4 class="usual_title">بلاگ ها</h4>
    <div class="alert alert-danger d-none d-sm-block d-md-none">برای مشاهده با کامپیوتر وارد شوید</div>
    <div class="alert alert-danger d-block d-sm-none">برای مشاهده با کامپیوتر وارد شوید</div>
    <div class="d-none d-md-block">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">عنوان</th>
                <th scope="col">رشته</th>
                <th scope="col">وضعیت</th>
                <th scope="col">ویرایش</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT blid,btitle,status,major FROM blog ORDER BY blid DESC";
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
            $query = "SELECT blid,btitle,status,major FROM blog ORDER BY blid DESC LIMIT " . $page_first_result . ',' . $results_per_page;
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
                ?>

                <tr>
                    <th scope="row"><?php echo $row['blid']?></th>
                    <td><?php echo $row['btitle']?></td>
                    <td><?php echo $row['major']?></td>
                    <?php
                    if($row["status"]==0)
                        $msg="<span class='tag-black'>غیرفعال</span>";
                    else if($row["status"]==2)
                        $msg="<span class='tag-green'>فعال رسمی</span>";
                    else if($row["status"]==1)
                        $msg="<span class='tag-orange'>فعال غیررسمی</span>";
                    ?>
                    <td><?php echo $msg?></td>
                    <form action="editblog.php" method="post">
                        <input name="id" type="hidden" value=<?php echo $row['blid']?>>
                        <input name="majorr" type="hidden" value=<?php echo $row['major']?>>
                        <input name="statuss" type="hidden" value=<?php echo $row['status']?>>
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
                    echo "<li class='page-item'><a class='page-link' href='blogs.php?page=$page'>$page</a></li> ";
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

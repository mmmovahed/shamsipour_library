<?php
$tittle="مدیریت اعلان ها";
include "essential.php";
?>
<div class="main-dashboard">
    <h4 class="usual_title">اعلان ها</h4>
    <div class="alert alert-danger d-none d-sm-block d-md-none">برای مشاهده با کامپیوتر وارد شوید</div>
    <div class="alert alert-danger d-block d-sm-none">برای مشاهده با کامپیوتر وارد شوید</div>
    <div class="d-none d-md-block">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">عنوان</th>
                <th scope="col">متن</th>
                <th scope="col">از </th>
                <th scope="col">به</th>
                <th scope="col">وضعیت</th>
                <th scope="col">حذف</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM notification ORDER BY nid DESC";
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
            $query = "SELECT * FROM notification ORDER BY nid DESC LIMIT " . $page_first_result . ',' . $results_per_page;
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
                ?>

                <tr>
                    <th scope="row"><?php echo $row['nid']?></th>
                    <td><?php echo $row['ntitle']?></td>
                    <td><?php echo short_content_intorducing($row['ndescription'])?></td>
                    <td><?php echo $row['from']?></td>
                    <td><?php echo $row['reciver']?></td>
                    <?php
                    if($row["nstatus"]==6)
                        $msg="<span class='tag-black'>برای یک نفر</span>";
                    else if($row["nstatus"]==1)
                        $msg="<span class='tag-green'>همکاران</span>";
                    else if($row["nstatus"]==2)
                        $msg="<span class='tag-orange'>استاد و دانشجوها</span>";
                    else if($row["nstatus"]==3)
                        $msg="<span class='tag-blue'>کتابدارها</span>";
                    else if($row["nstatus"]==4)
                        $msg="<span class='tag-red'>ادمین ها</span>";
                    else if($row["nstatus"]==5)
                        $msg="<span class='tag-pink'>همه</span>";
                    ?>
                    <td><?php echo $msg;?></td>
                    <form action="delnotif.php" method="post">
                    <input type="hidden" name="notifid" value=<?php echo $row['nid'];?>>
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
                    echo "<li class='page-item'><a class='page-link' href='notifs.php?page=$page'>$page</a></li> ";
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

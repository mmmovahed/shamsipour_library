<?php
$tittle="مدیریت لاگ ها";
include "essential.php";
?>
<div class="main-dashboard">
    <h4 class="usual_title">مدیریت لاگ ها</h4>
    <div class='col-12 col-lg-6' style='margin: auto;'>
    <?php
     $sql = "SELECT * FROM logs";
        $result = $conn->query($sql);
        $results_per_page = 25;
            $number_of_result = mysqli_num_rows($result);
            $number_of_page = ceil ($number_of_result / $results_per_page);
            if (!isset ($_GET['page']) ) {
                $page  =1;
            } else {
                $page = $_GET['page'];
            }
            $page_first_result = ($page-1) * $results_per_page;
            $query = "SELECT * FROM logs ORDER BY lid DESC LIMIT " . $page_first_result . ',' . $results_per_page;
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo "<div class='log-box'>$row[scode] | $row[bid] | $row[process] | $row[ltime]</div>";
            }
?>
    <nav aria-label='Page navigation example'>
            <ul class='pagination'>
        <?php

        for($page = 1; $page<= $number_of_page; $page++) {
            echo "<li class='page-item'><a class='page-link' href='logs.php?page=$page'>$page</a></li> ";
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
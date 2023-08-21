<?php
$tittle="داشبورد کاربری";
include "essential.php";
if(!isset($_GET['id']) || empty($_GET['id']))
    header("Location:index.php");
$nid=$_GET['id'];
?>
<div class="main-dashboard">

    <?php
    $sql = "SELECT nid,ntitle,ndescription FROM notification WHERE (nstatus=2 || nstatus=5 || (nstatus=6 && reciver=$scode)) && nid=$nid";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<div class='alert alert-info'>$row[ntitle]
            <br>
            <hr width='200'>
            <p>
           $row[ndescription]
</p>
</div>";

        }
    }
    else
    {
        echo "<div class='alert alert-info'>اعلانی برای نمایش وجود ندارد</div>";
    }
    ?>
</div>
<?php
include "../MasterPageOfFooterRelationship.php";
?>
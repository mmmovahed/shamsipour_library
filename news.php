<?php
$tittle="اخبار | کتابخانه شمسی پور";
include "MasterPageOfHeaderRelationship.php";
include "navbar.php";
include "assets/func/func.php";
include "connectToDB.php";
?>

<div class="container col-12">
    <div class="row">
        <div class="col-12 col-lg-4">
            <br>
            <div style="" class="col-12 col-lg-12">
                <img src="https://ketab.ir/images/Adv/98b2d1d1434f4c85b7aa6abda4be6226.png" class="col-12"><br><br>
                <img src="https://ketab.ir/images/Adv/96c4d2a2b18b44e6b2bac2ea87cb594d.png" class="col-12"><br><br>
                <img src="https://ketab.ir/images/Adv/55260d5ea75043a181a1cd31173f9862.jpg" class="col-12"><br><br>
                <img src="https://ketab.ir/images/Adv/8003e3cdb28a4a4386080b78a3e7ec1e.gif" class="col-12">
            </div>
        </div>
        <div class="col-12 col-lg-7 usual-box">
            <?php

            $sql = "SELECT * FROM news ORDER BY nid DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  $content=short_content_intorducing($row['ncontent']);
                  echo "
                  <div class='alert alert-info'>
                    <a href=shownews.php?id=$row[nid]><h5 class='usual_title'>$row[ntitle]</h5></a>
                    <p class='align-justify'>$content</p>
                    <hr>
                    <small>$row[ntime]</small>
                  </div>
                  ";
              }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
    </div>
</div>
<br>
<?php include "MasterPageOfFooterRelationship.php";?>
<?php include "footer.php";?>
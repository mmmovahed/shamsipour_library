<?php
$tittle="بلاگ";
include "MasterPageOfHeaderRelationship.php";
include "navbar.php";
include "assets/func/func.php";
include "connectToDB.php";
?>
<div class="usual-box col-11 col-lg-9" style="margin:10px auto">
    <div class="row">
        <h4 class="usual_title">بلاگ ها</h4>

        <?php
        $sql = "SELECT * FROM blog WHERE status > 0 ORDER BY blid DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            ?>
                <div class="col-11 col-md-3 col-lg-2 usual-box blog-box" style="padding: 9px 15px;">
                    <?php
                    $tag=array("tag-pink","tag-red","tag-blue","tag-green","tag-orange");
                    $i=rand(0,4);
                    ?>
                    <span class="<?php echo $tag[$i];?>" style="margin-top: -15px;"><?php echo $row["major"];?></span>
                    <?php
                    if($row["status"]<=0)
                        echo"<span class='tag-black'>غیرفعال</span>";
                        ?>


                    <br>
                    <div><a href="show_blog.php?id=<?php echo $row['blid'];?>"><img src="<?php echo $row["bimg"];?>" class="col-12 shadow p-2 bg-white rounded"></a></div>
                    <div class="row">
                        <div class="col-6" style="text-align: right" dir="ltr"><?php echo $row["bview"];?><i class="fa fa-eye" style="font-size: 12px;"></i></div>
                        <div class="col-6" style="text-align: left"><?php echo $row["date"];?></div>
                    </div>
                    <p><?php echo $row["btitle"];?></p>

                </div>
            <?php
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>

    </div>
</div>
<?php include "footer.php"?>
<?php include "MasterPageOfFooterRelationship.php";?>

<?php
if(!isset($_GET["id"]))
    header("Location:blog.php");
else
    $id=$_GET["id"];
$tittle="بلاگ";
include "MasterPageOfHeaderRelationship.php";
include "navbar.php";
include "assets/func/func.php";
include "connectToDB.php";

$sql="UPDATE blog set bview=bview+1 WHERE blid=$id";
$conn->query($sql);
?>
<div class="col-11 col-lg-9 row" style="margin:10px auto">
    <div class="col-11 col-lg-3 usual-box" style="margin: 10px">
        <?php
        $sql = "SELECT blid,btitle FROM blog WHERE status > 0 ORDER BY blid DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            if($result->num_rows > 15){
                $i=0;
                while($i < 15) {
                    $row = $result->fetch_assoc();
                ?>

                <a href="show_blog.php?id=<?php echo $row["blid"];?>"><div class="alert alert-light alert-light-hover text-center"><?php echo $row["btitle"];?></div></a>
                <?php
            }
            }
            else
            {
                $i=0;
                while($i < $result->num_rows) {

                    $row = $result->fetch_assoc();
                    ?>

                    <a href="show_blog.php?id=<?php echo $row["blid"];?>"> <div class="alert alert-light alert-light-hover text-center"><?php echo $row["btitle"];?></div></a>

                    <?php
                    $i++;
                }
            }
        } else {
            echo "0 results";
        }
        ?>
    </div>
    <?php
    $sql = "SELECT * FROM blog WHERE blid=$id && status>0";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            ?>

    <div class="col-11 col-lg-8 usual-box" style="margin: 10px">
        <div class="title-blog">
            <div class="col-7 col-lg-4" style="margin: auto"><img class="col-12 rounded-circle p-1 bg-white" src="<?php echo $row["bimg"];?>"></div>
            <br>
            <h4><?php echo $row["btitle"];?></h4>
            <hr width="65px">
            <p><?php echo $row["bdescription"];?></p>
        </div>
        <div class="content">
            <?php echo $row["bcontent"];?>
        </div>
    </div>
       <?php
        }
    } else {
        ?>
        <script>
            window.open("blog.php");
        </script>
        <?php
    }
    $conn->close();
    ?>

</div>


<?php include "footer.php"?>
<?php include "MasterPageOfFooterRelationship.php";?>
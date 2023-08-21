<div style="margin: 15px auto;border-bottom: 10px solid #2a9d8f" class="col-11 col-lg-7 usual-box">
    <div class="row">
        <?php
        $ran=rand(24,36);
        $sql = "SELECT * FROM book WHERE bcategory='عمومی' AND bid=$ran;";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            $i=0;
            for($i=0;$i<1;$i++) {
                $row = $result->fetch_assoc()
                ?>
                <div class="container col-12 col-lg-12">
                    <div class="col-12 col-md-3 col-lg-3>" style="float:right">
                        <img src=<?php echo $row["bimg"];?> width="150" height="190" style="margin: 0 50px 20px 10px;">
                    </div>
                    <div class="col-12 col-md-9 col-lg-9>" style="float:left">
                        <h3 class="usual_title" style="font-size: 18px;">
                            <?php echo $row["bname"]?>
                        </h3>
                        <hr>
                        <p class="usual_title">
                            <?php
                            echo short_content_intorducing($row["bdescription"]);
                            ?>
                        </p>
                    </div>
                </div>

                <?php
            }
        } else {
            echo "خوش آمدید...";
        }
        $conn->close();
        ?>

    </div>
</div>

<br>
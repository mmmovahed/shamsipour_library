<?php
$tittle="داشبورد کاربری|درخواست رزرو";
include "essential.php";
?>
<div class="main-dashboard">
    <form class="form-input-search2 col-12 col-lg-5" method="get" action="">
        <input  onkeyup="showResult(this.value)" type="text" name="search-input" placeholder="اسم کتاب" class="input-search ">
        <button name="search-btn" class="btn-search disable"><i class="fa fa-search"></i></button>
        <div id="result-search" class="result-search">
            <h4 class="usual_title" id="txtHint"></h4>
        </div>
        <script>
            function showResult(str) {
                if (str.length < 4 ) {
                    document.getElementById("txtHint").innerHTML = "empty";
                    document.getElementById("result-search").style.display="none";

                    return;
                } else {
                    document.getElementById("result-search").style.display="block";

                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("txtHint").innerHTML = this.responseText;
                        }
                    };
                    var path="livesearch.php?q="+str;
                    xmlhttp.open("GET",path,true);
                    xmlhttp.send();
                }
            }
        </script>
    </form>
    <br>
    <br>
    <h4 class="usual_title"> برخی کتاب های قابل رزرو</h4>
    <br>
    <table class="table table-striped table-info bg-primary">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">عنوان</th>
            <th scope="col">نویسنده</th>
            <th scope="col">ویرایش</th>
            <th scope="col">گروه</th>
            <th scope="col">رشته</th>
            <th scope="col">درخواست</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $sql = "SELECT rbid,`rbname`, `rbauther`, `rbedition`, `rbmajor`, `rbfilled` FROM `reservable_book` WHERE rbstatus=1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            $i=0;
            while($row = $result->fetch_assoc()) {
                $i++;
                if($i>=11)
                {
                    break;
                }
                else
                {
                    ?>
                    <tr>

                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $row['rbname'];?></td>
                        <td><?php echo $row['rbauther'];?></td>
                        <td><?php echo $row['rbedition'];?></td>
                        <td><?php echo $row['rbmajor'];?></td>
                        <td><?php echo $row['rbfilled'];?></td>
                        <td>
                            <form action="Book_Reserve.php?rbook_id=<?php echo $row['rbid']?>" method="post">
                                <input type="hidden" name="del-id" value="<?php echo $row['rbid']?>">
                                <a href=""><button type="submit" name="del-request-bug" class="btn btn-success">رزرو</button></a>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
            }
        } else {
            ?>
            <tr>
                <th colspan="7">کتاب قابل رزروی موجود نیست</th>
            </tr>
            <?php
        }

        ?>

        </tbody>
    </table>
</div>
<?php
include "../MasterPageOfFooterRelationship.php";
?>

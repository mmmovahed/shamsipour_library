<?php
$tittle="داشبورد همکار | گزارش باگ";
include "essential.php";
?>
<div class="main-dashboard">
    <div class="container">
        <table class="table table-striped table-info bg-primary">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">عنوان</th>
                <th scope="col">خلاصه شرح</th>
                <th scope="col">تاریخ</th>
                <th scope="col">حذف</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $sql = "SELECT * FROM request where title='گزارش باگ' && scode=".$_COOKIE["usercode"]." ORDER BY rtime DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                $i=0;
                while($row = $result->fetch_assoc()) {
                    $i++;
                    if($i>=6)
                    {
                        break;
                    }
                    else
                    {
?>
                    <tr>

                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $row['title'];?></td>
                        <td><?php echo short_content($row['description']);?></td>
                        <td><?php echo $row['rtime'];?></td>
                        <td>
                            <form action="check.php" method="post">
                                <input type="hidden" name="del-id" value="<?php echo $row['rid']?>">
                                <a href=""><button type="submit" name="del-request-bug" class="btn btn-danger">حذف</button></a>
                            </form>
                        </td>
                    </tr>
            <?php
                }
                }
            } else {
?>
            <tr>
                <th colspan="5">گزارشی موجود نیست</th>
            </tr>
            <?php
            }

            ?>

            </tbody>
        </table>
<?php
if(isset($_POST['sub-btn']))
{
    $title="گزارش باگ";
    $usercode=$_COOKIE["usercode"];
    $description=$_POST['description'];
    $date=date("Y-m-d-H:i:s");
    $sql = "INSERT INTO `request`( `scode`, `title`, `description`, `rtime`, `rstatus`) VALUES ('$usercode','$title','$description','$date',1)";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>گزارش جدید با موفقیت اضافه گردید</div>";
        insertLOG("$usercode","0","اضافه کردن گزارش باگ");
    } else {
        echo "<div class='alert alert-danger'>گزارش جدید با موفقیت اضافه نگردید</div>";
    }

    $conn->close();
}

?>

        <form class="form-bug" method="post" action="">
            <input type="text" name="title" disabled value="گزارش باگ"><br><br>
            <textarea name="description" placeholder="شرح گزارش ..."></textarea><br><br>
            <input class="btn btn-success" type="submit" name="sub-btn" value="ارسال گزارش">
            <input class="btn btn-danger" type="reset" name="sub-btn" value="بازنویسی"><br>

        </form>


    </div>
</div>
<?php
include "../MasterPageOfFooterRelationship.php";
?>


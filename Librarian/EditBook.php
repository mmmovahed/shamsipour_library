<?php
$tittle="ویرایش کتاب دیجیتال";
include "essential.php";
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<div class='alert alert-danger col-12 col-lg-5 text-center' style='margin: auto'>ابتدا کتاب را انتخاب کنید</div>";
}else
{
    $id=$_GET['id'];
    ?>
    <div class="main-dashboard">
        <div class="alert alert-warning">
            <h4>نکته هایی که باید رعایت شود</h4>
            <hr width="80px">
            <p>
                برای فیلد های عددی حتما باید عدد وارد شود
                <br>
                <br>
                بعضی از فیلدها الزامی هستند وبعضی خیر ، در صورت نبودن اطلاعات برای فیلد های غیر الزامی سه خط تیره بگذارید
                <br>
                <br>
                فیلد وضعیت نحوه نمایش کتاب است . 1 به معنی موجود برای رزرو;0 به معنی موجود نبودن
            </p>
        </div>

        <?php
        if(isset($_POST['btn-update']))
        {
            $rbname=$_POST['rbname'];
            $rbauther=$_POST['rbauther'];
            $rbedition=$_POST['rbedition'];
            $rbcategory=$_POST['rbmajor'];
            $rbmajor=$_POST['rbfilled'];
            $rbstatus=$_POST['rbstatus'];

            $sql = "UPDATE `reservable_book` SET `rbname`='$rbname',`rbauther`='$rbauther',`rbedition`='$rbedition',
`rbmajor`='$rbcategory',`rbfilled`='$rbmajor',`rbstatus`='$rbstatus' WHERE rbid=$id";

            if ($conn->query($sql) === TRUE) {
                $usercode=$_COOKIE["usercode"];
                insertLOG("$usercode","$id","ویرایش کتاب فیزیکی");
                echo "<div class='alert alert-success'>کتاب مورد نظر با موفقیت ویرایش شد</div>";
            } else {
                echo "<div class='alert alert-danger'>کتاب مورد نظر با موفقیت ویرایش نشد</div>";
            }

        }
        ?>
        <?php
        $sql = "SELECT * FROM reservable_book WHERE rbid=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="edit-form">
                    <form class="row" method="post" action="">
                        <div class="col-6">نام :<textarea class="col-12 col-lg-9" name="rbname"><?php echo $row['rbname']?></textarea></div>
                        <div class="col-6">ویرایش :<textarea class="col-12 col-lg-9" name="rbedition"><?php echo $row['rbedition']?></textarea></div>
                        <div class="col-6">نویسنده :<textarea class="col-12 col-lg-9" name="rbauther"><?php echo $row['rbauther']?></textarea></div>
                        <div class="col-6">گروه :<textarea class="col-12 col-lg-9" name="rbmajor"><?php echo $row['rbmajor']?></textarea></div>
                        <div class="col-6">رشته تخصصی :<textarea class="col-12 col-lg-9" name="rbfilled"><?php echo $row['rbfilled']?></textarea></div>
                        <div class="col-6">وضعیت :<textarea class="col-12 col-lg-9" name="rbstatus"><?php echo $row['rbstatus']?></textarea></div>
                        <br>
                        <input type="submit" class="btn btn-success" value="ویرایش اطلاعات" name="btn-update">
                    </form>
                </div>


                <?php
            }
        } else {
            echo "0 results";
        }
        ?>

    </div>
    <?php
}
include "footer.php";
?>
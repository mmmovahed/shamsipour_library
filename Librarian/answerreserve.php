<?php
if(!isset($_POST["id"]))
    header("Location:index.php");
else
    $id=$_POST["id"];
$tittle="پاسخ رزرو";
include "essential.php";
$usercode=$_COOKIE["usercode"];
?>
<div class="main-dashboard">


    <?php
        if(isset($_POST["deny-amount-btn"]))
        {
            $sql="UPDATE `request_reserve` SET `status`=1 WHERE rrid=$id";
            if ($conn->query($sql) === TRUE) {
                InsertLOG("$usercode","$id","رد درخواست رزرو به دلیل عدم موجودی");
                echo "<div class='alert alert-success'>عملیات انجام شد</div>";
            }
            else{
                echo "<div class='alert alert-danger'>عملیات انجام نشد</div>";
            }
        }
        if(isset($_POST["deny-date-btn"]))
        {
            $sql="UPDATE `request_reserve` SET `status`=2 WHERE rrid=$id";
            if ($conn->query($sql) === TRUE) {
                InsertLOG("$usercode","$id","رد درخواست رزرو به دلیل تاریخ انتخابی");
                echo "<div class='alert alert-success'>عملیات انجام شد</div>";
            }
            else{
                echo "<div class='alert alert-danger'>عملیات انجام نشد</div>";
            }
        }
        if(isset($_POST["deny-btn"]))
        {
            $sql="UPDATE `request_reserve` SET `status`=3 WHERE rrid=$id";
            if ($conn->query($sql) === TRUE) {
                InsertLOG("$usercode","$id","رد درخواست رزرو");
                echo "<div class='alert alert-success'>عملیات انجام شد</div>";
            }
            else{
                echo "<div class='alert alert-danger'>عملیات انجام نشد</div>";
            }
        }
        if(isset($_POST["accept-btn1"]))
        {
            $sql="UPDATE `request_reserve` SET `status`=4 WHERE rrid=$id";
            if ($conn->query($sql) === TRUE) {
                InsertLOG("$usercode","$id","تایید درخواست رزرو");
                echo "<div class='alert alert-success'>عملیات انجام شد</div>";
            }
            else{
                echo "<div class='alert alert-danger'>عملیات انجام نشد</div>";
            }
        }
        if(isset($_POST["reask-btn"]))
        {
            $sql="UPDATE `request_reserve` SET `status`=5 WHERE rrid=$id";
            if ($conn->query($sql) === TRUE) {
                InsertLOG("$usercode","$id","اعلام حضور برای رزرو کتاب");
                echo "<div class='alert alert-success'>عملیات انجام شد</div>";
            }
            else{
                echo "<div class='alert alert-danger'>عملیات انجام نشد</div>";
            }
        }
    ?>



    <?php
    $sql = "SELECT * FROM request_reserve WHERE rrid=$id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
?>
    <h4>
        <?php echo $row["rbname"];?>
        <hr width="45px">
        <?php echo $row["scode"];?>
    </h4>
    <p>
    <?php echo $row["description"];?>
    </p>
    <small><?php echo $row["date"];?></small>
    <form action="" method="post">
        <input type="hidden" name="id" value=<?php echo $row['rrid'];?>>
        <button name="deny-amount-btn" type="submit" class="btn btn-primary">موجود نیست</button>
        <button name="deny-date-btn" type="submit" class="btn btn-info">در تاریخ انتخابی در دسترس نیست </button>
        <button name="deny-btn" type="submit" class="btn btn-danger">رد درخواست </button>
        <button name="accept-btn1" type="submit" class="btn btn-success">انجام شده </button>
        <button name="reask-btn" type="submit" class="btn btn-warning">حضوری درخواست کنید </button>
        <button name="reticket-btn" type="submit" class="btn btn-secondary"><a href="reserve.php">بازگشت</a> </button>

    </form>
<?php }
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>
    
</div>
<?php
include "footer.php";
?>

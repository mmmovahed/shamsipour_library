<?php
if(!isset($_GET["id"]))
    header("Location:index.php");
else
    $id=$_GET["id"];
$tittle="پاسخ تیکت ها";
include "essential.php";
$usercode=$_COOKIE["usercode"];
?>
<div class="main-dashboard">


    <?php
        if(isset($_POST["sub-btn"]))
        {
            $sql="UPDATE `ticket` SET `tanswer`='$_POST[answer]',`tstatus`=4 WHERE tid=$id";
            if ($conn->query($sql) === TRUE) {
                
                InsertLOG("$usercode","0","ثبت پاسخ برای تیکت");
                echo "<div class='alert alert-success'>پاسخ ثبت گردید</div>";
                
            }
            else{
                echo "<div class='alert alert-danger'>پاسخ ثبت نگردید</div>";
            }
        }
        if(isset($_POST["deny-btn"]))
        {
            $sql="UPDATE `ticket` SET `tstatus`=1 WHERE tid=$id";
            if ($conn->query($sql) === TRUE) {
                InsertLOG("$usercode","0","رد تیکت");
                echo "<div class='alert alert-success'>عملیات انجام شد</div>";
            }
            else{
                echo "<div class='alert alert-danger'>عملیات انجام شد</div>";
            }
        }
        if(isset($_POST["accept-btn"]))
        {
            $sql="UPDATE `ticket` SET `tstatus`=2 WHERE tid=$id";
            if ($conn->query($sql) === TRUE) {
                InsertLOG("$usercode","0","قبول تیکت");
                echo "<div class='alert alert-success'>عملیات انجام شد</div>";
            }
            else{
                echo "<div class='alert alert-danger'>عملیات انجام شد</div>";
            }
        }
        if(isset($_POST["reticket-btn"]))
        {
            $sql="UPDATE `ticket` SET `tstatus`=3 WHERE tid=$id";
            if ($conn->query($sql) === TRUE) {
                InsertLOG("$usercode","0","درخواست حضوری");
                echo "<div class='alert alert-success'>عملیات انجام شد</div>";
            }
            else{
                echo "<div class='alert alert-danger'>عملیات انجام شد</div>";
            }
        }
    ?>



    <?php
    $sql = "SELECT * FROM ticket WHERE tid=$id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
?>
    <h4>
        <?php echo $row["ttitle"];?>
        <hr width="45px">
        <?php echo $row["scode"];?>
    </h4>
    <p>
    <?php echo $row["tdescription"];?>
    </p>
    <small><?php echo $row["tdate"];?></small>
    <form action="" method="post">
        <textarea class="input-form col-12" name="answer" placeholder="پاسخ تیکت"></textarea>
        <button name="sub-btn" type="submit" class="btn btn-info">ثبت پاسخ </button>
        <button name="deny-btn" type="submit" class="btn btn-danger">رد درخواست </button>
        <button name="accept-btn" type="submit" class="btn btn-success">انجام شده </button>
        <button name="reticket-btn" type="submit" class="btn btn-warning">حضوری درخواست کنید </button>
        <button name="reticket-btn" type="submit" class="btn btn-secondary"><a href="tickets.php">بازگشت</a> </button>

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

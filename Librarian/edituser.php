<?php
if(!isset($_GET['id']) || empty($_GET['id']))
    header("Location:index.php");
else
    $sid=$_GET['id'];
    $tittle="ویرایش کاربر";
include "essential.php";
?>
<div class="main-dashboard">
<?php
$sql = "SELECT * FROM student WHERE sid=$sid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>
      <div class="row container col-12 col-lg-12">
          <?php
          if (isset($_POST['editbtn']))
          {
              $name =$_POST['name'];
              $family =$_POST['family'];
              $scode =$_POST['scode'];
              $spassword =$_POST['spassword'];
              $semail =$_POST['semail'];
              $sphone =$_POST['sphone'];
              $smajor =$_POST['smajor'];
              $sfilled =$_POST['sfilled'];
              $educational_status =$_POST['educational_status'];
              $status =$_POST['status'];
              $img =$_POST['img'];

              $sql = "UPDATE student SET `sname`='$name',`sfamily`='$family',`scode`='$scode',`spassword`='$spassword',
`semail`='$semail',`sphone`='$sphone',`smajor`='$smajor',`sfilled`='$sfilled',`educational_status`='$educational_status',
`status`='$status',`img`='$img' WHERE sid=$sid";

              if ($conn->query($sql) === TRUE) {
                  echo "<div class='alert alert-success'>ویرایش کاربر با موفقیت انجام شد</div>";
                  insertLOG("$scode","0","ویرایش کاربر");
                } else {
                  echo "<div class='alert alert-danger'>ویرایش کاربر با موفقیت انجام نشد</div>";
                }

          }
          ?>
          <form action="" method="post">
              <input type="text" name="name" class="input-form col-12 col-lg-5" placeholder="نام" value="<?php echo $row['sname']?>">
              <input type="text" name="family" class="input-form col-12 col-lg-5" placeholder="نام خانوادگی" value="<?php echo $row['sfamily']?>">
              <input type="text" name="scode" class="input-form col-12 col-lg-5" placeholder="کد دانشجویی" value="<?php echo $row['scode']?>">
              <input type="text" name="spassword" class="input-form col-12 col-lg-5" placeholder="رمز عبور" value="<?php echo $row['spassword']?>">
              <input type="text" name="semail" class="input-form col-12 col-lg-5" placeholder="ایمیل" value="<?php echo $row['semail']?>">
              <input type="text" name="sphone" class="input-form col-12 col-lg-5" placeholder="تلفن همراه" value="<?php echo $row['sphone']?>">
              <input type="text" name="smajor" class="input-form col-12 col-lg-5" placeholder="مقطع" value="<?php echo $row['smajor']?>">
              <input type="text" name="sfilled" class="input-form col-12 col-lg-5" placeholder="رشته" value="<?php echo $row['sfilled']?>">
              <input type="text" name="educational_status" class="input-form col-12 col-lg-5" placeholder="وضعیت تحصیلی" value="<?php echo $row['educational_status']?>">
              <input type="number" name="status" class="input-form col-12 col-lg-5" placeholder="وضعیت" value="<?php echo $row['status']?>">
              <input type="text" name="img" class="input-form col-12 col-lg-5" placeholder="لینک تصویر" value="<?php echo $row['img']?>">
              <br>
              <button name="editbtn" class="btn btn-info">ویرایش کاربر</button>
          </form>
      </div>
      <?php
      }
} else {
    echo "0 results";
}
$conn->close();
?>
</div>
<?php
include "footer.php";
?>
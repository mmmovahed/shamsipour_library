<?php
if(!isset($_GET["rbook_id"]))
    header("Location:index.php");
else
    $bookid=$_GET["rbook_id"];

$tittle="داشبورد کاربری|درخواست رزرو";
include "essential.php";
?>
<div class="main-dashboard">
    <?php
    if(isset($_POST['add-request-reserve']))
    {
        $usercode=$_COOKIE['usercode'];
        $date=date("y-m-d--H:i:s");
        $bname=$_POST["rbname"];
        $description=$_POST["day"]." ".$_POST["month"];
        $sql = "INSERT INTO `request_reserve`( `rbid`, `rbname`, `scode`, `date`, `description`,status) 
VALUES ('$bookid', '$bname', '$_COOKIE[usercode]','$date','$description',0)";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>درخواست با موفقیت ثبت شد.<br>منتظر پاسخ کتابدار باشید.<br>از منو گزینه ی نمایش رزرو ها میتوانید پاسخ را ببینید.</div>";
            insertLOG("$usercode","$bookid","ثبت درخواست کتاب");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
    <p class="just-in-phone">برای رزرو از کامپیوتر استفاده کنید</p>
    <table class="table table-striped table-info bg-primary">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">عنوان</th>
            <th scope="col">نویسنده</th>
            <th scope="col">ویرایش</th>
            <th scope="col">گروه</th>
            <th scope="col">تاریخ درخواستی</th>
            <th scope="col">درخواست</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $sql = "SELECT rbid,`rbname`, `rbauther`, `rbedition`, `rbmajor`, `rbfilled` FROM `reservable_book` WHERE rbid=".$bookid;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            $i=0;
            while($row = $result->fetch_assoc()) {
$i++;
                    ?>
                    <tr>
                        <form action="" method="post">

                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $row['rbname'];?></td>
                        <input type="hidden" name="rbname" value="<?php echo $row['rbname'];?>">
                        <td><?php echo $row['rbauther'];?></td>
                        <td><?php echo $row['rbedition'];?></td>
                        <td><?php echo $row['rbmajor'];?></td>

                        <td>
                            <select name="day" class="col-5 input-form">
                                <option value=1>1</option>
                                <option value=2>2</option>
                                <option value=3>3</option>
                                <option value=4>4</option>
                                <option value=5>5</option>
                                <option value=6>6</option>
                                <option value=7>7</option>
                                <option value=8>8</option>
                                <option value=9>9</option>
                                <option value=10>10</option>
                                <option value=11>11</option>
                                <option value=12>12</option>
                                <option value=13>13</option>
                                <option value=14>14</option>
                                <option value=15>15</option>
                                <option value=16>16</option>
                                <option value=17>17</option>
                                <option value=18>18</option>
                                <option value=19>19</option>
                                <option value=20>20</option>
                                <option value=21>21</option>
                                <option value=22>22</option>
                                <option value=23>23</option>
                                <option value=24>24</option>
                                <option value=25>25</option>
                                <option value=26>26</option>
                                <option value=27>27</option>
                                <option value=28>28</option>
                                <option value=29>29</option>
                                <option value=30>30</option>
                                <option value=31>31</option>
                            </select>
                            <select name="month" class="col-5 input-form">
                                <option value="فروردین">فروردین</option>
                                <option value="اردیبهشت">اردیبهشت</option>
                                <option value="خرداد">خرداد</option>
                                <option value="تیر">تیر</option>
                                <option value="مرداد">مرداد</option>
                                <option value="شهریور">شهریور</option>
                                <option value="مهر">مهر</option>
                                <option value="آبان">آبان</option>
                                <option value="آذر">آذر</option>
                                <option value="دی">دی</option>
                                <option value="بهمن">بهمن</option>
                                <option value="اسفند">اسفند</option>
                            </select>
                        </td>
                        <td>
                                <input type="hidden" name="reserve-id" value="<?php echo $row['rbid']?>">
                                <a href=""><button type="submit" name="add-request-reserve" class="btn btn-success">رزرو</button></a>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                    }
        else{
            ?>
            <tr>
                <th colspan="7">کتاب انتخابی قابل رزرو نیست</th>
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


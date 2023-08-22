<?php
$tittle="انتخاب کتاب";
include "essential.php";
?>
<div class="main-dashboard">
    <div class="result-search alert alert-warning" id="livesearch"></div>

    <div class="box-low-shadow">
        <h4 class="usual_title">جستجو برای کتاب های دانلودی</h4>
    <form>
        <input onkeyup="showResultForEB(this.value)" style="height: 40px;text-align: center;margin: 15px 5% 0;" class="input-notif" type="text" name="book" placeholder="نام کتاب دیجیتال" id="book">
        <div class="result-search" id="livesearch"></div>
        <script>
            function showResultForEB(str) {
                if (str.length<4) {
                    document.getElementById("livesearch").innerHTML="";
                    document.getElementById("livesearch").style.display = "none";
                    return;
                }
                else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("livesearch").innerHTML = this.responseText;
                            document.getElementById("livesearch").style.display = "block";
                        }
                    }
                    xmlhttp.open("GET", "livesearch.php?id-ebook=" + str, true);
                    xmlhttp.send();
                }
            }
        </script>

    </form>

    </div>

    <br>
    <br>
    <div class="box-low-shadow">
        <h4 class="usual_title">جستجو برای کتاب های موجود برای رزرو</h4>

        <form>
            <input onkeyup="showResultForRB(this.value)" style="height: 40px;text-align: center;margin: 15px 5% 0;" class="input-notif" type="text" name="book" placeholder="نام کتاب چاپ شده" id="book">
            <div class="result-search" id="livesearch"></div>
            <script>
                function showResultForRB(str) {
                    if (str.length<4) {
                        document.getElementById("livesearch").innerHTML="";
                        document.getElementById("livesearch").style.display = "none";
                        return;
                    }
                    else {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("livesearch").innerHTML = this.responseText;
                                document.getElementById("livesearch").style.display = "block";
                            }
                        }
                        xmlhttp.open("GET", "livesearch.php?id-rbook=" + str, true);
                        xmlhttp.send();
                    }
                }
            </script>

        </form>

    </div>
</div>
<?php
include "footer.php";
?>

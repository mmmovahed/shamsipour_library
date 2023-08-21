<?php
setcookie("usercode", null, time() -3600, "/");
header("Location:index.php");
?>
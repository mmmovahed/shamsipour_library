<?php

function short_content($text)
{
    $text = substr($text, 0, 150);
    $text = substr($text, 0, strrpos($text, " "));
    $text = $text . " ...";
    return $text;
}

function short_content_intorducing($text)
{
    $text = substr($text, 0, 350);
    $text = substr($text, 0, strrpos($text, " "));
    $text = $text . " ...";
    return $text;
}
function insertLOG($sid,$bid,$process){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shamsipour_library";

// Create connection
    $connn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($connn->connect_error) {
        die("Connection failed: " . $connn->connect_error);
    }
    $date=date("Y-m-d-H:i:s");
    $sql = "INSERT INTO `logs`( `scode`, `bid`, `process`, `ltime`, `lstatus`) VALUES('$sid', $bid, '$process','$date',1)";
    $connn->query($sql);

}
?>
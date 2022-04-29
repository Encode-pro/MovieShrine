<?php
if(isset($_POST['submitdata']))
{
    include "db_conn.php";
    $name = $_POST['name'];
    $desc = $_POST['desc'];



    $sql = "INSERT INTO `moviereview`.`review` ( `name`, `number`, `sreview`, `nreview`, `lreview`, `dt`)
    VALUES ( '$name', '$number', '$sreview', '$nreview', '$lreview', current_timestamp());";
    echo "Hello";
}
?>
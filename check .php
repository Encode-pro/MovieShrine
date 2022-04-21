<?php
   if(isset($_POST['name']))
   {
    $server = "localhost";
    $username="root";
    $password="";
    $db="moviereview";
    $con = mysqli_connect($server,$username,$password,$db);
    if(!$con){
        die("connection to this database faild due to".mysqli_connect_error());
    }
    echo "Success connecting to db";
    $name = $_POST['name'];
    $number = $_POST['number'];
    $sreview = $_POST['sreview'];
    $nreview = $_POST['nreview'];
    $lreview = $_POST['lreview'];
    $sql = "INSERT INTO `moviereview`.`review` ( `name`, `number`, `sreview`, `nreview`, `lreview`, `dt`)
    VALUES ( '$name', '$number', '$sreview', '$nreview', '$lreview', current_timestamp());";
     //echo $sql;
    if($con->query($sql) == true)
    {
        echo "successfully inserted";
    }
    else{
         echo "ERROR: $sql <br> $con->error";
    }
    //$con->close();
   }
?>
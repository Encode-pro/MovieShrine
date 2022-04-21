<?php
if(isset($_POST['login'])){
    $server = "localhost";
    $username="root";
    $password="";
    $db="moviereview";
    $con = mysqli_connect($server,$username,$password,$db);
    if(!$con){
        die("connection to this database faild due to".mysqli_connect_error());
    }
    //echo "Success connecting to db";
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];

    $sql = "select * from moviereview.login where email='$email' && pswd='$pswd'";
     //echo $sql;
    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);
    if($num==1)
    {
        $_SESSION['email']= $email;
        header('location:home.html');
    }
    else{
        header('location:signup.html');
    }



    if($con->query($sql) == true)
    {
        ?>
        <script>
        alert( "Login Successful");
        </script>
        <?php
    }
    else{
        ?>
        <script>
         alert( "ERROR: $sql <br> $con->error");
         </script>
        <?php
    }
    $con->close();
}
?>



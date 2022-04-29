<?php
session_start();
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
    $sql1="select usrname from moviereview.login where email ='$email'";
     //echo $sql;
    $result=mysqli_query($con,$sql);
    $result1=mysqli_query($con,$sql1);
    if(mysqli_num_rows($result1)>0)
      {
           while($row=mysqli_fetch_assoc($result1))
           {
            $uname= $row['usrname'];
           }
        }
    $num=mysqli_num_rows($result);
    if($num==1)
    {
        $_SESSION['email']= $email;
        $_SESSION['username']=$uname;
        header('location:home.php');
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
}
if(isset($_POST['log'])){
    echo $_SESSION['email'];
}
?>


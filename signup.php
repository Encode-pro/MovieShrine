<?php
if(isset($_POST['signup'])){
    $server = "localhost";
    $username="root";
    $password="";
    $db="moviereview";
    $con = mysqli_connect($server,$username,$password,$db);
    if(!$con){
        die("connection to this database faild due to".mysqli_connect_error());
    }
    //echo "Success connecting to db";
    $username=$_POST['txt'];
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];

    $sql = "select * from moviereview.login where email='$email'";
     //echo $sql;
    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);
    if($num>=1)
    {
        ?>
        <script>
        alert("Account With the given Email Already Exists....");
        </script>
        <?php
        header('location:signup.html');

    }
    else{
        $sqll="insert into moviereview.login(email,pswd,usrname) values('$email','$pswd','$username')";
        mysqli_query($con,$sqll);
        ?>
        <script>
        alert( "Signup Successful");
        </script>
        <?php
        header('location:signup.html');
    }
    $con->close();
}
?>



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
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];

    $sql = "select * from moviereview.login where email='$email'";
     //echo $sql;
    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);
    if($num==1)
    {
        echo "duplicate";
        ?>
        <script>
        alert("Account With the given Email Already Exists....");
        </script>
        <?php
    }
    else{
        $sqll="insert into moviereview.login(email,pswd) values('$email','$pswd')";
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
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
}
if(isset($_POST['log'])){
    echo $_SESSION['email'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Font+Awesome+5+Free&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/main.css">
    <title>MovieShrine</title>
</head>

<body>
    <div class="navbar">
        <ul class="nav-list">
            <div class="logo"><img src="img/logoo.png" onclick="window.location.href = 'home.html';" alt="logo"></div>
            <li><a href="home.html">Home</a></li>
            <li><a href="movies.html">Movies</a></li>
            <li><a href="tvseries.html">TvSeries</a></li>
            <li><a href="Aboutus.html">About Us</a></li>
            <li><?php echo "Welcome".$_SESSION['email']; ?></li>
        </ul>
        <div class="rightNav">
            <form action="search.php" method="post">
            <input type="type" name="str" id="search">
            <input type="submit" name="search" class="btn btn-sm" Value ="Search"/>
            </form>
        </div>
    </div>
    <section class="background firstSection">
        <div class="box-main">
            <div class="firsthalf">
                <p class="text-big"> John Wick </p>
                <p class="text-small">John wick has a very simple revenge story. It can be summarized as
                    "Keanu gets angry and shoots bad guys" but what makes it special? Directed by Chad
                    Stahelski who's a stunt specialist boy does it show because the main selling point in
                    the film are some real virtuoso action sequences, well made choreographies. Unlike
                    today's action movies, it doesn't use quick-cuts or shaky cameras actually see what's going on.</p>
                <div class="buttons">
                    <button class="btn" onclick="window.location.href = 'index.html';">Give Review</button>
                </div>
            </div>
            <div class="secondhalf">
                <img src="img/johnwick.jpg" alt="Movie Image">
            </div>
        </div>
    </section>
    <section class="background firstSection">
        <div class="box-main">
            <div class="firsthalf">
                <p class="text-big"> Docter Strange </p>
                <p class="text-small">John wick has a very simple revenge story. It can be summarized as
                    "Keanu gets angry and shoots bad guys" but what makes it special? Directed by Chad
                    Stahelski who's a stunt specialist boy does it show because the main selling point in
                    the film are some real virtuoso action sequences, well made choreographies. Unlike
                    today's action movies, it doesn't use quick-cuts or shaky cameras actually see what's going on.</p>
                <div class="buttons">
                    <button class="btn" onclick="window.location.href = 'index.html';">Give Review</button>
                </div>
            </div>
            <div class="secondhalf">
                <img src="img/johnwick.jpg" alt="Movie Image">
            </div>
        </div>
    </section>
    <script src="index.js"></script>
</body>
</html>


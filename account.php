

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Font+Awesome+5+Free&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/account.css">
    <title>MovieShrine</title>
</head>

<body>
    <div class="navbar">
        <ul class="nav-list">
        <div class="logo"><img src="img/logoo.png" onclick="window.location.href = 'account.php';" alt="logo"></div>
            <li><a href="home.html">Home</a></li>
            <li><a href="movies.html">Movies</a></li>
            <li><a href="tvseries.html">TvSeries</a></li>
            <li><a href="Aboutus.html">About Us</a></li>
        </ul>
        <div class="rightNav">
            <form action="search.php" method="post">
                <input type="type" name="str" id="search">
                <input type="submit" name="search" class="btn btn-sm" Value="Search" />
            </form>
        </div>
    </div>
    <section class="background firstSectionAccount">
        <div class="box-main">
            <div class="firsthalf">
                <p class="text-big"> 
                    <?php
                        if(!isset($_SESSION)) 
                        { 
                            session_start(); 
                        } 
                        echo "Welcome         " . $_SESSION['username'];
                        echo "<br> Email:         " . $_SESSION['email'];
        
                        echo "<br>";
                        ?> 
                    </p>
                <p class="text-small"> This is Website where you can see reviews and give your reviews about a movie. <br> Enjoy your vist on this site.</p>
                <div class="buttons">
                    <button class="btn" onclick="window.location.href = 'logout.php';">Logout</button>
                    <form action="uploaddata.php" method="post" enctype="multipart/form-data">
                    <input class="btn" type ="file" name= "my_image">
                    <input class="btn" type="submit" name="submit" value="Upload">
                    </form>
                    <button class="btn" onclick="window.location.href = 'webdata.html';">Upload Web Data</button>
                </div>
            </div>
            <div class="secondhalf">
                <?php
                     include "db_conn.php";
                     $u_name=$_SESSION['username'];
                     $sql="select image_url from moviereview.images where user_name='$u_name'";
                     $res=mysqli_query($con,$sql);
                     if(mysqli_num_rows($res)>0)
                     {
                         while($row=mysqli_fetch_assoc($res))
                     {
                 ?>
                <img src="img/userprofile<?=$row['image_url']?>">
                <?php
                      }
                    }
                    else
                    {
                      ?>
                      <img src="img/userimg.png" alt="Movie Image">
                      <?php  
                    }
                ?>
            </div>
        </div>
    </section>
    <footer>
        <p class="text-footer">
            Copyright &copy; 2022 - www.movieshrine.com All rights resreved
        </p>
    </footer>
    <script src="index.js"></script>
</body>

</html>
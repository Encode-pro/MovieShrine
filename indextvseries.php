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
            <div class="logo"><img src="img/logoo.png" onclick="window.location.href = 'account.php';" alt="logo"></div>
            <li><a href="home.php">Home</a></li>
            <li><a href="movies.php">Movies</a></li>
            <li><a href="tvseries.php">TvSeries</a></li>
            <li><a href="Aboutus.html">About Us</a></li>
        </ul>
        <div class="rightNav">
        <form action="search.php" method="post">
            <input type="type" name="str" id="search">
            <input type="submit" name="search" class="btn btn-sm" Value ="Search"/>
            </form>
        </div>
    </div>

    <?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include "db_conn.php";
    $_SESSION['moviname'] = $_GET['mname'];
    $username=$_SESSION['username'];
    $mname=$_SESSION['moviname'];

    // $sql2 = " CREATE PROCEDURE p() READS SQL DATA begin insert into moviereview.review (moviename,username) values('$mname','$username') 
    // WHERE NOT EXISTS (select * from moviereview.review where moviename='$mname') end";
    // mysqli_query($con, $sql2);
    $sql = "select * from moviereview.tvseries where seriesname='$mname'";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $moviename = $row['seriesname'];
            $_SESSION['movieename']=$moviename;
    ?>
            <section class="background firstSectionwebdata">
                <div class="box-main">
                    <div class="firsthalf">
                        <p class="text-big"><a class="rlink" href="reviews.php?mname=<?php echo $moviename ?>"> <?= $row['seriesname'] ?></a></p>
                        <p class="text-small"><?= $row['description'] ?></p>
                        <div class="buttons">
                            <button class="btn" onclick="window.location.href = 'index.php?mname=<?php echo $moviename ?>';">Give Review</button>
                        </div>
                    </div>
                    <div class="secondhalf">
                        <img src="img/userprofile<?= $row['image'] ?>">
                    </div>
                </div>
            </section>
        <?php
        }
    } else {
        ?>
        <img src="img/userimg.png" alt="Movie Image">
    <?php
    }
    ?>
    <section class="background firstSectionindex">
        <div class="box-main">
            <div class="firsthalf">
            </div>
        </div>
        <h2 class="text-center">Review</h2>
        <div class="form">
            <form action="index.php" method="post">
                <input class="form-input" type="text" name="name" id="name" placeholder="Enter Your Name">
                <input class="form-input" type="text" name="number" id="phone" placeholder="Enter Your Number">
                <input class="form-input" type="text" name="sreview" id="sreview" placeholder="How was the Movie ?">
                <input class="form-input" type="text" name="nreview" id="nreview" placeholder="Your Review out of 10 ?">
                <textarea class="form-input" name="lreview" id="lreview" cols="30" rows="10" placeholder="Write your Review ?"></textarea>
                <form action="index.php" method="post">
                    <input type="submit" name="submit" class="btn" Value="Submit">
                </form>
        </div>

    </section>
    <footer>
        <p class="text-footer">
            Copyright &copy; 2022 - www.movieshrine.com All rights resreved
        </p>
    </footer>
</body>

</html>


<?php


if (isset($_POST['submit'])) {
    //echo "Success connecting to db";
    $name = $_POST['name'];
    $number = $_POST['number'];
    $sreview = $_POST['sreview'];
    $nreview = $_POST['nreview'];
    $lreview = $_POST['lreview'];
    $maname = $_SESSION['movieename'];
    // $sql1 = "INSERT INTO `moviereview`.`review` ( `moviename`,`name`, `number`, `sreview`, `nreview`, `lreview`, `dt`)
    // VALUES ( '$moviename','$name', '$number', '$sreview', '$nreview', '$lreview', current_timestamp());";
    //echo $sql;
    // $sql3="insert into moviereview.reviews(mname) values('$moviname')";
    // mysqli_query($con, $sql3);
    $sql1="insert into moviereview.reviews (mname,name,number,shortreview,noreview,longreview)
     values ('$maname','$name','$number','$sreview','$nreview','$lreview');";
    if ($con->query($sql1) == true) {
        header('location:home.php');
?>
        <script>
            alert("successfully inserted");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("ERROR: $sql <br> $con->error");
        </script>
<?php
    }
    // $con->close();
}
?>
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
            <input type="type" name="search" id="search">
            <button class="btn btn-sm">Search</button>
        </div>
    </div>

    <?php
    include "db_conn.php";
    $sql = "select * from moviereview.movie_data";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $moviename=$row['name'];

    ?>
            <section class="background firstSectionwebdata">
                <div class="box-main">
                    <div class="firsthalf">
                       <p class="text-big" name="reviewdetails" ><a class="rlink" href="reviews.php?mname=<?php echo $moviename?>"> <?= $row['name'] ?></a></p>
                        <p class="text-small"><?= $row['description'] ?></p>
                        <div class="buttons">
                        <button class="btn" onclick="window.location.href = 'index.php?mname=<?php echo $moviename?>';">Give Review</button>
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
    <footer>
        <p class="text-footer">
            Copyright &copy; 2022 - www.movieshrine.com All rights resreved
        </p>
    </footer>
    <script src="index.js"></script>
</body>

</html>
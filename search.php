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
            <li><a href="movie.php">Movies</a></li>
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
    if (isset($_POST['search'])) {
        include "db_conn.php";
        $str = mysqli_real_escape_string($con, $_POST['str']);
    ?>


        <?php
        $sql = "select * from moviereview.movie_data where name like '%$str%'";
        $res = mysqli_query($con, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
        ?>
                <section class="background firstSectionwebdata">
                    <div class="box-main">
                        <div class="firsthalf">
                            <h2 class="text-center">Movie Found</h2>
                            <p class="text-big"> <?= $row['name'] ?></p>
                            <p class="text-small"><?= $row['description'] ?></p>
                            <div class="buttons">
                                <button class="btn" onclick="window.location.href = 'index.html';">Give Review</button>
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
            <section class="background firstSectionmovienotfound">
                <div class="box-main">
                    <div class="firsthalf">
                        <!-- <img src="img/userimg.png" alt="Movie Image"> -->
                        <h2 class="text-center"> No Movie Found With Name <?= $str ?></h2>
                    </div>
                </div>
            </section>
        <?php
        }
        ?>
        <section class="background firstSectionsearch">
            <div class="box-main">
                <div class="firsthalf">

                    <p class="text-small">
                        <?php
                        $sql = "select * from moviereview.reviews where name like '%$str%'";
                        //echo "Success connecting to db";
                        //echo $sql;
                        $res = mysqli_query($con, $sql);

                        if ($con->query($sql) == true) {
                        ?>
                            <script>
                                alert("Data Found");
                            </script>
                        <?php
                        } else {
                        ?>
                            <script>
                                alert("ERROR: $sql <br> $con->error");
                            </script>
                    <?php
                        }
                    }

                    ?>
                    </p>
                </div>
                <div class="secondhalf">
                    <h2 class="text-center">Review</h2>
                    <p class="text-small">Reviews with name <?php echo $str; ?> </p>

                    <table>
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Number</th>
                            <th>How was the Movie?</th>
                            <th>Review out of 10? </th>
                            <th>Long Review </th>
                        </tr>
                        <?php
                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['number']; ?></td>
                                    <td><?php echo $row['shortreview']; ?></td>
                                    <td><?php echo $row['noreview']; ?></td>
                                    <td><?php echo $row['longreview']; ?></td>
                                </tr>

                        <?php
                            }
                        }
                        ?>


                    </table>

                </div>
            </div>
        </section>
        <footer>
            <p class="text-footer">
                Copyright &copy; 2022 - www.movieshrine.com All rights resreved
            </p>
        </footer>
</body>

</html>
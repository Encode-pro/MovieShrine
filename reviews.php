<?php
$moname=$_GET['mname'];
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
            <div class="logo"><img src="img/logoo.png" onclick="window.location.href = 'account.php';" alt="logo"></div>
            <li><a href="home.php">Home</a></li>
            <li><a href="movies.php">Movies</a></li>
            <li><a href="tvseries.html">TvSeries</a></li>
            <li><a href="Aboutus.html">About Us</a></li>
        </ul>
        <div class="rightNav">
            <input type="type" name="search" id="search">
            <button class="btn btn-sm">Search</button>
        </div>
    </div>
    <?php
        include "db_conn.php";
        // $str = mysqli_real_escape_string($con, $_POST['str']);
    ?>


        <section class="background firstSectionsearch">
            <div class="box-main">
                <div class="firsthalf">

                    <p class="text-small">
                        <?php
                        $sql = "select * from moviereview.reviews where mname like '%$moname%'";
                        //echo "Success connecting to db";
                        //echo $sql;
                        $res = mysqli_query($con, $sql);
                        ?>
                    </p>
                </div>
                <div class="secondhalf">
                    <h2 class="text-center">Reviews</h2>
                    <p class="text-small">Reviews for <?php echo $moname; ?> </p>

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
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
            <li><a href="movie.html">Movies</a></li>
            <li><a href="tvseries.html">TvSeries</a></li>
            <li><a href="Aboutus.html">About Us</a></li>
        </ul>
        <div class="rightNav">
            <input type="type" name="search" id="search">
            <button class="btn btn-sm">Search</button>
        </div>
    </div>
    <section class="background firstSectionindex">
        <div class="box-main">
            <div class="firsthalf">
                <p class="text-big"> Serch page </p>
                
                <p class="text-small">
                <?php
                    if(isset($_POST['search'])){
                        $server = "localhost";
                        $username="root";
                        $password="";
                        $db="moviereview";
                        $con = mysqli_connect($server,$username,$password,$db);
                        if(!$con){
                                die("connection to this database faild due to".mysqli_connect_error());
                        }
                        $str = mysqli_real_escape_string($con,$_POST['str']);
                        $sql="select * from moviereview.review where name like '%$str%'";
                        //echo "Success connecting to db";
                         //echo $sql;
                        $res=mysqli_query($con,$sql);
                        if(mysqli_num_rows($res)>0)
                        {
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    //echo '<pre>';
                                    //print_r($row);
                                    echo $row['name'];
                                    //echo "jkbkb";
                                    echo $row['sreview'];
                                    echo "<br/>";
                            }
                    }
                        if($con->query($sql) == true)
                        {
                                ?>
                            <script>
                            alert( "Data Found");
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
                    
                ?>
                </p>
                <div class="buttons">
                    <button class="btn" onclick="window.location.href = 'index.html';">Give Review</button>
                </div>
            </div>
            <div class="secondhalf">
            </div>
        </div>
        <h2 class="text-center">Review</h2>   
    </section>
    <footer>
            <p class="text-footer">
                Copyright &copy; 2022 - www.movieshrine.com All rights resreved
            </p>
        </footer>
</body>

</html>
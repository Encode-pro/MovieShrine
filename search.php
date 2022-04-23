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
    <section class="background firstSectionsearch">
        <div class="box-main">
            <div class="firsthalf">
                
                <p class="text-small">
                <?php
                    if(isset($_POST['search'])){
                        include "db_conn.php";
                        $str = mysqli_real_escape_string($con,$_POST['str']);
                        $sql="select * from moviereview.review where name like '%$str%'";
                        //echo "Success connecting to db";
                         //echo $sql;
                        $res=mysqli_query($con,$sql);
                        
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
            </div>
            <div class="secondhalf">
<style>
table {
  border-collapse: collapse;
  width: 100%;
  font-family: Lobster;
}

th, td {
  padding: 30px;
  text-align: left;
  border-bottom: 1px solid #DDD;
}

tr:hover {background-color: rgba(255,137,52,1);}
</style>
</head>
<body>

<h2 class="text-center">Review</h2>
<p class="text-small">Reviews with name <?php echo $str;?> </p>

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
      if(mysqli_num_rows($res)>0)
      {
           while($row=mysqli_fetch_assoc($res))
           {
       ?>
            <tr>
                <td><?php echo $row['sno']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['number']; ?></td>
                <td><?php echo $row['sreview']; ?></td>
                <td><?php echo $row['nreview']; ?></td>
                <td><?php echo $row['lreview']; ?></td>
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
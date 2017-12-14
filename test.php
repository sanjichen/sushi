<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h3>
                h3. 这是一套可视化布局系统.
            </h3>
            <ul class="thumbnails">
<?php
header("Content-type: text/html; charset:utf-8");

$con = mysqli_connect("localhost:3306","root","123");

if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

mysqli_select_db($con,"HefengSushi");
mysqli_query($con,'set names utf8');
$result = mysqli_query($con,"SELECT * FROM Dish");
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
  {
  	echo "<li class='span4'>
                    <div class='thumbnail'>
                        <img alt='300x200' src='menu/"."".$row['Picture'].""."'/>
                        <div class='caption'>
                            <h3>
                                "." ".$row['DishName']." "."
                            </h3>
                            <p>
                                "." ".$row['Price']." "."
                            </p>
                            <p>
                                <a class='btn btn-primary' href='#''>浏览</a> <a class='btn' href='#'>分享</a>
                            </p>
                        </div>
                    </div>
                </li>
    ";
  }

mysqli_close($con);
?>
</ul>
        </div>
    </div>
</div>
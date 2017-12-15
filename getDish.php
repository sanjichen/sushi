<?php
    header('Content-Type: application/json');
    header('Content-Type: text/html;charset=utf-8');

    $series = $_GET['series'];

    $dish = [];

    $con = mysqli_connect("localhost:3306","root","123");
    if (!$con){
        die('Could not connect: ' . mysqli_error());
    }
    mysqli_select_db($con,"HefengSushi");
    mysqli_query($con,'set names utf8');
    $query = "select * from Dish where Series = '".$series."'";
    $result = mysqli_query($con,$query);
    $jsonResult = "[";
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $dish['DishName'] = $row['DishName'];
        $dish['Picture'] = $row['Picture'];
        $dish['Price'] = $row['Price'];
        $jsonResult .= "{\"DishName\":\"";
        $jsonResult .= $row['DishName'];
        $jsonResult .= "\",";

        $jsonResult .= "\"Picture\":\"";
        $jsonResult .= $row['Picture'];
        $jsonResult .= "\",";

        $jsonResult .= "\"Price\":\"";
        $jsonResult .= $row['Price'];
        $jsonResult .= "\"},";
    }
    $jsonResult = rtrim($jsonResult,",");
    $jsonResult .= "]";
    $final = urldecode(json_encode($jsonResult));
    echo $final;
?>



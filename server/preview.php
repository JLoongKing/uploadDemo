<?php
$con = mysqli_connect("localhost","root","123456");
if (!$con)
{
    var_dump('Could not connect: ' . mysql_error());
    die();
}
mysqli_select_db( $con,"imgcode_db");
$sql="select * from code_img";

if (!mysqli_query($con,$sql))
{
  die('Error: ' . mysqli_error($con));
}
$result = $con-> query($sql);
$v = $result->fetch_all();

mysqli_close($con);
die(json_encode($v));
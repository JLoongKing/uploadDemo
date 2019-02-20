<?php

// Make sure file is not cached (as it happens for example on iOS devices)
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


// Support CORS
// header("Access-Control-Allow-Origin: *");
// other CORS headers if any...
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit; // finish preflight CORS requests here
}

if (isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];
}else {
    die(json_encode(["status"=>"fail", "info"=>"no have id"]));
}
$con = mysqli_connect("localhost","root","123456");
if (!$con)
{
    var_dump('Could not connect: ' . mysql_error());
    die;
}
mysqli_select_db( $con,"imgcode_db");
$sql="DELETE FROM code_img where id=".$id;

if (!mysqli_query($con,$sql))
{
  die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
die(json_encode(["status"=>"success","info"=>$id]));
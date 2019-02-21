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
mysqli_close($con);
$v = $result->fetch_all();

for($i=0; $i<count($v); $i++) {
    if($v[$i][3]==1){
        $con = mysqli_connect("localhost","root","123456");
        if (!$con)
        {
            var_dump('Could not connect: ' . mysql_error());
            die();
        }
        mysqli_select_db( $con,"imgcode_db");
        $sql="UPDATE code_img SET islast=0,times=times+1 WHERE id=".$v[$i][0].";";

        $result = $con-> query($sql);
        if (!$result)
        {
            die('Error: ' . mysqli_error($con));
        }
        mysqli_close($con);
        if(!isset($v[$i+1])){
            $con = mysqli_connect("localhost","root","123456");
            if (!$con)
            {
                var_dump('Could not connect: ' . mysql_error());
                die();
            }
            mysqli_select_db( $con,"imgcode_db");
            $sql="UPDATE code_img SET islast=1 WHERE id=".$v[0][0].";";

            if (!mysqli_query($con,$sql))
            {
                die('Error: ' . mysqli_error($con));
            }
            $result = $con-> query($sql);
            mysqli_close($con);
        }else{
            $con = mysqli_connect("localhost","root","123456");
            if (!$con)
            {
                var_dump('Could not connect: ' . mysql_error());
                die();
            }
            mysqli_select_db( $con,"imgcode_db");
            $sql="UPDATE code_img SET islast=1 WHERE id=".$v[$i+1][0].";";

            if (!mysqli_query($con,$sql))
            {
                die('Error: ' . mysqli_error($con));
            }
            $result = $con-> query($sql);
            mysqli_close($con);
        }

        die(json_encode(["name"=>$v[$i][1],"url"=>$v[$i][2]]));
    }
}
if(count($v)>1){
    $con = mysqli_connect("localhost","root","123456");
    if (!$con)
    {
        var_dump('Could not connect: ' . mysql_error());
        die();
    }
    mysqli_select_db( $con,"imgcode_db");
    $sql="UPDATE code_img SET islast=1 WHERE id=".$v[1][0].";";

    if (!mysqli_query($con,$sql))
    {
        die('Error: ' . mysqli_error($con));
    }
    $result = $con-> query($sql);
    mysqli_close($con);
}else{
    $con = mysqli_connect("localhost","root","123456");
    if (!$con)
    {
        var_dump('Could not connect: ' . mysql_error());
        die();
    }
    mysqli_select_db( $con,"imgcode_db");
    $sql="UPDATE code_img SET islast=1 WHERE id=".$v[0][0].";";

    if (!mysqli_query($con,$sql))
    {
        die('Error: ' . mysqli_error($con));
    }
    $result = $con-> query($sql);
    mysqli_close($con);
}
$con = mysqli_connect("localhost","root","123456");
if (!$con)
{
    var_dump('Could not connect: ' . mysql_error());
    die();
}
mysqli_select_db( $con,"imgcode_db");
$sql="UPDATE code_img SET times=times+1 WHERE id=".$v[0][0].";";
$result = $con-> query($sql);
if (!$result)
{
    die('Error: ' . mysqli_error($con));
}
mysqli_close($con);
die(json_encode(["name"=>$v[0][1],"url"=>$v[0][2]]));



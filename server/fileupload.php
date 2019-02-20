<?php
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 200000))
    {
        if ($_FILES["file"]["error"] > 0)
            {
                die("Return Code: " . $_FILES["file"]["error"] . "<br />"); 
            }
           
        else
            { 
                $newfilename="../WiFi_Uncle/" .time(). $_FILES["file"]["name"];
                if (file_exists($newfilename))
                {
                    die($_FILES["file"]["name"] . "该文件已经存在，请修改文件名后上传");
                }
                else
                {
                    move_uploaded_file($_FILES["file"]["tmp_name"],
                    $newfilename);
                }
            }
    }
    else
    {
        echo "文件格式不符合，请上传小于200kb的jpg图片";
        die();
    }
$con = mysqli_connect("localhost","root","123456");
if (!$con)
{
    var_dump('Could not connect: ' . mysql_error());
    die();
}
if(!isset($_POST['name'])){
    die("没有添加销售名");
}
mysqli_select_db( $con,"imgcode_db");
$fileurl=$newfilename;
$sql="INSERT INTO code_img (name, url, islast) VALUES ('".$_POST["name"]."','".$fileurl."','0')";

if (!mysqli_query($con,$sql))
{
  die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
header("Location: http://test.greedyai.com/uploadDemo/upload/index2.html");  

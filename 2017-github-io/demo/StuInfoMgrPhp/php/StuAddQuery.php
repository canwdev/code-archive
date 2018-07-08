<?php
require "linkdb.php";

//session_start();								//启动SESSION
if ($getstuid) {
    $stuid=$getstuid;
} else {
    $stuid = $_POST['StuNumber'];
}

//$_SESSION['number']=$number;					//将学号值传给其他页面

$sql = "select * from stu where StuID = '$stuid'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

#debug var_dump(row);
if (($stuid!=NULL)&&(!$row))
    //echo "<center><p>查询无结果</p></center>";


?>
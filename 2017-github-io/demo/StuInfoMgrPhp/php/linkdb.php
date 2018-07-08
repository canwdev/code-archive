<?php
$servername = "SERVERNAME";
$username = "USERNAME";
$password = "PASSWORD";
 
// 创建连接 mysqli 是 mysql的improve版本 原来的php_mysql.dll 在某个php版本被移除。
$conn = mysqli_connect($servername, $username, $password);
 
// 检测连接
if ($conn->connect_error) {
    die("debug: 连接失败: " . $conn->connect_error);
} 
//else echo "debug: 连接成功";

$database="school";	                  //要连接的数据库
mysqli_select_db($conn,$database);
?>
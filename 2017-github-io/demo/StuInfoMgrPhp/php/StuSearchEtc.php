<?php
require "linkdb.php";
header("Cache-Control: No-Cache");				//不使用缓存
header("Pragma: No-Cache");
session_start();								//启动SESSION
@$stuid=$_GET['id'];							//得到StuQuery.php页面的链接中传来的值
$_SESSION['number']=$stuid;					//使用SESSION将学号传到其他页面
$sql="select * from stu where StuID='$stuid'";	//查找备注
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$etc=$row['Etc'];
$name=$row['Name'];
$intro=$row['Intro'];
?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" charset="utf-8"/>
    <title>StuEidt</title>
    <link rel="stylesheet" href="../css/stuea.css">
</head>

<body>
    <div>
    <p>
        <?php
        //跳转到编辑
        echo "<a class=\"floatright\" href='StuAdd.php?id=$stuid'>✎&nbsp;</a>";
        if($name)echo $name;else echo "佚名";
        ?>
        的备注信息:</p>
    
    <?php if($etc)echo $etc;else echo "暂无";?><br>
        
    <p>简介</p>
    <?php if($intro)echo $intro;else echo "暂无";?>
    </div>

    
</body>
    
</html>
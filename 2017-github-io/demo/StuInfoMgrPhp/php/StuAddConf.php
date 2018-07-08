<?php
#debug echo "<center>Link Start!!</center>";


#debug echo "<center>getting info...</center>";
$stuid = $_POST['StuNumber'];
$name = $_POST['StuName'];
$sex = $_POST['Sex'];
$specid = $_POST['SpecID'];
$birthday = $_POST['Birthday'];
$etc = $_POST['Etc'];
$intro = $_POST['Intro'];

#debug var_dump($stuid);
#debug var_dump($intro);


function verify($stuid, $name, $sex, $specid, $birthday) {
#debug echo "<center>verifying...</center>";
    $checkbirthday=preg_match('/^\d{4}-(0?\d|1?[012])-(0?\d|[12]\d|3[01])$/',$birthday);
    //使用正则表达式简单验证日期的格式
    if ($stuid==NULL||$name==NULL||$sex==NULL||$specid==NULL||$birthday==NULL) {
        echo '<center class="failed">验证失败：星号<span class="mustinput">*</span> 为必填项</center>';
        //echo "<script>alert('星号为必填项！');location.href='StuAdd.php';</script>";
        return false;
    }
    else if ($checkbirthday==false) {
        echo '<center class="failed">验证失败：日期格式（年-月-日）错误</center>';
        //echo "<script>alert('日期格式错误!');location.href='StuAdd.php';</script>";
        return false;
    }
    return true;
}

function refresh_current($flag) {
    //echo "<script language=JavaScript> location.replace(location.href);</script>";
    echo "<script>document.getElementById(\"StuNumber\").value=jstuid;</script>";
    //echo "<script>document.getElementById(\"StuNumber1\").value=jstuid;</script>";
    if ($flag) {
        echo "<center class=\"normal\">刷新完成</center>";
    } else {
        echo "<center class=\"normal\">请点击刷新按钮</center>";
    }
    //echo '服务器忙，请<a href="javascript:document.location.reload()">刷新</a>页面，或稍后再试！谢谢！!';
}

if (!$stuid) {
    echo "<center class=\"normal\">查询无结果</center>";
}


if ($_POST['b'] == '添加') {
    refresh_current();
#debug echo "<center>if success executing 添加...</center>";
    $flag=verify($stuid, $name, $sex, $specid, $birthday);
    if ($flag) {
        $ssql="select StuID from stu where StuID='$stuid'";
        $sresult=mysqli_query($conn,$ssql);
        $srow=mysqli_fetch_array($sresult);
        if($srow) {
            echo '<center class="failed">添加失败：学号已存在</center>';
        } else {
            $isql="insert into stu(StuID,Name,Sex,SpecID,Birthday,Etc,Intro) values('$stuid','$name','$sex','$specid','$birthday','$etc','$intro')";
            $iresult=mysqli_query($conn,$isql);
            #debug var_dump($isql);
            #debug var_dump($iresult);
            #debug var_dump(mysqli_affected_rows($conn));
            
            if(mysqli_affected_rows($conn)>0) {
                echo '<center class="success">添加成功</center>';
                
            } else
                echo '<center class="failed">添加失败：未知错误</center>';
        }
    }
    else {
        echo '<center class="failed">添加失败：格式验证失败</center>';
    }
}

if ($_POST['b'] == '保存') {
#debug echo "<center>if success executing 保存...</center>";
    $flag=verify($stuid, $name, $sex, $specid, $birthday);
    if ($flag) {
        //$usql="replace into stu(StuID,Name,Sex,SpecID,Birthday,Etc,Intro) values('$stuid','$name','$sex','$specid','$birthday','$etc','$intro')";
        $usql="update stu set StuID='$stuid',Name='$name',Sex='$sex',SpecID='$specid',Birthday='$birthday',Etc='$etc',Intro='$intro' where StuID='$stuid'";
        $uresult=mysqli_query($conn,$usql);
        #debug var_dump($usql);
        #debug var_dump($uresult);
        #debug var_dump(mysqli_affected_rows($conn));
        
        if(mysqli_affected_rows($conn)>=0) {
                echo '<center class="success">保存成功</center>';
            } else
                echo '<center class="failed">保存失败：未知错误</center>';
    } else
        echo '<center class="failed">保存失败：格式验证失败</center>';
    sleep(0.5);
    refresh_current();
}

if ($_POST['b'] == '删除') {
    if ($stuid) {
        $ssql="select StuID from stu where StuID='$stuid'";
        $sresult=mysqli_query($conn,$ssql);
        $srow=mysqli_fetch_array($sresult);
        if(!$srow) {
            echo '<center class="failed">删除失败：学号不存在</center>';
        } else {
            $dsql="delete from stu where StuID='$stuid'";
            $dresult=mysqli_query($conn,$dsql);
            if ($dresult) {
                echo '<center class="success">删除成功</center>';
            }
            else {
                echo '<center class="failed">删除失败：未知错误</center>';
            } 
        }
    } else {
        echo '<center class="failed">删除失败：学号验证失败</center>';
    }
}

if ($_POST['b'] == '刷新') {
    refresh_current(1);
}
?>
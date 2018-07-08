<?php


require "linkdb.php";

$stuid = $_POST['StuNumber'];
$name = $_POST['StuName'];
$specname = $_POST['SpecName'];

function get_from_stu($stuid,$name,$specid) {
    $sql = "select * from stu where ";
    $flag = false;    //标记是否有结果

    if ($stuid) {
        $sql .= "StuID like '%$stuid%'";
        $flag = true;
    }

    if ($name) {
        if($flag == true)
            $sql .= " and Name like '%$name%'";
        else
            $sql .= " Name like '%$name%'";
        $flag = true;
    }
    
    if ($specid && ($specid!="0")) {
        if ($flag == true)
            $sql .= " and SpecID = '$specid'";
        else
            $sql .= " SpecID = '$specid'";
        $flag = true;
    }

    
    if (!$flag) {
       $sql = "select * from stu"; 
    }
    return $sql;
}

//转换专业的name->id
function convert_spec_n2i($specname) {
    if ($specname) {
        if ($specname == "所有专业")
            $specid=0;
        else {
            $sql="select SpecID from spec where SpecName='$specname'";
            #debug $sql = "select * from stu"; 
            
            require "linkdb.php";
            $new_result=mysqli_query($conn,$sql);
            #debug var_dump($sql);echo "<br>";
            
            $row=mysqli_fetch_array($new_result,MYSQLI_NUM);
            list($specid)=$row;
            #debug var_dump($specid);echo "<br>";
        }
    }
    return $specid;
}

//转换专业的id->name
function convert_spec_i2n($specid) {
    if ($specid) {
        if ($specid == 0)
            $specname= "所有专业";
        else {
            $sql="select SpecName from spec where SpecID='$specid'";
            
            require "linkdb.php";
            $new_result=mysqli_query($conn,$sql);
            
            $row=mysqli_fetch_array($new_result,MYSQLI_NUM);
            list($specname)=$row;
        }
    }
    return $specname;
}

#debug $sql = get_from_stu(NULL,NULL,'所有专业');
$specid = convert_spec_n2i($specname);
$sql = get_from_stu($stuid,$name,$specid);
$result = mysqli_query($conn,$sql);
#debug var_dump($sql);
#debug var_dump($result);

$total=mysqli_num_rows($result);
#debug printf("| %d",$total);


$page=isset($_GET['page'])?intval($_GET['page']):1;	//获取地址栏中page的值，不存在则设为1。
$num=6;                                      	 	//每页显示*条记录
$url='StuSearch.php';							 	//本页URL
//页码计算
$pagenum=ceil($total/$num);					 		//获得总页数,也是最后一页
$page=min($pagenum,$page);					 		//获得首页
$prepg=$page-1;								 		//上一页
$nextpg=($page==$pagenum? 0: $page+1);		 	 	//下一页
$new_sql=$sql." limit ".($page-1)*$num.",".$num;	//按每页记录数生成查询语句
$new_result=mysqli_query($conn,$new_sql);

#debug printf("=%d*%d",$pagenum,$num);

if($row=mysqli_fetch_array($new_result,MYSQLI_NUM)) {
    //printf ("%s : %s",$row[0],$row[1]);
    echo "<hr>";
    echo "<table width=600 border=1 bordercolor=#d8d8d8 align=center cellpadding=0 cellspacing=0 style=\"border-collapse:collapse\">";
	echo "<tr bgcolor=#eaeaea align=center><td>✏</td><td>学号</td>";
   	echo "<td>姓名</td>";
   	echo "<td>性别</td>";
   	echo "<td>专业</td>";
    echo "<td>生日</td>";
   	echo "</tr>";
    
    $count=0;
	do
	{
		list($stuid,$name,$sex,$specid,$birthday,$etc)=$row;
		
        //设置变色表格
        if($count%2!=0)
       	echo "<tr bgcolor=#f4f4f4 align=center>";
        else
        echo "<tr align=center>";
        
        //跳转到编辑
        echo "<td><a href='StuAdd.php?id=$stuid' target=\"frmmain\">✍</a></td>";
        
        //设置学号超链接
        echo "<td><a href='StuSearchEtc.php?id=$stuid' target=\"search_frmright\">$stuid</a></td>";
        
       	echo "<td>$name</td>";
		if($sex==1)
			echo "<td>男</td>";
		else 
		  	echo "<td>女</td>"; 
        $specname = convert_spec_i2n($specid);
        echo "<td>$specname</td>";
        
	  	$timeTemp=strtotime($birthday);     	//将日期时间解析为 UNIX 时间戳
	  	$time=date("Y-n-j",$timeTemp); 			//用date函数将时间转换为“年-月-日”形式	
      	echo "<td>$birthday</td>";
      	
      	echo "</tr>";  
        
        $count +=1;
	}while($row=mysqli_fetch_array($new_result,MYSQLI_NUM));
    
    
   	echo "</table>";
    //开始分页导航条代码
	$pagenav="";
	if($prepg)
		$pagenav.="<a href='$url?page=$prepg&StuNumber=$StuNumber&StuName=$StuName&select=$Project'>【上一页】</a> "; 
	for($i=1;$i<=$pagenum;$i++)
	{
		if($page==$i) 	$pagenav.=" ".$i." ";
		else
			$pagenav.=" <a href='$url?page=$i&StuNumber=$StuNumber&StuName=$StuName&select=$Project'>$i</a>"; 
	}
	if($nextpg)
		$pagenav.=" <a href='$url?page=$nextpg&StuNumber=$StuNumber&StuName=$StuName&select=$Project'>【下一页】</a>"; 
	#debug $pagenav.="     共 ".$pagenum." 页";
	//输出分页导航
	echo "<br><div align=center class=STYLE1><b>".$pagenav."</b></div>";
    echo "<hr>";
}
else
	echo "<hr><center><p>查询无结果</p></center>";
mysqli_close($conn);
?>
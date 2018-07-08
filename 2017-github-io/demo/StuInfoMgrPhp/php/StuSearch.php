<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" charset="utf-8"/>
    <title>StuSearch</title>
    <link rel="stylesheet" href="../css/stuea.css">
</head>

<body>
    <p>学生信息查询</p>
<form action="StuSearch.php" method="post" >
		<table width="500" border="0" align="center"  cellspacing="0">
		<tr height="15" >
			<td>学号:</td>
			<td><input name="StuNumber" size="13" type="text" ></td>
			<td>姓名:</td>
			<td><input name="StuName" size="13" type="text"></td>
			<td>专业:</td>
			<td><select name="SpecName">
					<option>所有专业</option>   
					<option>网络</option>
					<option>软件</option>
                    <option>设计</option>
				</select>
			</td>
			<td align="center">
				<input type="submit" name="Query" value="查询" >
			</td>
		</tr>
		</table>
</form>
<?php
@include "StuSearchQuery.php";							//包含StuQuery.php页面
?>

    
</body>
    
</html>
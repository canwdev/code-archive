<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" charset="utf-8"/>
    <title>StuSearch</title>
    <?php 
    error_reporting(E_ALL || ~E_NOTICE);
                    $getstuid=$_GET['id'];
                ?>
    <link rel="stylesheet" href="../css/stuea.css">
</head>

<body>
    <p>学生信息录入、查询并编辑</p>
    	<form method="post" action="StuAdd.php" name="frm1" style="margin:0">
		<table width="340" align="center">
		<tr>
			<td align="center">
                <span>根据学号查询:</span>
                
				<input name="StuNumber" id="StuNumber" type="text" size="10"  placeholder="输入学号" value="<?php echo $getstuid; ?>">
				<input type="submit" name="test" value="查询">
			</td>
		</tr>
		</table>
	</form><hr>
<?php
    @include "StuAddQuery.php";
?>    
 	<form name="frm2" method="post" style="margin:0" enctype="multipart/form-data">
		<table bgcolor="#f2f2f2" width="430" border="1" bordercolor=#959595 align="center" cellpadding="5" cellspacing="0" style="border-collapse:collapse">
		<tr>
			<td bgcolor="#e3e3e3" width="90"><span >学号<span class="mustinput">*</span></span></td>
			<td>
				<input name="StuNumber" type="text" size="35"  value="<?php echo $row['StuID']; ?>" required="required" id="StuNumber1" placeholder="输入学号">
			</td>
		</tr>
		<tr>
			<td bgcolor="#e3e3e3" width="90"><span >姓名<span class="mustinput">*</span></span></td>
			<td>
				<input name="StuName" type="text" size="35"  value="<?php echo $row['Name']; ?>" required="required" placeholder="输入姓名">
			</td>
		</tr>
		<tr>
			<td bgcolor="#e3e3e3"><div >性别<span class="mustinput">*</span></div></td>
            <?php 
            if ($row['StuID'] != NULL) {
            ?>
            
			<?php
			if($row['Sex']==0)
			{?>
			<td>
				<input type="radio" name="Sex" value="1" required="required"><span >男</span>
				<input type="radio" name="Sex" value="0" checked="checked" required="required"><span >女</span>
			</td>
			<?php
			}
			else
			{?>
			<td>
				<input type="radio" name="Sex" value="1" checked="checked" required="required"><span >男</span>
				<input type="radio" name="Sex" value="0" required="required"><span >女</span>
			</td>
			<?php
			}
			?>
            
            <?php
                }
                else {
            ?>
            <td>
				<input type="radio" name="Sex" value="1" required="required"><span >男</span>
				<input type="radio" name="Sex" value="0" required="required"><span >女</span>
			</td>
            <?php } ?>
            
		</tr>
        <tr>
			<td bgcolor="#e3e3e3"><span >专业ID<span class="mustinput">*</span></span></td>
			<td>
				<input name="SpecID" size="35" type="text"  value="<?php echo $row['SpecID'];?>" autocomplete="on" list="SpecIDs" required="required" placeholder="输入ID">
                    <datalist id="SpecIDs"><br><small>
                        <option  value="1" >网络=1</option>
                        <option  value="2" >软件=2</option>
                        <option  value="3" >设计=3</option></small>
                    </datalist>
			</td>
		</tr>
		<tr>
			<td bgcolor="#e3e3e3"><span>生日<span class="mustinput">*</span></span></td>
			<td>
                <?php 
                    if ($row['StuID'] != NULL) {
                ?>
				<input name="Birthday" size="35" type="text"  value="<?php echo $row['Birthday'];?>" required="required">
                <?php
                    } else {
                ?>
                <input name="Birthday" size="35" type="text"  value=""  placeholder="年-月-日" required="required">
                <?php
                    }
                ?>
			</td>
		</tr>

		<tr>
			<td bgcolor="#e3e3e3"><span>备注</span></td>
			<td>
				<textarea cols="37" rows="4" name="Etc" placeholder="输入备注"><?php echo $row['Etc']; ?></textarea>
			</td>
		</tr>
		<tr>
			<td bgcolor="#e3e3e3"><span>简介</span></td>
			<td >
                <textarea cols="37" rows="6" name="Intro" placeholder="输入简介" ><?php echo $row['Intro']; ?></textarea>

			</td>
		</tr>
		<tr>
			<td align="center" colspan="2" bgcolor="#dbdbdb">
                <?php 
                    if ($row['StuID'] != NULL) {
                ?>
				<input name="b" type="submit" value="保存" >&nbsp;&nbsp;
				<input name="b" type="submit" value="删除" onclick="return confirm('确定删除吗？');">&nbsp;&nbsp;
                
                <?php
                    if ($getstuid) {
                ?>
                <input name="b" type="button" value="返回"  onclick="window.location='../StuSearch_frame.html'">&nbsp;&nbsp;
                <?php
                    } else {
                ?>
                <input name="b" type="button" value="返回"  onclick="window.location='StuAdd.php'">&nbsp;&nbsp;
                <?php } ?>
                
                <?php } ?>
                
                <?php 
                    if ($row['StuID'] == NULL) {
                ?>
				<input name="b" type="submit" value="添加" >&nbsp;&nbsp;
                <!--<input name="b" type="button" value="返回首页"  onclick="window.location='../main.html'">&nbsp;&nbsp; -->
                <?php
                    }
                ?>
                <input name="b" type="submit" value="刷新" >&nbsp;&nbsp;
			</td>
		</tr>
		</table>
	</form>   
    <hr>
    <script>
    //var jstuid=document.getElementById('StuNumber1').value; 
    var jstuid=<?php echo $stuid; ?>;
    </script>
</body>
</html>

    <?php
    @include "StuAddConf.php";
    ?>
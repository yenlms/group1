<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
include("mysql_connect.php");
$id = $_POST['id'];
$pw = $_POST['pw'];
$b = $_POST['button'];

$sql = "SELECT * FROM member where account='$id' and password='$pw'";
$row = mysql_fetch_array(mysql_query($sql));
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>國立臺北教育大學_學習網</title>
</head>

<body>
<div id="HEADER">
	<h2>電腦科學學習網</h2>
</div>
<div id="MAIN_NAV">
	<ul>
		<li><a href="reading.php">開始閱讀</a></li>  <!--相關網頁連結區-->
		<li><a href="upload.php">檔案上傳</a></li>
		<li><a href="message.php">留言板</a></li>
		<li><a href="record.php">歷史紀錄</a></li>
		<li><b>會員資料修改</b></li>
		<li><a href="manager_login.php">管理者專區</a></li>
		<li><a href="index.php" style="color:#FF99FF">回首頁</a></li>
	</ul>
</div>
<div id="CONTENT">
	<p>
	
		<center>
		<h2>會員資料修改<br/></h2>
		<br/>
		<br/>
		
		<?php
			if (!$row) { // add this check.
				echo "<h3>帳號或密碼錯誤，請重新輸入</h3>";
        		echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
			}
			else {
		?>
				<form name="form" method="post" action="member_update.php"> <!--讓使用者修改使用資料；以html方式撰寫,可在php間斷開-->
					<p>
					帳號：<input type="text" name="account" value="<?php echo $row['account']; ?>" disabled="true"/> <br><!--disabled="true"不能將value做更動,不讓使用者改帳號-->
					<input type="hidden" name="account" value="<?php echo $row['account']; ?>"/>  <!--html與php作互動溝通；value不同使用者呼叫不同預設值-->
					密碼(留空表示不修改)：</h1><input type="password" name="pw" /> <br>
					確認密碼：</h1><input type="password" name="pwconfirm" /> <br>
					使用者姓名：</h1><input type="text" name="username" value="<?php echo $row['username']; ?>" /> <br>
					Email：</h1><input type="text" name="email" value="<?php echo $row['email']; ?>" /> <br>
					城市：</h1><input type="text" name="country" value="<?php echo $row['country']; ?>" /> <br>
					年齡：</h1><input type="text" name="age" value="<?php echo $row['age']; ?>" /> <br>
					</p>
					<input type="submit" name="button" value="修改" />
					<input type="button" value="回上一頁" onclick="javascript:history.back(1)" />
					<p>
					</p>
				</form>
				
		<?php
			}
		?>
		</center>
		<br/>
		<br/>
	</p>
</div>
<div id="FOOTER">	
	<p>
		<br/><br/><br/><br/><br/><br/>
		<h2><center><br/>Author by <i>Yi-Chan Kao</i> & <i>Kung-Si Cheng</i> </center></h2>
	</p>
</div>
</body>
</html>



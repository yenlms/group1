<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	include("mysql_connect.php");//從mysql_connect.php載入,接收要修改的資料
	$account = $_POST['select1']; 
	$button = $_POST['button1'];  //拿出按鈕的value，做不同的動作（新增,修改,刪除）
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
		<li><a href="reading.php">開始閱讀</a></li> <!--網頁相關連結區-->
		<li><a href="upload.php">檔案上傳</a></li>
		<li><a href="message.php">留言板</a></li>
		<li><a href="record.php">歷史紀錄</a></li>
		<li><a href="login.php">會員資料修改</li>
		<li><b>管理者專區</b></li>
		<li><a href="index.php" style="color:#FF99FF">回首頁</a></li>
	</ul>
</div>
<div id="CONTENT">
	<p>
		<h2>管理者專區<br/></h2>
		<br/>
		<br/>
		<center>
		<?php
			
			if($button === "新增"){　//當按鈕是新增時,會出現空的表格,供管理者填
		?>
				<form name="form" method="post" action="admin_member_done.php">
					<p>
					帳號：<input type="text" name="account" /> <br>
					密碼：</h1><input type="text" name="pw" /> <br>
					使用者姓名：</h1><input type="text" name="username" /> <br>
					Email：</h1><input type="text" name="email" /> <br>
					城市：</h1><input type="text" name="country" /> <br>
					年齡：</h1><input type="text" name="age" /> <br>
					</p>
					<input type="submit" name="button" value="新增" />
					<p>
					</p>
				</form>
		<?php
			}
			else if($button === "修改"){
				$sql = "SELECT * FROM member WHERE account='$account'";//列出使用者相關資料
				$result = mysql_query($sql);
											
				if (!$result) { // add this check.
					die('Invalid query: ' . mysql_error()); 
				}
				else{
				$row = mysql_fetch_array(mysql_query($sql)); //取出資料
		?>
					<form name="form" method="post" action="admin_member_done.php"> <!--以表格形式列出-->
						<p>
						帳號：<input type="text" name="account" value="<?php echo $row['account']; ?>" /> <br>
						密碼：</h1><input type="text" name="pw" value="<?php echo $row['password']; ?>"/> <br>
						使用者姓名：</h1><input type="text" name="username" value="<?php echo $row['username']; ?>" /> <br>
						Email：</h1><input type="text" name="email" value="<?php echo $row['email']; ?>" /> <br>
						城市：</h1><input type="text" name="country" value="<?php echo $row['country']; ?>" /> <br>
						年齡：</h1><input type="text" name="age" value="<?php echo $row['age']; ?>" /> <br>
						</p>
						<input type="submit" name="button" value="修改" />
						<p>
						</p>
					</form>
		<?php
				}
			}
			else if($button === "刪除"){ //刪除資料的動作
				$sql = "DELETE FROM member WHERE account='$account'"; //刪除選擇的帳戶相關資料
				$result = mysql_query($sql);
											
				if (!$result) { // add this check.
					die('Invalid query: ' . mysql_error());
				}
				else{
					echo "<h3>資料已刪除.....</h3>";
				}
			}
		?>
		</center>
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
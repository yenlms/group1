<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
include("mysql_connect.php"); //載入mysql_connect.php的資料：id,pw
$id = $_POST['id'];
$pw = $_POST['pw'];

$sql = "SELECT * FROM admin where account='$id' and password='$pw'";  //資料從admin資料表取出
$row = mysql_fetch_row(mysql_query($sql));
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
		<li><a href="reading.php">開始閱讀</a></li>
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
		<h2>管理者專區<br/></h2> <!--可以看到所有使用者的資料-->
		<br/>
		<br/>
		<center>
		<?php
			if (!$row) { // add this check.
				echo "<h3>帳號或密碼錯誤，請重新輸入</h3>";
        		echo '<meta http-equiv=REFRESH CONTENT=2;url=manager_login.php>';
			}
			else {
				/* reading */
				$sql = "SELECT * FROM reading";  //取出reading資料
				$result = mysql_query($sql);//傳送資料庫中的資料
											
				if (!$result) { // add this check.
					die('Invalid query: ' . mysql_error());//資料庫有問題
				}
				
				echo "<form name='readingform' method='post' action='admin_reading_edit.php'>";//建立表格呈現//以table形式列出reading資料
												
				echo "<table width=800 border=1>";
				echo "<tr align=center>閱讀資料清單</tr>";
				echo "<tr align=center><td>選取</td><td>編號</td><td>類型</td><td>資料名</td></tr>";
					
				while($row = mysql_fetch_array($result)){//取出資料庫中的資料
					
					echo "<tr align=center><td><input name='select' type='radio' value=".$row['serial']." checked ></td>";
					echo "<td>".$row['serial']."</td>";
					echo "<td>".$row['type']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "</tr>";
				}
				echo "</table>";							
				echo "<input type='submit' name='button' value='新增' />";//可進行使用的按鈕
				echo "<input type='submit' name='button' value='修改' />";
				echo "<input type='submit' name='button' value='刪除' />";
				echo "</form>";
				
				/* member */echo "<br/>";
				$sql = "SELECT * FROM member";//取出member資料
				$result = mysql_query($sql);//傳送資料庫中的資料
											
				if (!$result) { // add this check.
					die('Invalid query: ' . mysql_error());//資料庫有問題
				}
				
				echo "<form name='memberform' method='post' action='admin_member_edit.php'>"; //建立表格呈現//以table形式列出member資料
												
				echo "<table width=800 border=1>";
				echo "<tr align=center>使用者清單</tr>";
				echo "<tr align=center><td>選取</td><td>帳號</td><td>密碼</td><td>使用者姓名</td><td>Email</td><td>城市</td><td>年齡</td></tr>";
					
				while($row = mysql_fetch_array($result)){//取出資料庫中的資料
					
					echo "<tr align=center><td><input name='select1' type='radio' value=".$row['account']." checked ></td>";
					echo "<td>".$row['account']."</td>";
					echo "<td>".$row['password']."</td>";
					echo "<td>".$row['username']."</td>";
					echo "<td>".$row['email']."</td>";
					echo "<td>".$row['country']."</td>";
					echo "<td>".$row['age']."</td>";
					echo "</tr>";
				}
				echo "</table>";
				echo "<input type='submit' name='button1' value='新增' />"; //可進行使用的按鈕
				echo "<input type='submit' name='button1' value='修改' />";
				echo "<input type='submit' name='button1' value='刪除' />";
				echo "</form>";
				
				/* record */echo "<br/><br/>";//取出record資料
				$sql = "SELECT * FROM record";//傳送資料庫中的資料
				$result = mysql_query($sql);
											
				if (!$result) { // add this check.
					die('Invalid query: ' . mysql_error());//資料庫有問題
				}
				
				echo "<form name='recordform' method='post' action='admin_record_edit.php'>";//建立表格呈現//以table形式列出record資料
												
				echo "<table width=800 border=1>";
				echo "<tr align=center>閱讀紀錄清單</tr>";
				echo "<tr align=center><td>選取</td><td>編號</td><td>帳號</td><td>時間</td><td>評論</td></tr>";
					
				while($row = mysql_fetch_array($result)){
					
					echo "<tr align=center><td><input name='select2' type='radio' value=".$row['serial']."+".$row['account']." checked ></td>";
					echo "<td>".$row['serial']."</td>";
					echo "<td>".$row['account']."</td>";
					echo "<td>".$row['time']."</td>";
					echo "<td>".$row['comments']."</td>";
					echo "</tr>";
				}
				echo "</table>";
				echo "<input type='submit' name='button2' value='新增' />";//可進行使用的按鈕
				echo "<input type='submit' name='button2' value='修改' />";
				echo "<input type='submit' name='button2' value='刪除' />";
				echo "</form>";
				
			}
		?>
		</center>
		<br/>
		<br/>
	</p>
</div>
<div id="FOOTER">	
	<p>
		<br/><br/><br/>
		<h2><center><br/>Author by <i>Yi-Chan Kao</i> & <i>Kung-Si Cheng</i> </center></h2>
	</p>
</div>
</body>
</html>



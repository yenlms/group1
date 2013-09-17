

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
include("mysql_connect.php");   //放進mysql_connect網頁的內容
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
		<li><b>檔案上傳</b></li>
		<li><a href="message.php">留言板</a></li>
		<li><a href="record.php">歷史紀錄</a></li>
		<li><a href="login.php">會員資料修改</a></li>
		<li><a href="manager_login.php">管理者專區</a></li>
		<li><a href="index.php" style="color:#FF99FF">回首頁</a></li>
	</ul>
</div>
<div id="CONTENT"> <!-- 點入開始閱讀之後出現的畫面-->
	<p>
		<center>
		    <p align="center"><img src="design/uploadtitle.jpg"></p>
    <?php
      //指定儲存檔案的目錄
      $upload_dir =  "./upload files/";
			
      for ($i = 0; $i <= 3; $i++)
      {		
        //若檔案名稱不是空字串，表示上傳成功，將暫存檔案移至指定之目錄。
        if ($_FILES["myfile"]["name"][$i] != "")
        {
          //搬移檔案
          $upload_file = $upload_dir . iconv("UTF-8", "Big5", $_FILES["myfile"]["name"][$i]);
          move_uploaded_file($_FILES["myfile"]["tmp_name"][$i], $upload_file);
					
          //顯示檔案資訊		
          echo "檔案名稱：" . $_FILES["myfile"]["name"][$i] . "<br>";	
          echo "暫存檔名：" . $_FILES["myfile"]["tmp_name"][$i] . "<br>";
          echo "檔案大小：" . $_FILES["myfile"]["size"][$i] . "<br>";
          echo "檔案種類：" . $_FILES["myfile"]["type"][$i] . "<br>";						
          echo "<hr>"; 
        }
		  
          /*else
        {
          echo "檔案上傳失敗 (" . $_FILES["myfile"]["error"] . ")<br><br>";
          echo "<a href='javascript:history.back()'>重新上傳</a>";
        }*/
      } 
	  echo "<p><a href='JavaScript:history.back()'>繼續上傳</a></p>";
    ?>
		
	</p>
</div>
<div id="FOOTER">	
	<p>
		<br/><br/><br/><br/><br/><br/>
		<h2><center><br/>Author by <i>Yi-Chan Kao</i> & <i>Kung-Si Cheng</i> </center></h2>
	</p>
</div>
</body>
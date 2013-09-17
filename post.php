<?php
  require_once("dbtools.inc.php");
	
  $author = $_POST["author"];
  $subject = $_POST["subject"];
  $content = $_POST["content"];
  $current_time = date("Y-m-d H:i:s");

  //建立資料連接
  $link = create_connection();

  //執行 SQL 命令
  $sql = "INSERT INTO message(author, subject, content, date)
          VALUES('$author', '$subject', '$content', '$current_time')";
  $result = execute_sql("LMS", $sql, $link);

  //關閉資料連接
  mysql_close($link);

  //將網頁重新導向到 index.php
  header("location:message.php");
  exit();
?>
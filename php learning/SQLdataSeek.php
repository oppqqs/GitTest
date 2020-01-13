<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
</head>
<body>
<?php
 include("mysql.inc.php");
//查詢【books】資料表的所有欄位的資料
$result=mysqli_query($conn, "SELECT * FROM books");
//使用 mysqli_data_seek() 指向第 3 筆記錄
mysqli_data_seek($result, 2);
$row=mysqli_fetch_array($result);
 echo "<br> $row[0]->$row[1]->$row[2]->$row[3]";
?>
</body>
</html>
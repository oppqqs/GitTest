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
//使用 mysqli_num_rows() 取得查詢結果的筆數，並儲存於 $count
$count=mysqli_num_rows($result);
 echo "共查詢到 $count 筆記錄";
?>
</body>
</html>
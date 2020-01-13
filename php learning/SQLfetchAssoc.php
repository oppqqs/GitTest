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
//使用 mysqli_fetch_assoc() 逐次讀取每一筆記錄, 然後將回傳的陣列設定為 $row 陣列
//使用 while 迴圈判斷是否結束讀取
while( $row=mysqli_fetch_assoc($result) ){ //若到達記錄的底部，回傳 FALSE 值，結束迴圈
 echo "<br>". $row["書籍編號"] ."-> ".$row["書籍名稱"] ."-> ".$row["價格"] ."-> "
.$row["負責員工編號"];
//使用 . 連結字串
}
?>
</body>
</html> 
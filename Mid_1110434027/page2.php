<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
  include("mysql.inc.php");
  $result = mysqli_query($conn,"SELECT * FROM products WHERE pId = 3");
  $totalrow = mysqli_num_rows($result);
  $row = mysqli_fetch_array($result);
  echo "共查詢到".$totalrow."筆記錄"."<hr>";
  
?>
產品名稱：<?php echo $row['pName'];?><br>
產品價錢：<?php echo $row['pPrice'];?><br>
產品圖片：<br>
<?php echo "<img src='images/". $row['pImages'] ."'>";?>
</body>
</html>

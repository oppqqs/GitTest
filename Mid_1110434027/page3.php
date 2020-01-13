<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
  include("mysql.inc.php");
  //查詢【products】資料表的所有欄位的資料
  $result=mysqli_query($conn, "SELECT * FROM products order by pPrice");
  $totalrow = mysqli_num_rows($result);
  echo "共查詢到".$totalrow."筆記錄"."<hr>";
  mysqli_data_seek($result,4);
  $row = mysqli_fetch_array($result);

?>
產品編號：<?php echo $row['pId'];?><br>
產品名稱：<?php echo $row['pName'];?><br>
產品價錢：<?php echo $row['pPrice'];?><br>
產品圖片：<br>
<?php echo "<img src='images/". $row['pImages'] ."'>";?>

</body>
</html>

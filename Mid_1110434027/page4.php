<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
  include("mysql.inc.php");
  //查詢【products】資料表的所有欄位的資料
  $result=mysqli_query($conn, "SELECT * FROM products order by pId");
  $totalrow = mysqli_num_rows($result);
  echo "共查詢到".$totalrow."筆記錄"."<hr>";
  echo "產品清單";
  echo "<table border='1'>";
  echo "<tr>
          <th>產品資料</th>
          <th>產品圖片</th>
          <th>產品描述</th>
        </tr>";
  while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>產品編號：".$row['pId']."<br>
                產品名稱：".$row['pName']."<br>
                產品價錢：".$row['pPrice']."<br></td>";
      echo "<td>"."<img src='images/". $row['pImages'] ."'>"."</td>";
      echo "<td>".$row['pDescription']."</td>";
      echo "</tr>";
  }
  echo "</table>";
?>
</body>
</html>

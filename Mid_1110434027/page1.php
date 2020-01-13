<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
  include("mysql.inc.php");
  $result = mysqli_query  ($conn,"SELECT * FROM products");
  $totalrow = mysqli_num_rows($result);
  echo "共查詢到".$totalrow."筆記錄"."<hr>";
  while($row = mysqli_fetch_row($result)){
    $u=0;
    $i=0;
    foreach($row as $item){
      if($i!=1){
        echo $u . "=" . $item . "<br>";
        $u++;
      }
      $i++;
    }
    echo "<hr>";
  }

?>
</body>
</html>

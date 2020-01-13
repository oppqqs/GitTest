<?php
include("mysql.inc.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>產品搜尋</title>
</head>
<body>
<?php
  $sql_cg = "SELECT DISTINCT pCategory FROM products ORDER BY pCategory";
  $list_cg = mysqli_query($conn,$sql_cg);
?>


<div>
  <h1>新增產品</h1><br>

  <!-- 表單 -->
  <form method="post" action="page6.php" name="addmessage">
  產品名稱：<input name="name"><br><br>
  產品價格：<input name="price"><br><br>
  產品類別：<select name="category">
            <?php
              echo "<option value='' selected>請選擇</option>\n";
              while($ct_result = mysqli_fetch_array($list_cg)){
                $str_cg = (string)$ct_result['pCategory'];
                echo '<option value="'.$str_cg.'" selected>'.$str_cg.'</option>\n';
              }
            ?>
           </select><br><br>
  產品圖片：<input name="images"><br><br>
  產品描述：<br>
  <textarea cols="35" rows="7" name="description"></textarea><br><br>
  <input name="submit" type="submit" value="送出">&nbsp;
  <input type="reset" type="reset" value="清除">
  </form>
</div>

</body>
</html>


<?php
  include("mysql.inc.php");
  $myTable='products';  // 設定本程式所使用的資料表
  $errMsg='';            // 存放錯誤訊息的變數
  $name ='';             // 存放產品名稱的變數 
  $price = 0;            // 存放產品價格的變數
  $catgory ='';        // 存放產品類別的變數
  $image = '';
  $message ='';          // 存放產品描述的變數
  
  if(!empty($_POST['name']) && !empty($_POST['category'])){
    $name = $_POST['name'];
    $price = $_POST['price']; 
    $catgory = $_POST['category']; 
    $image = $_POST['images'];
    $message = $_POST['description']; 
  }else{
    $errMsg="您忘記輸入產品名稱或類別";
  }


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>新增產品</title>
</head>

<body>
<div>
  <h1>新增產品</h1>
  <?php
    if($errMsg!=''){
      echo "您忘記輸入產品名稱或類別<br>";
      echo "請按瀏覽器上一頁鈕重新輸入<br>";
      }
      else{
        $sql = 'INSERT '.$myTable.'(pCategory,pName,pPrice,pImages,pDescription) VALUES("'.$catgory.'","'.$name.'","'.$price.'","'.$image.'","'.$message.'")';
        echo $sql."<br>";
        $result=mysqli_query($conn, $sql);
        if(mysqli_affected_rows($conn)>0)
          echo "已成功新增一筆留言<br>";
        else
          echo "無法新增留言";
      }
  ?>


</div>
</body>
</html>

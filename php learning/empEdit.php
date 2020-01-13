<?php
    include("mysql.inc.php");
    //如果以 GET 方式傳遞過來的 edit 參數不是空字串
    if (!empty($_GET['edit'])){
        //查詢 edit 參數所指定編號的記錄, 從資料庫將原有的資料取出
        $sql="SELECT * FROM employee WHERE 員工編號 = '{$_GET['edit']}' ";
        $result=mysqli_query($conn, $sql);
        //將查詢到的資料放在 $row 陣列
        $row=mysqli_fetch_array($result);
    }
    else {
        //如果沒有 edit 參數, 表示此為錯誤執行, 所以轉向回主頁面
        header("Location:empList.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>員工資料管理系統</title>
</head>
<body>
    <!--定義一個編輯資料的表單, 並且將編輯好的資料傳遞給 empUpdate.php 進行處理 -->
    <form method="post" action="empUpdate.php">
        姓名: <?php echo $row['姓名'];?>
        性別: <?php echo $row['性別'];?>
        <!--將原本的資料設定於<input>標籤的 value 參數, 如此【數量】欄位內就會自動填上原本的資料 -->
        電話: <input name="phone" value="<?php echo $row['電話'];?>">
        主管編號: <input name="bossnum" value="<?php echo $row['主管編號'];?>" style="width: 73px">
        <!--將編號設定於隱藏的 <input> 標籤, 以便將編號數字傳遞給 empUpdate.php -->
        <input name="id" type="hidden" value="<?php echo $row['員工編號'];?>">
        <input name="submit" type="submit" value="送出">
    </form>
    <p><a href="empList.php">回系統首頁</a></p>
</body>
</html>
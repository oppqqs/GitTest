<?php
    include("mysql.inc.php");
    //如果網頁表單的 name 與 qty 欄位都不是空字串
    if (!empty( $_POST['name'] ) && !empty( $_POST['sex'] ) && !empty( $_POST['phone'] ) && !empty( $_POST['bossnum'] ) ){
        //將 name 與 qty 欄位值新增至 【inventory】 資料表
        $sql = "INSERT employee(性別,姓名,電話,主管編號) VALUES('{$_POST['sex']}','{$_POST['name']}','{$_POST['phone']}','{$_POST['bossnum']}')";
        mysqli_query($conn, $sql);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>員工資料管理系統</title>
</head>
<body>
    <!--建立一個新增書籍的表單 -->
    <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
        姓名: <input name="name">
        性別: <input name="sex" style="width: 73px">
        電話: <input name="phone">
        主管編號: <input name="bossnum" style="width: 73px">
        <input name="submit" type="submit" value="新增">
    </form>
    <?php
        //使用【書籍名稱】排序, 查詢 【inventory】 資料表的所有資料
        $sql= "SELECT * FROM employee";
        $result=mysqli_query($conn, $sql);
        //如果查到的記錄筆數大於 0, 便使用迴圈顯示所有資料
        if ( mysqli_num_rows($result) >0 ){
            echo "<hr><table border='1'>
                  <tr><th>姓名</th>
                      <th>性別</th>
                      <th>電話</th>
                      <th>主管編號</th></tr>";
            while ( $row = mysqli_fetch_array($result) ) {
                echo "<tr><td>{$row['姓名']}</td>
                          <td>{$row['性別']}</td>
                          <td>{$row['電話']}</td>
                          <td>{$row['主管編號']}</td>
                          <td><a href='empDel.php?del={$row['員工編號']}'>刪除</a></td>
                          <td><a href='empEdit.php?edit={$row['員工編號']}'>編輯</a></td></tr>";
            }
            echo '</table>';
        }
    ?>
</body>
</html> 
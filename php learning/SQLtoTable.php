<?php
 include("mysql.inc.php");
//查詢【books】資料表的部分欄位的資料, 以及價格大於 400 的書
$result=mysqli_query($conn, "SELECT 書籍編號, 書籍名稱, 價格 FROM books WHERE 價格 > 400");
//使用表格顯示資料
echo "以下是價格大於 400 的書籍 <br />
 <table border = '1'> <tr><th>書籍編號</th><th>書籍名稱</th><th>價格</th></tr>";
//使用 mysqli_fetch_array() 逐次讀取每一筆記錄, 然後將回傳的陣列設定為 $row 陣列
//使用 while 迴圈判斷是否結束讀取
while( $row=mysqli_fetch_array($result) ){ //若到達記錄的底部，回傳 FALSE 值，結束迴圈
 echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
}
echo "</table>"
?>
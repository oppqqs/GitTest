<?php
    include("mysql.inc.php");
    //預設網頁開啟時的查詢
    $sql="SELECT * FROM inventory ORDER BY 書籍名稱 ASC";

    //若是按下 "搜尋"
    if( isset($_POST["actSrh"]) ) {
        $strSrh = ""; //暫存 SQL 語法中的 WHERE 子句
        $nowBook=""; //暫存目前要查詢的書名
        $nowQt=""; //暫存目前要查詢的數量
        //判斷使用者的查詢條件，並產生對應的 SQL 語法
        if (!empty($_POST['nameSrh']) && !empty($_POST['qtySrh'])){
            $nowBook=$_POST['nameSrh'];
            $nowQt=$_POST['qtySrh'];
            $strSrh = "WHERE 書籍名稱 Like '%".$nowBook."%' AND 數量 = ".$nowQt;
        }
        else if (!empty($_POST['nameSrh']) && empty($_POST['qtySrh'])){
            $nowBook=$_POST['nameSrh'];
            $strSrh = "WHERE 書籍名稱 Like '%".$nowBook."%'";
        }
        else if (empty($_POST['nameSrh']) && !empty($_POST['qtySrh'])){
            $nowQt=$_POST['qtySrh'];
            $strSrh = "WHERE 數量 = ".$nowQt;
        }
        else{;}
        //組合 SQL 語法
        $sql="SELECT * FROM inventory ".$strSrh." ORDER BY 書籍名稱 ASC";
        echo "</br>".$sql;
    }

    //查詢
    $result=mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>書籍存貨管理系統</title>
</head>
<body>
    <!—自資料庫取得下拉式選單的值 -->
    <?php
        //自資料庫取得 “數量” Distinct 的值
        $sql_Qt = "SELECT DISTINCT 數量 FROM inventory ORDER BY 數量";
        $list_Qt =mysqli_query($conn, $sql_Qt);
        $list_no = mysqli_num_rows($list_Qt);
        echo "<br>筆數: ".$list_no."</br>";
        echo "<hr />";
    ?>
    <!-- 表單 -->
    <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
        <table border="0">
            <tr>
                <td>書名:<input name="nameSrh"></td>
                <td>數量:<select name="qtySrh">
                <?php
                    echo "<option value='' selected>請選擇</option>\n";
                    //使用迴圈將查詢結果加入清單中
                    //當$Qt_result 不是空值時, 迴圈繼續
                    while($Qt_result = mysqli_fetch_assoc($list_Qt)){
                        $strQt = (string) $Qt_result['數量'];
                        echo "<option value=".$strQt." >$strQt</option>\n";
                    }
                ?>
                </td>
                <td>
                    <input name="actSrh" type="submit" value="搜尋">
                </td>
            </tr>
        </table>
    </form>

    <?php
        //如果查到的記錄筆數大於 0, 便使用迴圈顯示所有資料
        if (mysqli_num_rows($result) >0){
            echo "<hr /><table border='1'>
            <tr><td>書籍名稱</td><td>數量</td></tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr><td>{$row['書籍名稱']}</td>
                <td>{$row['數量']}</td>
                <td><a href='3-3-1.php?del={$row['編號']}'>
                刪除</a></td>
                <td><a href='3-3-2.php?edit={$row['編號']}'>
                編輯</a></td>
                </tr>";
            }
        echo '</table>';
        }
    ?>
</body>
</html>
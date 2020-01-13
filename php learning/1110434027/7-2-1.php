<?php
    include("mysql.inc.php");
    $myTable='guestbook'; //設定本程式所使用的資料表
    //查詢所有欄位, 並且依照編號遞減排序, 讓最新留言顯示在最前面
    $strQuery="SELECT * FROM $myTable ORDER BY 留言編號 DESC";
    //若是按下 "搜尋"
    if( isset($_POST["actSrh"]) ) {
        $strSrh = ""; //暫存 SQL 語法中的 WHERE 子句
        $str=""; //暫存目前要查詢的書名
        //判斷使用者的查詢條件，並產生對應的 SQL 語法
        if (!empty($_POST['Srh'])){
            $str=$_POST['Srh'];
            $strSrh = "WHERE 留言 Like '%".$str."%'";
        }
        else if (empty($_POST['Srh'])){
            echo "<script>alert('請輸入要查詢的關鍵字'); history.go(-1);</script>";
        }
        else{;}
        //組合 SQL 語法
        $strQuery="SELECT * FROM $myTable ".$strSrh." ORDER BY 留言編號 DESC";
        // echo "</br>".$strQuery;
    }
    $result=mysqli_query($conn, $strQuery);
    $numRows = mysqli_num_rows($result); //取得留言的總筆數
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>簡易留言板</title>
    <link href="7-2.css" rel="stylesheet" type="text/css"><!--套用 CSS-->
    
</head>
<body>
    <div id="wrapper">
        <div id="title">
        <h1>簡易留言板</h1>
        </div>
        <div id="maintext">
            <?php echo "共有 $numRows 筆留言 "; ?>
                <div id="navigation"><a href="7-2-2.html">我要留言</a></div>
                <!-- 表單 -->
                <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
                    <table border="0">
                        <tr>
                            <td>關鍵字:<input name="Srh"></td>
                            <td>
                                <input name="actSrh" type="submit" value="搜尋">&nbsp;
                                <input name="reset." type="reset" value="清除">
                            </td>
                        </tr>
                    </table>
                </form>
                <?php
                    //如果留言筆數大於 0, 便顯示留言的內容
                    if ($numRows>0) {
                        echo '<ul>';
                        $i=1;
                        while ( $row = mysqli_fetch_array($result) ) {
                            //將姓名中的特殊字元轉成 HTML 碼
                            $name=htmlspecialchars($row['姓名'], ENT_QUOTES);
                            //將留言中的特殊字元、換行字元、與空白轉成 HTML 碼
                            $message=htmlspecialchars($row['留言'], ENT_QUOTES);
                            $message=str_replace(' ', '&nbsp;&nbsp;', nl2br($message));

                            //顯示不同的背景顏色, 方便閱讀
                            if ($i%2==0) { $liclass='even'; }
                            else { $liclass='odd'; }
                            //顯示留言者姓名、留言日期時間、與留言內容
                            echo "<li class=\"$liclass\"><p><strong>$name</strong>
                            <em>於 {$row['日期時間']}留言</em></p>
                            <p>$message</p></li>";
                            $i++;
                        } //end while
                        echo '</ul>';
                    } //end if
                ?>
        </div>
    </div>
    
</body>
</html>
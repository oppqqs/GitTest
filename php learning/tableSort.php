<?php
    include("mysql.inc.php");
    $perpage=7; // 每頁顯示 7 筆
    $sql="SELECT count(書籍編號) FROM books";
    $result=mysqli_query($conn, $sql);
    //取得查詢結果的筆數
    $totalrow=mysqli_fetch_array($result)[0];
    $totalpage=ceil($totalrow/$perpage); // 計算總頁數
    // 根據 $_GET['page'] 參數值決定從第幾頁開始顯示
    // 代表頁次的變數 $page 由 1 起算
    if(empty($_GET['page']) || !is_numeric($_GET['page'])
        || $_GET['page']<1 || $_GET['page']>$totalpage )
        $page=1;
    else
        $page=$_GET['page'];
    // 根據 $_GET['order'] 參數值決定排序方式
    if(empty($_GET['order']) || !is_numeric($_GET['order']) || $_GET['order']<1 || $_GET['order']>2 ) {
        $field='書籍編號'; // SQL 查詢時的排序參數
        $order=0; // 建立頁次連結時使用的參數
    }
    else if($_GET['order']==1) {
        $field='書籍名稱';
        $order=1;
    }
    else if($_GET['order']==2) {
        $field='價格';
        $order=2;
    }
    // 設定查詢 LIMIT 子句的第 1 個參數
    $start=($page-1)*$perpage;
    //查詢【books】資料表的記錄
    $sql = "SELECT 書籍編號,書籍名稱,價格 FROM books ORDER BY $field ".
    "LIMIT $start, $perpage";
    echo '<br>'; echo $sql;
    $result=mysqli_query($conn, $sql);
    //取得查詢結果
    while($row=mysqli_fetch_array($result))
        $data[]=$row;
?>
<!DOCTYPE html>
<html>
<head>
    <title>分頁與排序</title>
    <meta charset="UTF-8">
    <style>
        p { text-align: center;}
        table {
        margin-left:auto;
        margin-right:auto;
        border:1px solid black;
        width:450px;
        text-align:center
        }
        .grey {background-color:lightgrey}
        #h1,#h3 {width:20%}
    </style>
</head>
<body>
    <p>目前資料筆數：<?php echo $totalrow;?> </p>
    <table>
    <tr>
    <th id="h1"><a href="<?php $_SERVER['PHP_SELF']?>?order=0">書籍編號</a></th>
    <th><a href="<?php $_SERVER['PHP_SELF']?>?order=1">書籍名稱</a></th>
    <th id="h3"><a href="<?php $_SERVER['PHP_SELF']?>?order=2">價格</a></th></tr>
    <?php
    // 用迴圈輸出目前頁次的資料
    for($i=0;$i<$perpage;$i++){
        if($i%2==0) 
            echo '<tr class="grey">'; // 雙數行加灰底
        else echo '<tr>';
            echo "<td>{$data[$i]['書籍編號']}</td>";
            echo "<td>{$data[$i]['書籍名稱']}</td>";
            echo "<td>{$data[$i]['價格']}</td>";
            echo '</tr>';
    }
    echo '</table>';
    // 輸出直接跳頁的連線
    echo '<p>';
    for($i=1;$i<=$totalpage;$i++){
        if($i!=1) echo "&nbsp;";
        if($i==$page) echo $i;
    else
        echo sprintf("<a href='%s?page=%d&order=%d'>%d</a>", $_SERVER['PHP_SELF'], $i , $order, $i);
    }
    echo '</p>';
    ?>
</body>
</html> 
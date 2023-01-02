<?php
//DB接続
include("db_connect.php");

//DBから商品データ呼び出し
$category = $_GET['category'];
if($category == "リスト"){
    $sql = "SELECT * FROM goods";
}else{
    $sql = "SELECT * FROM goods WHERE category = '$category'";
}
$result_rows = $pdo->query($sql);
//データ出力
foreach ( $result_rows as $row ):
    echo "カテゴリー: {$row['category']} <br>";
    echo "商品名: {$row['goods_name']} <br>";
    echo "金額: {$row['price']} <br>";
    ?>
    <div>
    <form method="post" action="index.php?page_select=page_cart">
        <input type="hidden" name="goods_id" value="<?= "{$row['goods_id']}" ?>">
        <div>数量 <input type="number" name="num" value="1" min="1"></div>
        <div><input type="submit" value="カートに入れる"></div>
    </form>
    <br>
    </div>    
<?php endforeach; ?>
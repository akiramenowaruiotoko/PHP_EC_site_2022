<div><a href="index.php" class="h3">買い物を続ける</a></div>
<?php
//DB接続
include("db_connect.php");

echo "<h2>全リスト取得</h2>";
$result_list = $pdo->query('SELECT * FROM goods');
?>

<?php
foreach ( $result_list as $row ):
    echo "goods_id: {$row['goods_id']} <br>" ;
    echo "カテゴリー: {$row['category']} <br>";
    echo "商品名: {$row['goods_name']} <br>" ;
    echo "金額: {$row['price']} <br>" ;
endforeach;
?>
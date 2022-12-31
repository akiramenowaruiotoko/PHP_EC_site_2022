<?php
//DB接続
include("db_connect.php");

echo "<h2>全リスト取得</h2>";
$result_list = $pdo->query('SELECT * FROM goods');
?>

<form action="index.php?page_select=page_cart" class="mt-3" method="post">
    <?php
    foreach ( $result_list as $row ):
        echo "goods_id: {$row['goods_id']} <br>";
        echo "カテゴリー: {$row['category']} <br>";
        echo "商品名: {$row['goods_name']} <br>";
        echo "金額: {$row['price']} <br>";
        echo "<input type='number' name='num' min='0' value='0'> <br>";
    endforeach;
    ?>
    <button type="submit" class="btn btn-primary">カゴに入れる</button>
</form>
?>
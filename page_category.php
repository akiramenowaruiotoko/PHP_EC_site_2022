<?php
//DB接続
include("db_connect.php");

// カテゴリー別呼び出し
$category = $_GET['category'];
$sql = "SELECT * FROM goods WHERE category = '$category'";
$result_rows = $pdo->query($sql);
?>


<h2>個別データ取得</h2>

<?php foreach ( $result_rows as $row ): ?>

    <?= "goods_id: {$row['goods_id']} <br>" ?>
    <?= "カテゴリー: {$row['category']} <br>"?>
    <?= "商品名: {$row['goods_name']} <br>" ?>
    <?= "金額: {$row['price']} <br" ?>

    <div >
    <form method="post" action="index.php?page_select=page_cart">
        <input type="hidden" name="goods_id" value="<?= "{$row['goods_id']}" ?>">
        <div>num <input type="number" name="num" value="1" min="1"></div>
        <div><input type="submit" value="カートに入れる"></div>
    </form>
    <br>
    </div>
    
<?php endforeach; ?>
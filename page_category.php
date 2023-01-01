<?php
//DB接続
include("db_connect.php");

// カテゴリー別呼び出し
$category = "カード";
$sql = "SELECT * FROM goods WHERE category = '$category'";
$result_rows = $pdo->query($sql);

//$goods = [];
?>



<h2>個別データ取得</h2>

<?php foreach ( $result_rows as $row ): ?>

    <?= "goods_id: {$row['goods_id']} <br>" ?>
    <?= "カテゴリー: {$row['category']} <br>"; ?>
    <?= "商品名: {$row['goods_name']} <br>" ?>
    <?= "金額: {$row['price']} <br" ?>

    <div >
    <form method="post" action="index.php?page_select=page_cart">
        <div>goods_id <input type="text" name="goods_id" value="<?= "{$row['goods_id']}" ?>"></div>
        <div>num <input type="text" name="num" value="0"></div>
        <div><input type="submit" name="submit" value="登録"></div>
    </form>
    <br>
    </div>
    
<?php endforeach; ?>
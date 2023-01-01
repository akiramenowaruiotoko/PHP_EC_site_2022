<div><a href="index.php" class="h3">買い物を続ける</a></div>
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

    <?= "<br><br><br>" ?>
    <?php  print_r($row);?>
    <?= "<br><br><br>" ?>
    
<?php endforeach; ?>
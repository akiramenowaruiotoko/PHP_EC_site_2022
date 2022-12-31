<div><a href="index.php" class="h3">買い物を続ける</a></div>
<h1>登録データ情報</h1>
<?php
    //データベース名、ユーザー名、パスワード
    $dsn = 'mysql:dbname=php_ec_site_2022;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'root';

    //MySQLのデータベースに接続
    $pdo = new PDO($dsn, $user, $password);


// テーブル個別goods_id 3 で呼び出す場合
$goods_id = 3;
$sql = "SELECT * FROM goods WHERE goods_id IN(".$goods_id.")";
$result_rows = $pdo->query($sql);

// テーブル全行取得（データ取得）
$result_list = $pdo->query('SELECT * FROM goods');
?>

<h2>全リスト取得</h2>
<?php foreach ( $result_list as $row ): ?>

    <?= "goods_id: {$row['goods_id']} <br>" ?>
    <?= "商品名: {$row['goods_name']} <br>" ?>
    <?= "カテゴリー: {$row['category']} <br>"; ?>
    <?= "金額: {$row['price']} <br>" ?>

<?php endforeach; ?>


<h2>個別データ取得</h2>
<?php foreach ( $result_rows as $row ): ?>

    <?= "goods_id: {$row['goods_id']} <br>" ?>
    <?= "商品名: {$row['goods_name']} <br>" ?>
    <?= "カテゴリー: {$row['category']} <br>"; ?>
    <?= "金額: {$row['price']} <br>" ?>

<?php endforeach; ?>
<?php
// INSERT文を変数に格納
try {
    //データベース名、ユーザー名、パスワード
    $dsn = 'mysql:dbname=php_ec_site_2022;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'root';

    //MySQLのデータベースに接続
    $pdo = new PDO($dsn, $user, $password);
    //PDOのエラーレポートを表示
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //index.phpの値を取得
    $category = $_POST['category'];
    $goods_name = $_POST['goods_name'];
    $price = $_POST['price'];

    // INSERT文を変数に格納
    $sql = "INSERT INTO history (goods_name, category, price) VALUES (:goods_name, :category, :price)";
    //挿入する値は空のまま、SQL実行の準備をする
    $stmt = $pdo->prepare($sql);
    // 挿入する値を配列に格納する
    $params = array(':goods_name' => $goods_name, ':category' => $category, ':price' => $price);
    //挿入する値が入った変数をexecuteにセットしてSQLを実行
    $stmt->execute($params);

    echo "お名前: ".$goods_name."<br>";
    echo "カテゴリー: ".$category."<br>";
    echo "説明文: ".$price."<br>";
    echo "で登録しました";
} catch (PDOException $e) {
    exit('データベースに接続できませんでした。' . $e->getMessage());
}

?>
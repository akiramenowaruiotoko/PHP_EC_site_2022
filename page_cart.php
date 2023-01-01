<div> cart_page</div>
<div>
    <h1>cart</h1>
</div>

<?php


try {
    //DB接続
    include("db_connect.php");

    //index.phpの値を取得
    $goods_id = $_POST['goods_id'];
    $num = $_POST['num'];

    // INSERT文を変数に格納
    $sql = "INSERT INTO cart (goods_id, num) VALUES (:goods_id, :num)";
    //挿入する値は空のまま、SQL実行の準備をする
    $stmt = $pdo->prepare($sql);
    // 挿入する値を配列に格納する
    $params = array(':goods_id' => $goods_id, ':num' => $num);
    //挿入する値が入った変数をexecuteにセットしてSQLを実行
    $stmt->execute($params);

    echo "goods_id: ".$goods_id."<br>";
    echo "num: ".$num."<br>";
    echo "で登録しました";
} catch (PDOException $e) {
    exit('データベースに接続できませんでした。' . $e->getMessage());
}

?>
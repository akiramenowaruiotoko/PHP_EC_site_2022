<div> history_page</div>
<div>
    <h1>history</h1>
</div>
<?php
if(!isset($_SESSION)){
    session_start();
}

//購入ボタンを押したか確認
if(!empty($_POST['purchase'])){
    echo "<p>ご購入ありがとうございました。</p>";
    $array = $_SESSION['array'];
    //セッション解放
    $_SESSION = array();
}
    print_r($array);

/*
//DB接続
include("db_connect.php");

//DBヒストリーテーブルにカートデータを登録
try {
    //page_cart.phpの値を取得
    $goods_id = $_POST['history'];
    $num = $_POST['num'];
    // INSERT文を変数に格納
    $sql = "INSERT INTO cart (goods_id, num) VALUES (:goods_id, :num)";
    //挿入する値は空のまま、SQL実行の準備
    $stmt = $pdo->prepare($sql);
    // 挿入する値を配列に格納
    $params = array(':goods_id' => $goods_id, ':num' => $num);
    //挿入する値が入った変数をexecuteにセットしてSQL実行
    $stmt->execute($params);
    //実行結果を出力
    echo "goods_id: ".$goods_id."<br>";
    echo "num: ".$num."<br>";
    echo "で登録しました";
} catch (PDOException $e) {
    exit('データベースに接続できませんでした。' . $e->getMessage());
}


//DBカートテーブルを削除する
if(!empty($array)){
    try {
        // DELETE文を変数に格納
        $sql = "DELETE FROM cart";
        //削除する値は空のまま、SQL実行の準備
        $stmt = $pdo->prepare($sql);
        //executeにセットしてSQLを実行
        $stmt->execute();
        echo "カートを削除しました";
    } catch (PDOException $e) {
        exit('データベースに接続できませんでした。' . $e->getMessage());
    }
    //配列リセット
    $array = [];
}
*/
?>
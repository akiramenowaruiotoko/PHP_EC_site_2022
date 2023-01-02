<h1>history</h1>
<?php
//セッションスタートしていたければスタート
if(!isset($_SESSION)){
    session_start();
}
//DB接続
include("db_connect.php");
//購入ボタンを押したか確認
if(!empty($_POST['purchase'])){
    echo "<p>ご購入ありがとうございました。</p>";
    $array = $_SESSION['array'];
    //セッション解放
    $_SESSION = array();
    //DBヒストリーテーブルにカートデータを登録
    foreach($array as $row):
        try {
            //page_cart.phpの値を取得
            $goods_id = $row['goods_id'];
            $num = $row['num'];
            // INSERT文を変数に格納
            $sql = "INSERT INTO history (goods_id, num) VALUES (:goods_id, :num)";
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
    endforeach;
    //DBカートテーブルを削除する
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
echo "<h2>全リスト取得</h2>";
//DBヒストリーテーブルのデータ呼び出し
$result_list = $pdo->query('SELECT * FROM history');
foreach ( $result_list as $row ):
    echo $row['history_date'];
    echo "<br>";
    echo $row['goods_id'];
    echo "<br>";
    echo $row['num'];
    echo "<br>";
    echo "<br>";
endforeach;
?>
<!-- 履歴削除 -->
<br>
<br>
<form method="post" action="index.php?page_select=page_history">
    <input type="hidden" name="history" value="1">
    <div><input type="submit" value="履歴削除"></div>
</form>
<?php
//DBヒストリーテーブルを削除する
if(!empty($_POST['history'])){
    try {
        // DELETE文を変数に格納
        $sql = "DELETE FROM history";
        //削除する値は空のまま、SQL実行の準備
        $stmt = $pdo->prepare($sql);
        //executeにセットしてSQLを実行
        $stmt->execute();
        echo "履歴を削除しました";
    } catch (PDOException $e) {
        exit('データベースに接続できませんでした。' . $e->getMessage());
    }
}
?>
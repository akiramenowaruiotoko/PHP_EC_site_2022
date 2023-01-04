<div style="padding: 25px; margin-bottom: 50px">
<?php
//セッションスタートしていたければスタート
if(!isset($_SESSION)){
    session_start();
}
//DB接続
include("db_connect.php");
//購入ボタンを押したか確認&cartデータがあるか確認
if(!empty($_POST['purchase']) && !empty($_SESSION['array'])){
    echo "<h1>ご購入ありがとうございました!!</h1>";
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
    } catch (PDOException $e) {
        exit('データベースに接続できませんでした。' . $e->getMessage());
    }
    //配列リセット
    $array = [];
}
//削除ボタンを押したらDBヒストリーテーブルを削除する
if(!empty($_POST['history'])){
    try {
        // DELETE文を変数に格納
        $sql = "DELETE FROM history";
        //削除する値は空のまま、SQL実行の準備
        $stmt = $pdo->prepare($sql);
        //executeにセットしてSQLを実行
        $stmt->execute();
        echo "<h1>履歴を削除しました</h1>";
    } catch (PDOException $e) {
        exit('データベースに接続できませんでした。' . $e->getMessage());
    }
}
?>
<h1>history</h1>
<?php
//DBヒストリーテーブルのデータ呼び出し
$total_fee = 0;
$array = $pdo->query('SELECT * FROM history');
foreach ( $array as $goods ):
    //goods_idからgoodsデータ呼び出し
    $goods_id = $goods['goods_id'];
    $sql = "SELECT * FROM goods WHERE goods_id = '$goods_id'";
    $result_rows = $pdo->query($sql);
    foreach ( $result_rows as $row ):
    ?>
        <h5>購入日時:<?php echo $goods['history_date'];?><br></5p>
        <img src="img/<?php echo $row['img'];?>" class="card-img-top" style="height: 5rem; width: 5rem"><br>
        <p5>商品名:<?php echo $row['goods_name'];?><br></5p>
        <p5>金額:<?php echo $row['price'];?><br></5p>
        <p5>数量:<?php echo $goods['num'];?><br></5p>
        <br>
    <?php
    endforeach;
        $total_fee += $row['price'] * $goods['num'];
endforeach;
echo "<div class='h3'>合計金額： ".number_format($total_fee)."円</div>";
?>
<!-- 履歴削除 -->
<br>
<br>
<form method="post" action="index.php?page_select=page_history">
    <div><input type="submit" name="history" value="履歴削除"></div>
</form>
<br>
<div><a href="index.php?page_select=page_category&category=リスト" class="h5">商品一覧へ</a></div>
</div>
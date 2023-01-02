<div> history_page</div>
<div>
    <h1>history</h1>
</div>

<?php
$delete = $_POST['delete'];
if($delete == 1){
    //DB_cart_DELETE
    try {
        //DB接続
        include("db_connect.php");
        // DELETE文を変数に格納
        $sql = "DELETE FROM cart";
        //削除する値は空のまま、SQL実行の準備をする
        $stmt = $pdo->prepare($sql);
        //executeにセットしてSQLを実行
        $stmt->execute();
        echo "カートを削除しました";
    } catch (PDOException $e) {
        exit('データベースに接続できませんでした。' . $e->getMessage());
    }
    //変数リセット
    $delete = "";
}
?>
<?php
//DB output cart
echo "<h2>全リスト取得</h2>";
$result_list = $pdo->query('SELECT * FROM cart');
foreach ( $result_list as $row ):
    echo "goods_id: {$row['goods_id']} <br>";
    echo "数量: {$row['num']} <br>";
endforeach;
?>
<h1>cart</h1>
<?php
//セッションスタートしていたければスタート
if(!isset($_SESSION)){
    session_start();
}
//DB接続
include("db_connect.php");

//DBカートテーブルへINSERT
//"カートに入れる"ボタンを押されたか確認
if(!empty($_POST['goods_id'])){
    try {
        //page_category.phpの値を取得
        $goods_id = $_POST['goods_id'];
        $num = $_POST['num'];
        // INSERT文を変数に格納
        $sql = "INSERT INTO cart (goods_id, num) VALUES (:goods_id, :num)";
        //挿入する値は空のまま、SQL実行の準備
        $stmt = $pdo->prepare($sql);
        // 挿入する値を配列に格納
        $params = array(':goods_id' => $goods_id, ':num' => $num);
        //挿入する値が入った変数をexecuteにセットしてSQL実行
        $stmt->execute($params);
    } catch (PDOException $e) {
        exit('データベースに接続できませんでした。' . $e->getMessage());
    }
}
//DBカートテーブルに登録された商品別合計数量を表示
echo "<h2>全リスト取得</h2>";
//DBカートテーブルのデータ呼び出し
$result_list = $pdo->query('SELECT * FROM cart');
//商品別合計数量を算出
foreach ( $result_list as $row ):
    //買い物カゴが空ではない時
    if(isset($array)){
        //数量を追加=すでに買い物カゴに入っているのと、同じgoods_idがカゴに入っていた時
        $array_id = array_column( $array, "goods_id" ) ;
        if( in_array( $row['goods_id'] , $array_id) ){
            $index = array_search( $row['goods_id'] , $array_id );
            $array[$index]['num'] += $row['num'];
        //新規登録=異なるgoods_idがカゴに入った時
        }else{
            $array[] = [
                "goods_id" => $row['goods_id'] ,
                "num" => $row['num']
            ];
        }
    //配列作成=買い物カゴに初めて商品を入れる時
    }else{
        $array[] = [
            "goods_id" => $row['goods_id'],
            "num" => $row['num']
        ];
    }
endforeach;

//カートデータ出力
$total_fee = 0;
if(!empty($array)){
    foreach ( $array as $goods ):
        //goods_idからgoodsデータ呼び出し
        $goods_id = $goods['goods_id'];
        $sql = "SELECT * FROM goods WHERE goods_id = '$goods_id'";
        $result_rows = $pdo->query($sql);
        foreach ( $result_rows as $row ):
            //echo "goods_id: {$row['goods_id']} <br>";
            echo "カテゴリー: {$row['category']} <br>";
            echo "商品名: {$row['goods_name']} <br>";
            echo "金額: {$row['price']} <br>";
            echo "数量: {$goods['num']} <br><br>";
        endforeach;
            $total_fee += $row['price'] * $goods['num'];
    endforeach;
    echo "<div class='h3'>合計金額： ".number_format($total_fee)."円</div>";
    //変数をセッションに格納
    $_SESSION['array'] = $array;
}
?>
<!-- 購入ボタン -->
<br>
<br>
<form method="post" action="index.php?page_select=page_history">
    <input type="hidden" name="purchase" value="1">
    <div><input type="submit" value="購入する"></div>
</form>
<br>
<div><a href="index.php?page_select=page_category&category=リスト" class="h3">買い物を続ける</a></div>
<?php
//DB接続
include("db_connect.php");

//DBから商品データ呼び出し
$category = $_GET['category'];
if($category == "リスト"){
    $sql = "SELECT * FROM goods";
}else{
    $sql = "SELECT * FROM goods WHERE category = '$category'";
}
$result_rows = $pdo->query($sql);
?>

<!-- 商品データ出力 -->
<div class="row" style="margin-bottom:50px">
    <?php foreach ( $result_rows as $row ): ?>
        <div class="container-fluid col-sm-4" style="width: 21rem; margin: 10px">
            <div class="card">
                <img src="img/<?php echo $row['img'];?>" class="card-img-top" style="height: 20rem" >
                <div class="card-body">
                    <h5 class="card-title">商品名：<?php echo $row['goods_name'];?></h5>
                    <h5 class="card-text">カテゴリー：<?php echo $row['category'];?></h5>
                    <p class="card-text" style="height: 5rem"><?php echo $row['comment'];?></p>
                    <h5 class="card-text">金額：<?php echo $row['price'];?>
                        <form method="post" action="index.php?page_select=page_cart">
                            <input type="hidden" name="goods_id" value="<?= "{$row['goods_id']}" ?>">
                            <div>購入数 <input type="number" name="num" value="1" min="1" style="width:50px;"></div>
                            <div><input type="submit" class="btn btn-primary" style="margin-top: 10px;" value="カートに入れる"></div>
                        </form>
                    </h5>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>
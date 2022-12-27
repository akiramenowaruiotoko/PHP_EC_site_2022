<?php
    require "compornent.php";
    session_start();

    //買い物カゴがからではない時
    if(isset($_SESSION["cart"])){
        $array = $_SESSION["cart"];
        //商品の追加
        //商品名と数量がPOSTされた時
        if( isset($_POST["product_name"]) && isset($_POST["num"]) ){
            $array_product_name = array_column( $array, "product_name" ) ;
            //すでに買い物カゴに入っているのと、同じ商品がカゴに入っていた時
            if( in_array( $_POST["product_name"] , $array_product_name) ){
                $index = array_search( $_POST["product_name"] , $array_product_name );
                $array[$index]["num"] += $_POST["num"];
            //異なる部品がカゴに入った時
            }else{
                $array[] = [
                  "product_name" => $_POST["product_name"] ,
                  "num" => $_POST["num"]
                ];
            }
        }
        //商品の削除
        //商品名だけがPOSTされた時
        if( isset($_POST["product_name"]) && !isset($_POST["num"]) ){
            $array_product_name = array_column( $array, "product_name") ;
            //部品を削除する
            if( in_array( $_POST["product_name"] , $array_product_name ) ){
                $index = array_search( $_POST["product_name"] , $array_product_name);
                unset($array[$index]);
                $array = array_values($array);
            }
        }
    //買い物カゴに初めて商品を入れる時
    }else{
        $array[] = [
            "product_name" => $_POST["product_name"] ,
            "num" => $_POST["num"]
        ];
    }

    //配列をセッションに格納
    $_SESSION["cart"] = $array;
?>

<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>PHP_EC_site_2022</title>
  </head>
  <body>
    <div class="container text-center">

    <div class="container text-center">
        <h1>Hello, Board game!</h1>
        <?php
        foreach ($array as $key => $value) {
            echo "<div class='row mt-2'>";
                echo "<div class='col-3'>";
                    //商品名のカラムのみを検索
                    $array_product_name = array_column( $product, "product_name" ) ;
                    if( in_array( $value['product_name'] , $array_product_name) ){
                        //echo "array_columnで検索対象のindexを取得<BR>";
                        $index = array_search( $value['product_name'] , $array_product_name );
                        $price = $product[$index]["price"];
                        $img = $product[$index]["img"];
                        echo "<div><img src=./".$img." class='img-fluid' style='width:120px;hight;auto;'></div>";
                    }
                echo "</div>\n";
                echo "<div class='col-3'>";
                    //echo $key;
                    echo "<h3>".$value['product_name']."</h3>";
                    echo "<h4 class='text-danger'>".number_format($price)."円</h4>";
                    echo "<h4>数量 : ".$value['num']."</h4>";
                echo "</div>\n";
                echo "<div class='col-3' style='display:inline-flex;align-items: center;'>";
                ?>
                    <form action="cart.php" class="mt-3" method="post">
                        <input type="hidden" name="product_name" value="<?= $value['product_name'] ?>">
                        <button type="submit" class="btn btn-secondary">削除する</button>
                    </form>
                <?php
                echo "</div>\n";
            echo "</div>";

            $gokei += $value['num']*$price;
        }
        echo "<div class='h3'>合計金額： ".number_format($gokei)."円</div>";
        ?>
        <div><a href="index.php" class="h3">買い物を続ける</a></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </div>
  </body>
</html>
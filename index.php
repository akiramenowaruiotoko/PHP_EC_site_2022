<?php
    require "compornent.php";

    session_start();
?>

<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>PHP_EC_site_2022</title>
  </head>
  <body>
    <!-- db -->
    <?php //include("db.php"); ?>

    <!-- history -->
    <div><a href="history.php" class="h3">購入履歴</a></div>

    <!-- main -->
    <div class="container text-center">
    <h1>Hello, Board game!</h1>
    <strong class="h6 text-danger"><a href="cart.php" class="text-danger">買い物カゴ</a>は、
        <?php
            if( isset($_SESSION["cart"]) && count($_SESSION["cart"])>0){
                echo count($_SESSION["cart"]);
                echo "種類の商品が入っています。";
            }else{
                echo "空です。";
            }
        ?>
    </strong>

    <div class="row">
            <?php
            for($i=0;$i<5;$i++){
                ?>
                <div class="col-md-3">
                    <?php
                    echo "<h3>".$goods[$i]["name"]."</h3>";
                    echo "<span class='text-danger'>".number_format($goods[$i]["price"])."円</span>";
                    ?>

                    <form action="cart.php" class="mt-3" method="post">
                        <input type="hidden" name="name" value="<?= $goods[$i]["name"] ?>">
                        <select name="num">
                            <option value=1>1</option>
                            <option value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                            <option value=5>5</option>
                        </select>
                        <button type="submit" class="btn btn-primary">カゴに入れる</button>
                    </form>

                </div>
            <?php
            }
            ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </div>
  </body>
</html>
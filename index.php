<?php
    // ブラウザでエラー確認
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //セッションスタート
    session_start();
?>

<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PHP_EC_site_2022</title>
  </head>
  <body>
  

<!-- ページ切り替え -->
<?php
if()
<div><a href="list.php" class="h3">リスト</a></div>
<div><a href="category.php" class="h3">カテゴリー</a></div>
<div><a href="history.php" class="h3">購入履歴</a></div>

?>
  </body>
</html>
<!doctype html>
<html lang="ja">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PHP_EC_site_2022</title>
</head>
<body>
<?php
// ブラウザでエラー確認
ini_set('display_errors', 1);
error_reporting(E_ALL);

//セッションスタート
session_start();

//ヘッダー
include("header.php");

//メインページ切り替え
if(!empty($_GET['page_select'])){
  switch($_GET['page_select']){
    case "page_list":
      include("page_list.php");
      break;
    case "page_category":
      include("page_category.php");
      break;
    case "page_cart":
      include("page_cart.php");
      break;
    case "page_history":
      include("page_history.php");
      break;
    default:
      include("page_first.php");
    }
  }else{
  include("page_first.php");
}

//フッター
include("footer.php");
?>
</body>
</html>
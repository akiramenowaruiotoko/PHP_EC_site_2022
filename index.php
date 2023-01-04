<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <title>PHP_EC_site_2022</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php
// ブラウザでエラー確認
ini_set('display_errors', 1);
error_reporting(E_ALL);
//ヘッダー
include("header.php");
//メインページ切り替え
if(!empty($_GET['page_select'])){
  switch($_GET['page_select']){
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
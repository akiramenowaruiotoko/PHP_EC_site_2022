<?php
try {
    //データベース名、ユーザー名、パスワード
    $dsn = 'mysql:dbname=php_ec_site_2022;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'root';

    //MySQLのデータベースに接続
    $pdo = new PDO($dsn, $user, $password);
    //PDOのエラーレポートを表示
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit('データベースに接続できませんでした。' . $e->getMessage());
}

?>
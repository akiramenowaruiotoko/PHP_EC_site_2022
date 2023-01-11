/*
参照元:db_connect.php
dbn: php_ec_site_2022
user: root
password: root

CREATE DATABASE php_ec_site_2022;
*/

CREATE TABLE goods (
    goods_id INT auto_increment NOT NULL PRIMARY KEY,
    category VARCHAR(16) NOT NULL,
    goods_name VARCHAR(32) NOT NULL,
    price INT NOT NULL,
    img VARCHAR(16) NOT NULL,
    comment TEXT NOT NULL
);

CREATE TABLE cart (
    goods_id INT NOT NULL,
    num INT NOT NULL
);

CREATE TABLE history (
    history_id INT auto_increment NOT NULL PRIMARY KEY,
    history_date DATETIME DEFAULT current_timestamp,
    goods_id INT NOT NULL,
    num INT NOT NULL
);

INSERT INTO goods (
    category,
    goods_name,
    price,
    img,
    comment
) VALUES(
    "ボードゲーム",
    "カタン",
    2570,
    "001.png",
    "無人島の開拓競争！5つの資源をめぐったプレイヤー間の「貿易」が超おもしろい！"
);

INSERT INTO goods (
    category,
    goods_name,
    price,
    img,
    comment
) VALUES(
    "カードゲーム",
    "宝石の煌めき",
    5000,
    "002.png",
    "この宝石は取られたくない、あの宝石は欲しい。宝石の魅力に取りつかれたカードコレクション・獲得ゲーム"
);

INSERT INTO goods (
    category,
    goods_name,
    price,
    img,
    comment
) VALUES(
    "カードゲーム",
    "ニムト",
    1200,
    "003.png",
    "牛を引き取らないようにカードを出せ！大人数でもできる大人気パーティゲーム"
);

INSERT INTO goods (
    category,
    goods_name,
    price,
    img,
    comment
) VALUES(
    "カードゲーム",
    "犯人は踊る",
    3900,
    "004.png",
    "「犯人はお前だ!」何食わぬ顔をしている犯人を、華麗に言い当てろ!"
);

INSERT INTO goods (
    category,
    goods_name,
    price,
    img,
    comment
) VALUES(
    "ボードゲーム",
    "カルカソンヌ",
    3200,
    "005.png",
    "地形を作って占領ポイントをゲット！自分を育てるか・相手を潰すかはあなた次第。"
);
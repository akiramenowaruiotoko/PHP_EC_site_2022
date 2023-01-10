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
    comment TEXT NOT NULL,
);

CREATE TABLE num (
    goods_id INT NOT NULL,
    num INT NOT NULL,
);

CREATE TABLE history (
    history_id INT auto_increment NOT NULL PRIMARY KEY,
    history_date DATETIME DEFAULT current_timestamp,
    goods_id INT NOT NULL,
    num INT NOT NULL,
);
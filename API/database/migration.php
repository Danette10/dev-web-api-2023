<?php

require_once __DIR__ . "/connection.php";

$databaseConnection = getDatabaseConnection();

$databaseConnection->query(
    "
DROP TABLE IF EXISTS users;
CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(60) NOT NULL,
    token CHAR(32)
    );

INSERT INTO users(email, password) VALUES('dan.sebag1007@gmail.com', '\$2y$10\$TjYOPeX36Im9wL67JhLWguxaxkIxU1y1sPX4vAT8X9Pct1KG7Ww2u');
    "
);



echo "Migration successful\n";
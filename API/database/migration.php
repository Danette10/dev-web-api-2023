<?php

require_once __DIR__ . "/connection.php";

$databaseConnection = getDatabaseConnection();

$databaseConnection->query(
    "
DROP TABLE IF EXISTS users;
CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(60) NOT NULL
    );

INSERT INTO users(email, password) VALUES('email@domain.com', 'password');
    "
);

echo "Migration successful\n";
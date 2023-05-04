<?php

function getDatabaseConnection(){
    $pdo = new PDO("mysql:host=localhost;dbname=esgi-2023-api;charset=utf8", "root", "");
    return $pdo;
}
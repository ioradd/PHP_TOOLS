<?php

function connect_pdo_mysql() {
    $DATABASE_HOST = "localhost";
    $DATABASE_USER = "root"; 
    $DATABASE_PASS = "";
    $DATABASE_NAME = "nomDeLaBdd";
    try {
        return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8' , $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
        echo 'connection failed: '.$exception->getMessage();
    }
}
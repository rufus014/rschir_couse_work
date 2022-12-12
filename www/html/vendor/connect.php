<?php

    $dsn = "pgsql:host=172.18.0.2;port=5432;dbname=bookstore;user=admin;password=admin";

    $connect = new PDO($dsn);

    if (!$connect) {
        die('Error connect to DataBase');
    }
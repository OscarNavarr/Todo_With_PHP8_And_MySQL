<?php

    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASSWORD", "");
    define("DBNAME", "todo_list");

    //DSN
    $dsn = "mysql:dbname=". DBNAME. ";host=". DBHOST;

    //CONNECT TO DB
    try {
        
        $db = new PDO($dsn, DBUSER, DBPASSWORD);
        $db->exec("SET NAMES utf8");

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {

        die($e->getMessage());

    }
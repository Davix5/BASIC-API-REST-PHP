<?php

// URL RAIZ DA SUA API
const ROOT = "http://localhost/GitHub/BASIC-API-REST-PHP/BASIC%20API%20REST%20PHP";

// DADOS DO BANCO
define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "serie_login",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);


function url($uri = null)
{

    if ($uri) {
        return ROOT . "/{$uri}";
    }

    return ROOT;
}

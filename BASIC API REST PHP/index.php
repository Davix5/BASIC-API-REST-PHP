<?php

use CoffeeCode\Router\Router;

require __DIR__ . "/vendor/autoload.php";

$route = new Router(ROOT);
$route->namespace("Source\App");

/**
 * ROOT
 */
$route->group(null);
$route->get("/", "Web:home");

// Select 
$route->get("/api/user", "UserService:get");

// Select Where
$route->get("/api/user/{id_user}", "UserService:get");

// Insert
$route->post("/api/user", "UserService:post");

// Delete
$route->delete("/api/user/{id_user}", "UserService:delete");

//Edit
$route->put("/api/user/{id_user}", "UserService:put");


/**
 * ERROR
 */
$route->group("oops");
$route->get("/{errcode}", "Web:error");

$route->dispatch();


if ($route->error()) {
    $route->redirect("/oops/{$route->error()}");
}

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
$route->get("/api/user/listar", "UserService:get");

// Select Where
$route->get("/api/user/listar/{id_user}", "UserService:get");

// Insert
$route->post("/api/user/inserir", "UserService:post");

// Delete
$route->delete("/api/user/deletar/{id_user}", "UserService:delete");

//Edit
$route->put("/api/user/editar/{id_user}", "UserService:put");


/**
 * ERROR
 */
$route->group("oops");
$route->get("/{errcode}", "Web:error");

$route->dispatch();


if ($route->error()) {
    $route->redirect("/oops/{$route->error()}");
}

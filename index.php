<?php

ini_set("display_errors", 1);
ini_set("error_reporting", E_ALL);
ini_set('xdebug.overload_var_dump', 1);

ob_start();
session_start();

require_once './vendor/autoload.php';

use CoffeeCode\Router\Router;

$router = new Router("http://localhost:2020/crud");

$router->namespace("App\Controllers");

/**
 * Rotas da aplicação
 */
$router->group(null);

$router->get("/", "AuthController:loginForm", "login.form");
$router->post("/login", "AuthController:login", "login.post");

$router->get("/home", "HomeController:index", "home.index");

$router->get("/user/create", "UserController:create", "users.create");
$router->post("/user/store", "UserController:store", "users.store");

$router->get("/user/edit/{id}", "UserController:edit", "users.edit");
$router->post("/user/update/{id}", "UserController:update", "users.update");

$router->get("/user/destroy/{id}", "UserController:destroy", "users.destroy");

$router->get("/logout", "AuthController:logout", "login.logout");

$router->dispatch();

if ($router->error()) {
    var_dump($router->error());
    exit;
}

ob_end_flush();
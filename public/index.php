<?php

use Nurdin\BinaryTalk\App\Router;
use Nurdin\BinaryTalk\Controller\AccountController;
use Nurdin\BinaryTalk\Middleware\AuthMiddleware;

require_once "../vendor/autoload.php";
require_once "../app/App/Router.php";

header('Content-Type: application/json'); // ! Wajib ada biar responsenya bisa berupa json

Router::add("POST", "/v1/api/users", AccountController::class, "register");
Router::add("POST", "/v1/api/users/login", AccountController::class, "login");

Router::add("GET", "/v1/api/users/current", AccountController::class, "current", [AuthMiddleware::class]);
Router::add("PATCH", "/v1/api/users/current", AccountController::class, "update", [AuthMiddleware::class]);
Router::add("PATCH", "/v1/api/users/current/password", AccountController::class, "password", [AuthMiddleware::class]);
Router::add("DELETE", "/v1/api/users/current/delete", AccountController::class, "remove", [AuthMiddleware::class]);

Router::run();
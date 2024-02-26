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
// Router::add("GET", "/admin", AdminHomeController::class, "index", [AdminMustLoginMiddleware::class]);
// Router::add("GET", "/admin/login", AdminController::class, "login", [AdminMustNotLoginMiddleware::class]);
// Router::add("POST", "/admin/login", AdminController::class, "postLogin", [AdminMustNotLoginMiddleware::class]);
// Router::add("GET", "/admin/register", AdminController::class, "register", [AdminMustLoginMiddleware::class]);
// Router::add("GET", "/admin/profile", AdminController::class, "updateProfile", [AdminMustLoginMiddleware::class]);
// Router::add("POST", "/admin/profile", AdminController::class, "postUpdateProfile", [AdminMustLoginMiddleware::class]);
// Router::add("GET", "/admin/password", AdminController::class, "updatePassword", [AdminMustLoginMiddleware::class]);
// Router::add("POST", "/admin/password", AdminController::class, "postUpdatePassword", [AdminMustLoginMiddleware::class]);
// Router::add("GET", "/admin/account", AdminController::class, "adminAccount", [AdminMustLoginMiddleware::class]);
// Router::add("GET", "/admin/logout", AdminController::class, "logout", [AdminMustLoginMiddleware::class]);
// Router::add("GET", "/admin/delete/([a-z0-9A-Z]+)", AdminController::class, "delete", [AdminMustLoginMiddleware::class]);
// Router::add("GET", "/admin/user-list", AdminController::class, "displayAllUser", [AdminMustLoginMiddleware::class]);


// Router::add("GET", "/admin/add-products", ProductsController::class, "addProducts", [AdminMustLoginMiddleware::class]);
// Router::add("POST", "/admin/add-products", ProductsController::class, "postAddProducts", [AdminMustLoginMiddleware::class]);
// Router::add("GET", "/admin/products", ProductsController::class, "products", [AdminMustLoginMiddleware::class]);
// Router::add("GET", "/admin/products/edit/([a-z0-9A-Z]+)", ProductsController::class, "editProducts", [AdminMustLoginMiddleware::class]);
// Router::add("POST", "/admin/products/edit/([a-z0-9A-Z]+)", ProductsController::class, "postEditProducts", [AdminMustLoginMiddleware::class]);
// Router::add("GET", "/admin/products/delete/([a-z0-9A-Z]+)", ProductsController::class, "deleteProducts", [AdminMustLoginMiddleware::class]);

// Router::add("GET", "/products/([a-z0-9A-Z]+)", ProductsController::class, "detailProducts");
// Router::add("POST", "/products/([a-z0-9A-Z]+)", CartController::class, "addToCart");

// Router::add("GET", "/user/login", UserController::class, "login", [UserMustNotLoginMiddleware::class]);
// Router::add("POST", "/user/login", UserController::class, "postLogin", [UserMustNotLoginMiddleware::class]);
// Router::add("GET", "/user/register", UserController::class, "register", [UserMustNotLoginMiddleware::class]);
// Router::add("POST", "/user/register", UserController::class, "postRegister", [UserMustNotLoginMiddleware::class]);
// Router::add("GET", "/user/profile", UserController::class, "updateProfile", [UserMustLoginMiddleware::class]);
// Router::add("POST", "/user/profile", UserController::class, "postUpdateProfile", [UserMustLoginMiddleware::class]);
// Router::add("GET", "/user/password", UserController::class, "updatePassword", [UserMustLoginMiddleware::class]);
// Router::add("POST", "/user/password", UserController::class, "postUpdatePassword", [UserMustLoginMiddleware::class]);
// Router::add("GET", "/user/logout", UserController::class, "logout", [UserMustLoginMiddleware::class]);


// Router::add("GET", "/user/cart", CartController::class, "displayCart", [UserMustLoginMiddleware::class]);
// Router::add("GET", "/user/cart/delete/([a-z0-9A-Z]+)", CartController::class, "deleteCartById", [UserMustLoginMiddleware::class]);
// Router::add("POST", "/user/cart", TransactionsController::class, "makeTransactions", [UserMustLoginMiddleware::class]);
// Router::add("GET", "/admin/transactions", TransactionsController::class, "transactions", [AdminMustLoginMiddleware::class]);
// Router::add("POST", "/admin/transactions", TransactionsController::class, "postTransactionsByDate", [AdminMustLoginMiddleware::class]);
// Router::add("GET", "/admin/statistics", TransactionsController::class, "transactionStatistics", [AdminMustLoginMiddleware::class]);
// Router::add("POST", "/admin/statistics", TransactionsController::class, "postStatisticsByDate", [AdminMustLoginMiddleware::class]);
// Router::add("GET", "/user/statistics", TransactionsController::class, "transactionStatisticsUser", [UserMustLoginMiddleware::class]);
// Router::add("POST", "/user/statistics", TransactionsController::class, "updateStatusUserTransaction", [UserMustLoginMiddleware::class]);
// Router::add("GET", "/admin/transactions/([a-z0-9A-Z]+)", TransactionsController::class, "displayDetail", [AdminMustLoginMiddleware::class]);
// Router::add("POST", "/admin/transactions/([a-z0-9A-Z]+)", TransactionsController::class, "updateStatusTransaction", [AdminMustLoginMiddleware::class]);

Router::run();



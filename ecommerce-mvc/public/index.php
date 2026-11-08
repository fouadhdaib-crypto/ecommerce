<?php
declare(strict_types=1);

session_start();
spl_autoload_register(function (string $class): void {
    $prefix = 'App\\';
    if (!str_starts_with($class, $prefix)) {
        return;
    }
    $relative = substr($class, strlen($prefix));
    $file = dirname(__DIR__) . '/app/' . str_replace('\\', '/', $relative) . '.php';
    if (is_file($file)) {
        require $file;
    }
});

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
if ($path === '/') {
    (new App\Controllers\HomeController())->index();
    exit;
}
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


if (($_GET['route'] ?? '') === 'login') {
    (new App\Controllers\AuthController())->login();
    exit;
}
if (($_GET['route'] ?? '') === 'register') {
    (new App\Controllers\AuthController())->RIGSTER();
    exit;
}

if (($_GET['route'] ?? '') === 'products') {
    (new App\Controllers\ProductController())->getAllProducts();
    exit;
}

if (($_GET['route'] ?? '') === 'index') {
     (new App\Controllers\HomeController())->index();
    exit;
}


if (($_GET['route'] ?? '') === 'cart-add') {
     (new App\Controllers\CheckoutController())->addtocart();
    exit;
}



if (($_GET['route'] ?? '') === 'checkout') {
     (new App\Controllers\CheckoutController())->checkout();
    exit;
}
http_response_code(404);
echo '404 Not Found — route not implemented yet.';

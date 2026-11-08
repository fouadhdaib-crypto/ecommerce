<?php
declare(strict_types=1);

namespace App\Core;

abstract class Controller
{
    protected function view(string $template, array $data = []): void
{
    if (str_starts_with($template, 'customer/')) {
        $cartItems = [];
        $userId = $_SESSION['user_id'] ?? null;

        if ($userId !== null) {
            $cart = new \App\Models\Cart();
            $cartId = $cart->getCartIdByUserId((int) $userId);

            if ($cartId !== null) {
                $cartItems = $cart->getCartItems($cartId);
            }
        }

        $data['cartItems'] = $cartItems;
        $data['cartCount'] = array_sum(
            array_column($cartItems, 'quantity')
        );
        $data['cartTotal'] = array_sum(
            array_column($cartItems, 'subtotal')
        );
    }

    extract($data, EXTR_SKIP);

    require dirname(__DIR__) . '/Views/' . $template . '.php';
}
}

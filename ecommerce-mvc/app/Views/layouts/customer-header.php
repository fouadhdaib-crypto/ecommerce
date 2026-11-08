<?php
$activePage = $activePage ?? 'home';
$customerUrl = '/ecommerce-mvc/app/Views/customer/';
?>

<div class="announcement">
    A new season. A fresh perspective.

    <a href="/ecommerce-mvc/public/index.php?route=index#collection">
        Discover the edit
        <span aria-hidden="true">↗</span>
    </a>
</div>

<header class="header customer-header">
    <a
        class="logo"
        href="/ecommerce-mvc/public/index.php?route=index"
        aria-label="NovaShop home"
    >
        nova<span>shop</span><sup>®</sup>
    </a>

    <nav aria-label="Main navigation">
        <a
            href="/ecommerce-mvc/public/index.php?route=index"
            <?= $activePage === 'home' ? 'aria-current="page"' : '' ?>
        >
            Home
        </a>

        <a
            href="/ecommerce-mvc/public/index.php?route=products"
            <?= $activePage === 'products' ? 'aria-current="page"' : '' ?>
        >
            Shop
        </a>

        <a href="/ecommerce-mvc/public/index.php?route=index#women">
            Women
        </a>

        <a href="/ecommerce-mvc/public/index.php?route=index#men">
            Men
        </a>

        <details
            class="shopping-menu"
            <?= in_array($activePage, ['cart', 'checkout'], true)
                ? 'data-current="true"'
                : '' ?>
        >
            <summary>
                <svg
                    width="20"
                    height="20"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.6"
                    aria-hidden="true"
                >
                    <path d="M6 7h12l1 13H5L6 7Z" />
                    <path d="M9 8V6a3 3 0 0 1 6 0v2" />
                </svg>

                <span>Your bag</span>

                <span class="bag-count">
                    <?= (int) $cartCount ?>
                </span>

                <svg
                    class="menu-chevron"
                    width="20"
                    height="20"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.7"
                    aria-hidden="true"
                >
                    <path d="m7 10 5 5 5-5" />
                </svg>
            </summary>

            <div class="shopping-dropdown">
                <div class="bag-heading">
                    <p class="shopping-menu-title">YOUR BAG</p>
                    <span>Everyday favorites</span>
                </div>

                <?php if (empty($cartItems)): ?>
                    <p class="bag-empty">
                        Your bag is waiting for a little inspiration.

                        <a href="/ecommerce-mvc/public/index.php?route=products">
                            Explore the collection ↗
                        </a>
                    </p>
                <?php else: ?>
                    <ul class="live-cart-items">
                        <?php foreach ($cartItems as $item): ?>
                            <li class="bag-item">
                                <div class="bag-item-info">
                                    <strong>
                                        <?= htmlspecialchars(
                                            $item['product_name'],
                                            ENT_QUOTES,
                                            'UTF-8'
                                        ) ?>
                                    </strong>

                                    <small>
                                        <?= (int) $item['quantity'] ?>
                                        ×
                                        $<?= number_format(
                                            (float) $item['price'],
                                            2
                                        ) ?>
                                    </small>
                                </div>

                                <strong>
                                    $<?= number_format(
                                        (float) $item['subtotal'],
                                        2
                                    ) ?>
                                </strong>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="bag-footer">
                        <div class="bag-total">
                            <span>Subtotal</span>

                            <strong>
                                $<?= number_format(
                                    (float) $cartTotal,
                                    2
                                ) ?>
                            </strong>
                        </div>

                        <p>
                            Shipping and taxes calculated at checkout.
                        </p>

                        <a
                            class="bag-checkout"
                            href="/ecommerce-mvc/public/index.php?route=checkout"
                        >
                            Continue to checkout
                            <span aria-hidden="true">↗</span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </details>
    </nav>

    <a class="account" href="/ecommerce-mvc/public/login.php">
        My account
        <span aria-hidden="true">↗</span>
    </a>
</header>
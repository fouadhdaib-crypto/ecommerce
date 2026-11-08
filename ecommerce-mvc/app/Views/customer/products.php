<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shop | NovaShop</title>

    <link
        rel="stylesheet"
        href="/ecommerce-mvc/public/assets/css/store.css"
    >
    <link
        rel="stylesheet"
        href="/ecommerce-mvc/public/assets/css/customer-layout.css?v=<?= filemtime(__DIR__ . '/../../../public/assets/css/customer-layout.css') ?>"
    >
    <link
        rel="stylesheet"
        href="/ecommerce-mvc/public/assets/css/products.css"
    >
</head>
<body>
    <?php
    $activePage = 'products';
    require __DIR__ . '/../layouts/customer-header.php';
    ?>

    <main>
        <section class="shop-page">
            <div class="shop-intro">
                <div>
                    <p class="shop-eyebrow">
                        THE NOVASHOP EDIT / EVERYDAY STYLE
                    </p>

                    <h1>Find your next <em>favorite.</em></h1>

                    <p>
                        Easy layers. Fresh perspectives.
                        Pieces to make your own.
                    </p>
                </div>

                <span class="shop-stamp" aria-hidden="true">✳</span>
            </div>

            <div class="shop-toolbar">
                <span>
                    All pieces
                    <span class="product-count">
                        <?= count($products) ?>
                    </span>
                </span>

                <span class="shop-caption">
                    A little inspiration for your everyday.
                </span>
            </div>

            <?php
            $defaultImages = [
                'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=800&q=85',
                'https://images.unsplash.com/photo-1542272604-787c3835535d?auto=format&fit=crop&w=800&q=85',
                'https://images.unsplash.com/photo-1548126032-079a0fb0099d?auto=format&fit=crop&w=800&q=85',
                'https://images.unsplash.com/photo-1617137968427-85924c800a22?auto=format&fit=crop&w=800&q=85',
            ];

            $imageIndex = 0;
            ?>

            <div class="shop-grid">
                <?php foreach ($products as $product): ?>
                    <article class="product-card">
                        <div class="shop-product-image">
                            <img
                                src="<?= $defaultImages[$imageIndex++ % count($defaultImages)] ?>"
                                alt="Style inspiration — illustrative clothing photo"
                                loading="lazy"
                                width="800"
                                height="1000"
                            >

                            <span class="shop-image-label">
                                STYLE INSPIRATION
                            </span>
                        </div>

                        <div class="shop-product-body">
                            <p class="shop-category">
                                <?= htmlspecialchars(
                                    $product['category'] ?? 'The everyday edit',
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>
                            </p>

                            <div class="shop-product-heading">
                                <h2>
                                    <?= htmlspecialchars(
                                        $product['name'],
                                        ENT_QUOTES,
                                        'UTF-8'
                                    ) ?>
                                </h2>

                                <p class="shop-price">
                                    $<?= htmlspecialchars(
                                        number_format((float) $product['price'], 2),
                                        ENT_QUOTES,
                                        'UTF-8'
                                    ) ?>
                                </p>
                            </div>

                            <form
                                action="/ecommerce-mvc/public/index.php?route=cart-add"
                                method="post"
                            >
                                <input
                                    type="hidden"
                                    name="product_id"
                                    value="<?= htmlspecialchars((string) $product['id'], ENT_QUOTES, 'UTF-8') ?>"
                                >

                                <button type="submit">
                                    <svg
                                        width="18"
                                        height="18"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.6"
                                        aria-hidden="true"
                                    >
                                        <path d="M6 7h12l1 13H5L6 7Z" />
                                        <path d="M9 8V6a3 3 0 0 1 6 0v2" />
                                    </svg>

                                    Add to Cart

                                    <span aria-hidden="true">↗</span>
                                </button>
                            </form>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <?php if (empty($products)): ?>
                <div class="shop-empty">
                    <span aria-hidden="true">✳</span>
                    <h2>A fresh edit is on its way.</h2>
                    <p>Check back soon for new pieces.</p>
                </div>
            <?php endif; ?>

            <div class="shop-endnote">
                <span>CURATED FOR YOUR EVERYDAY</span>
                <p>Your style. Your story. Your next chapter.</p>

                <a href="/ecommerce-mvc/app/Views/customer/index.php">
                    Explore NovaShop ↗
                </a>
            </div>
        </section>
    </main>
</body>
</html>
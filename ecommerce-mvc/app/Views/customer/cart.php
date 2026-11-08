<?php
/** TODO: Implement cart view. Escape dynamic output with htmlspecialchars(). */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Your cart | NovaShop</title>
  <link rel="stylesheet" href="/ecommerce-mvc/public/assets/css/store.css">
  <link rel="stylesheet" href="/ecommerce-mvc/public/assets/css/customer-layout.css?v=<?= filemtime(__DIR__ . '/../../../public/assets/css/customer-layout.css') ?>">
</head>
<body>
  <?php $activePage = 'cart'; require __DIR__ . '/../layouts/customer-header.php'; ?>
  <main>
<div class="customer-placeholder">
    <h1>Your cart</h1>
    <p>Starter MVC view — add form or listing here.</p>
</div>
  </main>
</body>
</html>
<?php














?>












<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | NovaShop</title>
  <link rel="stylesheet" href="/ecommerce-mvc/app/Views/auth/style.css">
</head>

<body>
  <main class="auth-shell">
    <section class="brand-panel">
      <a class="brand" href="/ecommerce-mvc/public/login.php"><span class="brand-mark">N</span> NovaShop</a>
      <div class="brand-copy">
        <span class="eyebrow">YOUR EVERYDAY MARKETPLACE</span>
        <h1>Good to have<br>you back.</h1>
        <p>Discover great finds, save your favorites, and enjoy shopping made simple.</p>
        <div class="brand-decoration" aria-hidden="true">
          <span class="orb orb-one"></span><span class="orb orb-two"></span><span class="orb orb-three"></span>
        </div>
      </div>
      <p class="brand-footer">© 2026 NovaShop. Made for better shopping.</p>
    </section>
    <section class="form-panel">
      <div class="auth-card">
        <div class="mobile-brand"><span class="brand-mark">N</span> NovaShop</div>
        <span class="tag">WELCOME BACK</span>
        <h2>Sign in to your account</h2>
        <p class="intro">Enter your details to continue shopping.</p>
        <!-- For PHP MVC, change action to your login route and add a server-generated CSRF token. -->







                  <?php if (!empty($error)): ?>
                  <p role="alert">
                      <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
                  </p>
           <?php endif; ?>
        <form action="/ecommerce-mvc/public/login.php" method="post">
          <div class="field">
            <label for="email">Email address</label>
            <input id="email" name="email" type="email" placeholder="you@example.com" autocomplete="email" required>
          </div>
          <div class="field">
            <div class="label-row"><label for="password">Password</label></div>
            <input id="password" name="password" type="password" placeholder="Enter your password"
              autocomplete="current-password" minlength="8" required>
          </div>
          <div class="form-options">
            <label class="check"><input type="checkbox" name="remember" value="1"> Remember me</label>
            <span class="muted-small">Secure account access</span>
          </div>
          <button class="primary-button" type="submit">Sign in <span aria-hidden="true">→</span></button>
        </form>
        <p class="switch">New to NovaShop? <a href="/ecommerce-mvc/public/register.php">Create an account</a></p>
      </div>
    </section>
  </main>
</body>

</html>
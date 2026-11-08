<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Discover the NovaShop edit: effortless silhouettes, considered layers, and everyday essentials.">
  <title>NovaShop — Wear your own story</title>
  <link rel="stylesheet" href="/ecommerce-mvc/public/assets/css/store.css">
  <link rel="stylesheet" href="/ecommerce-mvc/public/assets/css/customer-layout.css?v=<?= filemtime(__DIR__ . '/../../../public/assets/css/customer-layout.css') ?>">
</head>
<body>
  <?php $activePage = 'home'; require __DIR__ . '/../layouts/customer-header.php'; ?>
  <main>
    <section class="hero" aria-labelledby="hero-title">
      <img class="hero-image" src="https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=2200&q=85" alt="Friends exploring the city in relaxed everyday outfits" fetchpriority="high">
      <div class="hero-shade"></div>
      <div class="hero-content"><p class="eyebrow">THE EVERYDAY EDIT / VOL. 01</p><h1 id="hero-title">Wear your<br>own <em>story.</em></h1><p>Good clothes. Great days.<br>Pieces that feel a little more like you.</p><a class="button light" href="#collection">Explore the collection <span>↗</span></a></div>
      <div class="hero-bottom"><span>MADE FOR YOUR EVERYDAY</span><a href="#categories">A little inspiration, below ↓</a><span>01 — 03</span></div>
      <div class="hero-label">A fresh point of view.<br><span>The new-season collection</span></div>
    </section>
    <div class="values"><span>Considered details</span><i>✳</i><span>Effortless silhouettes</span><i>✳</i><span>Everyday possibilities</span><i>✳</i><span>Your style, your rules</span></div>
    <section class="section categories" id="categories">
      <div class="section-heading"><div><p class="eyebrow">FIND YOUR NEXT FAVORITE</p><h2>A wardrobe, <em>your way.</em></h2></div><p>From slow mornings to late nights.<br>Discover pieces for every version of you.</p></div>
      <div class="category-grid">
        <a class="category" id="women" href="#collection"><img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&w=900&q=85" alt="Women's street style with an oversized coat" loading="lazy"><div><span><small>THE NEW PERSPECTIVE</small>For her</span><b>↗</b></div></a>
        <a class="category" id="men" href="#collection"><img src="https://images.unsplash.com/photo-1617137968427-85924c800a22?auto=format&fit=crop&w=900&q=85" alt="Men's tailored layers in neutral tones" loading="lazy"><div><span><small>EVERYDAY, REDEFINED</small>For him</span><b>↗</b></div></a>
      </div>
    </section>
    <section class="section collection" id="collection">
      <div class="section-heading"><div><p class="eyebrow">ON OUR RADAR</p><h2>Fresh off <em>the rack.</em></h2></div><a class="text-link" href="#products">Meet your new essentials ↗</a></div>
      <div class="product-grid" id="products">
        <article class="product"><div class="product-image"><span class="badge">THE ESSENTIAL</span><img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=650&q=85" alt="Classic white cotton T-shirt" loading="lazy"></div><div class="product-info"><h3>The everyday tee</h3><span>01</span></div><p>Clean lines. Endless possibilities.</p><div class="swatches" aria-label="Color inspiration: ivory, charcoal, olive"><i></i><i></i><i></i></div></article>
        <article class="product"><div class="product-image"><img src="https://images.unsplash.com/photo-1542272604-787c3835535d?auto=format&fit=crop&w=650&q=85" alt="Blue denim jeans with classic pocket details" loading="lazy"></div><div class="product-info"><h3>Your go-to denim</h3><span>02</span></div><p>A little structure. A lot of character.</p><div class="swatches denim" aria-label="Color inspiration: blue and dark blue"><i></i><i></i></div></article>
        <article class="product"><div class="product-image"><span class="badge">LAYER UP</span><img src="https://images.unsplash.com/photo-1548126032-079a0fb0099d?auto=format&fit=crop&w=650&q=85" alt="Neutral jacket with considered detailing" loading="lazy"></div><div class="product-info"><h3>The finishing layer</h3><span>03</span></div><p>For wherever the day takes you.</p><div class="swatches" aria-label="Color inspiration: ivory, charcoal, olive"><i></i><i></i><i></i></div></article>
      </div>
      <p class="collection-note">A preview of the NovaShop style edit. Explore the inspiration and make it your own.</p>
    </section>
    <section class="story" id="story"><div class="story-image"><img src="https://images.unsplash.com/photo-1445205170230-053b83016050?auto=format&fit=crop&w=1100&q=85" alt="A thoughtfully arranged clothing rail in a light-filled studio" loading="lazy"><span>LESS NOISE. MORE YOU.</span></div><div class="story-copy"><p class="eyebrow">THE NOVASHOP POINT OF VIEW</p><h2>Trends come<br>and go.<br><em>You do you.</em></h2><p>We believe getting dressed should feel good. A favorite layer, the perfect tee, denim that goes everywhere — the pieces that become part of your story.</p><p>Welcome to your next chapter.</p><a class="button dark" href="#collection">Find your everyday <span>↗</span></a></div></section>
    <section class="closing"><p class="eyebrow">A LITTLE LESS ORDINARY</p><h2>Your next chapter<br>looks <em>good on you.</em></h2><a class="text-link" href="#categories">Find your inspiration ↗</a><span class="asterisk" aria-hidden="true">✳</span></section>
  </main>
  <footer><div class="footer-top"><a class="logo" href="#">nova<span>shop</span><sup>®</sup></a><p>Everyday pieces.<br>Individual stories.</p><nav aria-label="Footer navigation"><a href="#collection">The collection</a><a href="#story">Our story</a><a href="/ecommerce-mvc/public/login.php">My account ↗</a></nav></div><div class="footer-bottom"><span>© 2026 NovaShop</span><span>WEAR WHAT FEELS LIKE YOU.</span><a href="#">Back to top ↑</a></div></footer>
</body>
</html>

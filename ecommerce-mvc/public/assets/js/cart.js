(() => {
  const menu = document.querySelector('.shopping-menu');
  if (!menu) return;
  const list = menu.querySelector('[data-cart-items]');
  const toast = document.querySelector('[data-cart-toast]');
  const key = 'novashop.cart.v1';
  const money = value => new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(value);
  let cart = [];
  let timer;
  function read() {
    try {
      const value = JSON.parse(localStorage.getItem(key) || '[]');
      return Array.isArray(value) ? value.filter(p => p && typeof p.id === 'string' && typeof p.name === 'string' && Number.isFinite(p.price) && p.price >= 0 && Number.isInteger(p.quantity) && p.quantity > 0 && p.quantity <= 99).map(p => ({...p, image: typeof p.image === 'string' && /^https?:\/\//.test(p.image) ? p.image : ''})) : [];
    } catch { return []; }
  }
  function announce(message) {
    clearTimeout(timer);
    toast.textContent = message;
    toast.hidden = false;
    timer = setTimeout(() => { toast.hidden = true; }, 3000);
  }
  function render() {
    list.replaceChildren();
    for (const item of cart) {
      const row = document.createElement('li');
      row.className = 'bag-item';
      const image = document.createElement('img');
      if (item.image) image.src = item.image;
      image.alt = '';
      const info = document.createElement('div');
      info.className = 'bag-item-info';
      const name = document.createElement('strong');
      name.textContent = item.name;
      const detail = document.createElement('small');
      detail.textContent = `${item.quantity} × ${money(item.price)}`;
      info.append(name, detail);
      const remove = document.createElement('button');
      remove.type = 'button';
      remove.className = 'bag-remove';
      remove.textContent = 'Remove';
      remove.setAttribute('aria-label', `Remove ${item.name} from bag`);
      remove.addEventListener('click', () => {
        const index = cart.findIndex(p => p.id === item.id);
        cart = cart.filter(p => p.id !== item.id);
        save();
        const buttons = list.querySelectorAll('.bag-remove');
        (buttons[Math.min(index, buttons.length - 1)] || menu.querySelector('summary')).focus();
        announce(`${item.name} removed from your bag.`);
      });
      row.append(image, info, remove);
      list.append(row);
    }
    menu.querySelector('[data-cart-count]').textContent = cart.reduce((sum, p) => sum + p.quantity, 0);
    menu.querySelector('[data-cart-total]').textContent = money(cart.reduce((sum, p) => sum + Math.round(p.price * 100) * p.quantity, 0) / 100);
    menu.querySelector('[data-cart-empty]').hidden = cart.length > 0;
    menu.querySelector('[data-cart-footer]').hidden = cart.length === 0;
  }
  function save() {
    try { localStorage.setItem(key, JSON.stringify(cart)); } catch { announce('Your bag will last until you leave this page; browser storage is unavailable.'); }
    render();
  }
  document.addEventListener('submit', event => {
    const form = event.target.closest('[data-add-to-cart]');
    if (!form) return;
    event.preventDefault();
    const id = form.querySelector('[name="product_id"]').value;
    const price = Number(form.dataset.productPrice);
    if (!Number.isFinite(price) || price < 0) return;
    const existing = cart.find(p => p.id === id);
    if (existing && existing.quantity >= 99) { announce('You have reached the limit of 99 for this item.'); return; }
    if (existing) existing.quantity++;
    else cart.push({ id, name: form.dataset.productName, price, quantity: 1, image: form.closest('.product-card').querySelector('img').src });
    save();
    menu.open = true;
    announce(`${form.dataset.productName} added to your bag.`);
  });
  document.addEventListener('click', event => { if (!menu.contains(event.target)) menu.open = false; });
  document.addEventListener('keydown', event => { if (event.key === 'Escape' && menu.open) { menu.open = false; menu.querySelector('summary').focus(); } });
  window.addEventListener('storage', event => { if (event.key === key || event.key === null) { cart = read(); render(); } });
  cart = read();
  render();
})();

let cart = JSON.parse(localStorage.getItem('jovgtCart')) || [];

function saveCart() {
    localStorage.setItem('jovgtCart', JSON.stringify(cart));
}

function addToCart(name, price, button) {
    const existing = cart.find(item => item.name === name);
    if (existing) existing.quantity++; else cart.push({ name, price, quantity: 1 });
    updateCart();
    button.classList.add('loading');
    setTimeout(() => {
        button.classList.remove('loading');
        showNotification(`${name} agregado al carrito`, 'success');
    }, 600);
}

function removeFromCart(name) {
    cart = cart.filter(item => item.name !== name);
    updateCart();
    showNotification('Producto eliminado', 'error');
}

function updateCart() {
    const count = cart.reduce((sum, item) => sum + item.quantity, 0);
    const total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
    document.getElementById('cartCount').textContent = count;
    document.getElementById('floatingCartCount').textContent = count;
    document.getElementById('floatingCartTotal').textContent = total;
    saveCart();
}

function toggleCart() {
    const modal = document.getElementById('cartModal');
    modal.style.display = modal.style.display === 'block' ? 'none' : 'block';
    renderCart();
}

function renderCart() {
    const container = document.getElementById('cartItems');
    const totalDiv = document.getElementById('cartTotal');
    const totalAmount = document.getElementById('totalAmount');

    if (cart.length === 0) {
        container.innerHTML = '<div class="empty-cart"><p>Tu carrito está vacío</p></div>';
        totalDiv.style.display = 'none';
        return;
    }

    let html = '';
    let total = 0;
    cart.forEach(item => {
        const subtotal = item.price * item.quantity;
        total += subtotal;
        html += `
            <div class="cart-item">
                <div class="cart-item-info">
                    <h4>${item.name}</h4>
                    <p>Cantidad: ${item.quantity}</p>
                </div>
                <div class="cart-item-price">$${subtotal}</div>
                <button class="remove-item" onclick="removeFromCart('${item.name}')">Eliminar</button>
            </div>`;
    });

    container.innerHTML = html;
    totalAmount.textContent = total;
    totalDiv.style.display = 'block';
}

function initiateCheckout() {
    document.getElementById('checkoutModal').style.display = 'flex';
}

function closeCheckoutModal() {
    document.getElementById('checkoutModal').style.display = 'none';
}

document.getElementById('checkoutAccept').addEventListener('click', () => {
    const email = document.getElementById('checkout-email').value.trim();
    if (!email) return alert('Ingresa tu correo');
    alert(`Gracias ${email}. Te enviaremos tu cotización pronto.`);
    cart = [];
    updateCart();
    closeCheckoutModal();
    toggleCart();
});

document.getElementById('checkoutCancel').addEventListener('click', closeCheckoutModal);
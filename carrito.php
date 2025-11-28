<?php include_once 'includes/header.php'; ?>
<section class="products">
  <div class="container">
    <h2 class="section-title">Tu Carrito</h2>
    <div id="cartItems"></div>
    <div class="cart-total" id="cartTotal" style="display:none;">
      <h3>Total: $<span id="totalAmount">0</span></h3>
      <button class="checkout-button" onclick="initiateCheckout()">Proceder al Pago</button>
    </div>
  </div>
</section>
<?php include_once 'includes/footer.php'; ?>
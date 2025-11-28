<?php include_once __DIR__ . '/../config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo SITE_NAME; ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header id="mainHeader">
  <div class="header-content">
    <div class="logo">
      <i class="fas fa-laptop-code"></i>
      <span><?php echo SITE_NAME; ?></span>
    </div>
    <nav class="nav-menu" id="navMenu">
      <a href="index.php">Inicio</a>
      <a href="index.php#services">Servicios</a>
      <a href="index.php#mobile-services">Móviles</a>
      <a href="contacto.php">Contacto</a>
    </nav>
    <button class="mobile-menu-btn" id="mobileMenuBtn">
      <i class="fas fa-bars"></i>
    </button>
    <div class="header-icons">
      <div class="chat-icon" onclick="toggleChat()"><i class="fas fa-comments"></i></div>
      <div class="cart-icon" onclick="toggleCart()">
        <i class="fas fa-shopping-cart"></i>
        <span class="cart-count" id="cartCount">0</span>
      </div>
    </div>
  </div>
</header>
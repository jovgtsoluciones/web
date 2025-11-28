<?php include_once 'includes/header.php'; ?>
<section class="contact-form-section">
  <div class="container">
    <h2 class="section-title">Solicita tu diagnóstico gratuito</h2>
    <form class="contact-form" id="contactForm" method="POST" action="enviar_formulario.php">
      <div class="form-row">
        <div class="form-group">
          <label>Nombre completo</label>
          <input type="text" name="name" required>
        </div>
        <div class="form-group">
          <label>Correo electrónico</label>
          <input type="email" name="email" required>
        </div>
      </div>
      <div class="form-group">
        <label>Servicio de interés</label>
        <select name="service" required>
          <option value="">Selecciona un servicio</option>
          <option>Formateo de PC</option>
          <option>Cambio de Pantalla Móvil</option>
          <option>Eliminación de Virus</option>
        </select>
      </div>
      <div class="form-group">
        <label>Describe tu problema</label>
        <textarea name="message" rows="5" required></textarea>
      </div>
      <button type="submit" class="submit-btn">Enviar solicitud</button>
    </form>
  </div>
</section>
<?php include_once 'includes/footer.php'; ?>
<?php
function mostrarServicio($titulo, $descripcion, $precio, $icono, $badge = '', $categoria = '', $keywords = '') {
    $badgeHtml = $badge ? "<div class='product-badge'>$badge</div>" : '';
    echo "
    <div class='product-card' data-category='$categoria' data-search='$keywords'>
        $badgeHtml
        <div class='product-image'><i class='$icono'></i></div>
        <h3>$titulo</h3>
        <p>$descripcion</p>
        <div class='product-price'>$$precio</div>
        <button class='add-to-cart' onclick=\"addToCart('$titulo', $precio, this)\">Agregar al Carrito</button>
    </div>";
}
?>
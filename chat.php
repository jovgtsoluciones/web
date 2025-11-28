<?php
// Respuestas predefinidas con IA básica
function generarRespuestaIA($mensaje) {
    $mensaje = strtolower($mensaje);
    $respuestas = [
        'precio|costo|cuanto' => 'Te dejo nuestros precios actualizados: Formateo $25.000, Cambio de pantalla $45.000, Diagnóstico $15.000. ¿Qué te interesa?',
        'hola|buen|hey' => '¡Hola! 👋 Soy tu asistente IA de JovGT. ¿En qué puedo ayudarte?',
        'virus|lento|malware' => 'Podemos eliminar virus y optimizar tu PC por $30.000. ¿Quieres agendar?',
        'agendar|cita|horario' => 'Puedes agendar por correo o completar el formulario. ¿Prefieres atención inmediata?',
    ];

    foreach ($respuestas as $key => $respuesta) {
        $palabras = explode('|', $key);
        foreach ($palabras as $palabra) {
            if (strpos($mensaje, $palabra) !== false) {
                return $respuesta;
            }
        }
    }

    return 'Gracias por tu consulta. ¿Puedes decirme más sobre el problema? Te ayudo en segundos.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $mensaje = $input['mensaje'] ?? '';
    $respuesta = generarRespuestaIA($mensaje);
    echo json_encode(['respuesta' => $respuesta]);
    exit;
}
?>
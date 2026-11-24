<?php
// Devuelve el usuario logueado (id, nombre, email, roles) o null si no hay sesión.
// Guarda el resultado en memoria para consultar a Node una sola vez por request.
function obtenerUsuarioActual() {
    static $usuario = false; // false = todavía no consultamos

    if ($usuario !== false) {
        return $usuario;
    }

    $usuario = null;

    if (!empty($_COOKIE['token'])) {
        $ch = curl_init('http://127.0.0.1:3000/api/me');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3); // si Node está caído, no cuelga la página
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Cookie: token=' . $_COOKIE['token']]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 200) {
            $usuario = json_decode($response, true);
        }
    }

    return $usuario;
}
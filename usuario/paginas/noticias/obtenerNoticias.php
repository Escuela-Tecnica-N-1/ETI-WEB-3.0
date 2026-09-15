<?php

$carpetaNoticias = __DIR__ . "/imagenes/Noticias";

$imagenes = [];

$archivos = scandir($carpetaNoticias);

foreach ($archivos as $archivo) {

    $rutaCompleta = $carpetaNoticias . "/" . $archivo;

    if (is_file($rutaCompleta)) {

        $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

        if (in_array($extension, ['jpg', 'jpeg', 'png', 'webp'])) {

            $imagenes[] = [
                'nombre' => $archivo,
                'fecha' => filemtime($rutaCompleta)
            ];
        }
    }
}

usort($imagenes, function ($a, $b) {
    return $b['fecha'] - $a['fecha'];
});

$ultimasNoticias = array_slice($imagenes, 0, 3);

echo json_encode($ultimasNoticias);
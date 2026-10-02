<?php
define('BASE_PATH', str_replace('\\', '/', dirname(__DIR__)));
/* BASE_PATH se usa para los include de PHP
<?php include BASE_PATH . '/usuario/paginas/componentes/footer.php'; ?> */

$docRoot = str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT']));

define('BASE_URL', rtrim(substr(BASE_PATH, strlen($docRoot)), '/'));
/* BASE_URL se usa para los links de HTML
<link rel="stylesheet" href="<?= BASE_URL ?>/usuario/css/styles.css">*/  


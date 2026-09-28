<?php
define('BASE_PATH', str_replace('\\', '/', dirname(__DIR__)));
$docRoot = str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT']));
define('BASE_URL', rtrim(substr(BASE_PATH, strlen($docRoot)), '/'));
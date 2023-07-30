<?php
declare(strict_types = 1);

use App\Kernel;

define('ROOT_DIR', __DIR__ . '/../');
require ROOT_DIR . '/vendor/autoload.php';

$kernel = new Kernel();

try {
    $kernel->handle();
} catch (\Throwable $e) {
    exit($e->getMessage());
}

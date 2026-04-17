<?php

// Auto-load Laravel
require_once __DIR__ . '/vendor/autoload.php';

// Load environment
$env = parse_ini_file(__DIR__ . '/.env');
foreach ($env as $key => $value) {
    putenv("$key=$value");
}

$app = require_once __DIR__ . '/bootstrap/app.php';

// Run migration
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$status = $kernel->call('migrate', ['--force' => true]);
exit($status);

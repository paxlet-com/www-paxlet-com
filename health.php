<?php
/**
 * Direct healthcheck endpoint
 */
header('Content-Type: application/json; charset=utf-8');
$config = @include __DIR__ . '/config.php';
$version = $config['version'] ?? '0.1.0';

echo json_encode([
    'status'    => 'ok',
    'app'       => 'Paxlet',
    'version'   => $version,
    'php'       => PHP_VERSION,
    'timestamp' => gmdate('Y-m-d\TH:i:s\Z'),
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

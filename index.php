<?php
/**
 * Paxlet Web Portal — Front Controller
 * Compatible with Apache/Nginx + PHP 8.1+ on Plesk Obsidian
 */

declare(strict_types=1);

// Security Headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('Referrer-Policy: strict-origin-when-cross-origin');

$config = require __DIR__ . '/config.php';

// Route resolution
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
$route = $_GET['route'] ?? trim($uri, '/');

// API / Healthcheck endpoints
if ($route === 'api/health' || $route === 'health') {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'status'    => 'ok',
        'app'       => $config['app_name'],
        'domain'    => $config['domain'],
        'version'   => $config['version'],
        'php'       => PHP_VERSION,
        'timestamp' => gmdate('Y-m-d\TH:i:s\Z'),
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    exit;
}

if ($route === 'api/version' || $route === 'version') {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'version' => $config['version'],
        'release' => 'Core 0.1',
    ], JSON_PRETTY_PRINT);
    exit;
}

// Render Page
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/nav.php';
?>
<main>
  <?php
    require __DIR__ . '/templates/hero.php';
    require __DIR__ . '/templates/traits.php';
    require __DIR__ . '/templates/how.php';
    require __DIR__ . '/templates/cards.php';
    require __DIR__ . '/templates/manifesto.php';
  ?>
</main>
<?php
require __DIR__ . '/includes/footer.php';

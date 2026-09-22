<?php
/**
 * Header template
 * @var array $config
 * @var string $title
 * @var string $description
 */
$pageTitle = $title ?? ($config['app_name'] . ' — ' . $config['tagline']);
$pageDesc  = $description ?? $config['description'];
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($pageDesc) ?>">
  <meta name="author" content="<?= htmlspecialchars($config['author']) ?>">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://<?= htmlspecialchars($config['domain']) ?>/">
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($pageDesc) ?>">
  <meta property="og:image" content="/assets/social/og-1200x630.png">

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle) ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($pageDesc) ?>">
  <meta name="twitter:image" content="/assets/social/og-1200x630.png">

  <!-- Favicons -->
  <link rel="icon" href="/assets/icons/favicon.svg" type="image/svg+xml">
  <link rel="alternate icon" href="/assets/icons/favicon-32.png" type="image/png">
  <link rel="apple-touch-icon" href="/assets/icons/app-icon-180.png">

  <!-- Stylesheet -->
  <link rel="stylesheet" href="/styles.css">
</head>
<body>

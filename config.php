<?php
/**
 * Paxlet Website Configuration
 * https://paxlet.com
 */

return [
    'app_name'    => 'Paxlet',
    'tagline'     => 'Build small. Connect everything.',
    'description' => 'Paxlet is an open system for small, addressable capabilities that can be verified, shared and composed across distributed nodes.',
    'domain'      => 'paxlet.com',
    'version'     => trim(@file_get_contents(__DIR__ . '/VERSION') ?: '0.1.0'),
    'github_org'  => 'https://github.com/paxlet-com',
    'github_repo' => 'https://github.com/paxlet-com/paxlet',
    'github_www'  => 'https://github.com/paxlet-com/www-paxlet-com',
    'pypi_url'    => 'https://pypi.org/project/paxlet/',
    'author'      => 'Paxlet Contributors',
    'year'        => date('Y'),
    'environment' => getenv('APP_ENV') ?: 'production',
];

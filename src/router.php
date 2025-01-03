<?php

require_once __DIR__ . '/Controller/HomeController.php';
require_once __DIR__ . '/Controller/LinkController.php';
require_once __DIR__ . '/Controller/AdminController.php';

$homeController = new HomeController();
$linkController = new LinkController($redisService);
$adminController = new AdminController($redisService);

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($method === 'GET' && $uri === '/') {
    // Main page
    $homeController->index();
} elseif ($method === 'POST' && $uri === '/create') {
    // POST to create short link
    $linkController->create();
} elseif ($method === 'GET' && preg_match('#^/s/([^/]+)$#', $uri, $matches)) {
    // Redirecting to main url using short link
    $shortCode = $matches[1];
    $linkController->redirect($shortCode);
} elseif ($method === 'GET' && $uri === '/admin') {
    // Admin panel
    $adminController->index();
} elseif ($method === 'POST' && $uri === '/admin/flush-links') {
    $adminController->flushLinks();
} elseif ($method === 'POST' && $uri === '/admin/flush-all') {
    $adminController->flushAll();
} else {
    http_response_code(404);
    echo "404 Not Found";
}

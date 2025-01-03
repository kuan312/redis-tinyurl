<?php

require_once __DIR__ . '/Services/RedisService.php';
require_once __DIR__ . '/helpers.php';

try {
    $redisService = new RedisService('redis', 6379);
} catch (Exception $e) {
    error_log("Redis connection error: " . $e->getMessage());
    $redisService = null;
}

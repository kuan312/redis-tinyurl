<?php

/**
 * @param string $message
 * @return void
 */
function showServiceUnavailable($message)
{
    http_response_code(503);
    echo "<h1>503 Service Unavailable</h1>";
    echo "<p>{$message}</p>";
    exit;
}

/**
 * @param string $url
 * @return void
 */
function redirect($url)
{
    header("Location: $url");
    exit;
}

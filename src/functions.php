<?php

/**
 * generates a short code (6 chars) using md5.
 * 
 * @param string $longUrl
 * @return string
 */
function generateShortCode($url) {
    return substr(md5($url), 0, 6);
}


<?php

require_once __DIR__ . '/../functions.php';

class LinkController
{
    private $redisService;

    public function __construct($redisService)
    {
        $this->redisService = $redisService;
    }

    public function create()
    {
        if (!$this->redisService) {
            // 503
            header('Content-Type: application/json');
            echo json_encode(["error" => "Redis unavailable"]);
            return;
        }

        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        $longUrl = $data['longUrl'] ?? null;
        if (!$longUrl) {
            header('Content-Type: application/json');
            echo json_encode(["error" => "No link inserted!"]);
            return;
        }

        $shortCode = generateShortCode($longUrl);
        $this->redisService->hSet("links", $shortCode, $longUrl);

        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
        header('Content-Type: application/json');
        echo json_encode([
            "shortUrl" => $protocol . "://" . $_SERVER['HTTP_HOST'] . "/s/$shortCode"
        ]);
    }


    public function redirect($shortCode)
    {
        if (!$this->redisService) {
            showServiceUnavailable("Redis unavailable. Try again later.");
        }

        $longUrl = $this->redisService->hGet("links", $shortCode);
        if ($longUrl) {
            redirect($longUrl); 
        } else {
            http_response_code(404);
            echo "Url by code:  {$shortCode} wasn't found!";
        }
    }
}

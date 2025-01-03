<?php

require_once __DIR__ . '/../helpers.php';

class AdminController
{
    private $redisService;

    public function __construct($redisService)
    {
        $this->redisService = $redisService;
    }

    public function index()
    {
        if (!$this->redisService) {
            showServiceUnavailable("Redis unavailbale. Please, try again later.");
        }

        $allLinks = $this->redisService->hGetAll("links");

        require __DIR__ . '/../../views/admin.php';
    }

    public function flushLinks()
    {
        if (!$this->redisService) {
            showServiceUnavailable("Redis unavailbale. Please, try again later.");
        }

        $this->redisService->del("links");

        redirect('/admin');
    }

    /**
     * Полная очистка Redis.
     */
    public function flushAll()
    {
        if (!$this->redisService) {
            showServiceUnavailable("Redis unavailbale. Please, try again later.");
        }

        $this->redisService->flushAll();

        redirect('/admin');
    }
}

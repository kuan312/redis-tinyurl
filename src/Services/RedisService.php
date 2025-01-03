<?php

class RedisService
{
    private $redis;

    public function __construct($host, $port)
    {
        $this->redis = new Redis();
        $this->redis->connect($host, $port, 2.0); // 2 sec timeout
    }

    // hSet("links", $shortCode, $longUrl)
    public function hSet($hash, $field, $value)
    {
        return $this->redis->hSet($hash, $field, $value);
    }

    // hGet("links", $shortCode)
    public function hGet($hash, $field)
    {
        return $this->redis->hGet($hash, $field);
    }

    // hGetAll("links")
    public function hGetAll($hash)
    {
        return $this->redis->hGetAll($hash);
    }

    // Удалить ключ (например, "links")
    public function del($key)
    {
        return $this->redis->del($key);
    }

    // Если нужно снести весь Redis
    public function flushAll()
    {
        return $this->redis->flushAll();
    }
}

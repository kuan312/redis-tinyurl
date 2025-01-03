# TinyUrl with Redis

This project is aimed to practice CRUD operations using Redis. It involves setting up and interacting with a TinyURL service, where Redis serves as the backend for storing these links.

## Setup Instructions

### Build and run Docker containers
```bash
sudo docker compose build
sudo docker compose up -d
```

### Access Redis inside the Docker
```bash
sudo docker exec -it tinyurl-redis sh
```

### Start the Redis CLI
```bash
redis-cli
```

## Basic Redis commands

### Check connection
- **Ping Redis:**
  ```bash
  ping
  ```

### Key-value Operations
- **Check if a key exists:**
  ```bash
  EXISTS key
  ```
- **Set a key-value:**
  ```bash
  SET key value
  ```
- **Get a value:**
  ```bash
  GET key
  ```
- **Delete key:**
  ```bash
  DEL key
  ```
- **Show all keys:**
  ```bash
  KEYS *
  ```
- **Set Expiry:**
  ```bash
  EXPIRE key seconds
  ```
- **Check time-to-live:**
  ```bash
  TTL key
  ```

### Hash Operations
- **Set a field in a hash:**
  ```bash
  HSET key field value
  ```
- **Get a field value from a hash:**
  ```bash
  HGET key field
  ```
- **Retrieve all fields and values from hash:**
  ```bash
  HGETALL key
  ```

### Flush All Data
- **Clear everything:**
  ```bash
  FLUSHALL
  ```

## Additional resource (Russian)
- [The Little Redis Book (Russian)](https://github.com/akandratovich/the-little-redis-book/blob/master/ru/redis-ru.pdf)

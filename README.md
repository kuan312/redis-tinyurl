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
  ```bash
  ping
  ```

### Key-value Operations
- **check if a key exists:**
  ```bash
  EXISTS key
  ```
- **set a key-value:**
  ```bash
  SET key value
  ```
- **get value by key:**
  ```bash
  GET key
  ```
- **delete key:**
  ```bash
  DEL key
  ```
- **show all keys:**
  ```bash
  KEYS *
  ```
- **set Expiry:**
  ```bash
  EXPIRE key seconds
  ```
- **check time-to-live:**
  ```bash
  TTL key
  ```

### Hash Operations
- **set a field in a hash:**
  ```bash
  HSET key field value
  ```
- **get a field value from a hash:**
  ```bash
  HGET key field
  ```
- **retrieve all fields and values from hash:**
  ```bash
  HGETALL key
  ```

### Flush All Data
- **clear everything:**
  ```bash
  FLUSHALL
  ```

## Additional resource (Russian)
- [The Little Redis Book (Russian)](https://github.com/akandratovich/the-little-redis-book/blob/master/ru/redis-ru.pdf)

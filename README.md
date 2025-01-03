# TinyUrl with Redis

This project is aimed to practice CRUD operations using Redis. It involves setting up and interacting with a TinyURL service, where Redis serves as the backend for storing these links.

## Setup Instructions

### Build and Run the Docker Containers
```bash
sudo docker compose build
sudo docker compose up -d
```

### Access Redis Inside the Docker Container
```bash
sudo docker exec -it tinyurl-redis sh
```

### Start Redis CLI
```bash
redis-cli
```

## Basic Redis Commands

### Connectivity Check
- **Ping Redis:**
  ```bash
  ping
  ```

### Key-Value Operations
- **Check if a Key Exists:**
  ```bash
  EXISTS key
  ```
- **Set a Key-Value Pair:**
  ```bash
  SET key value
  ```
- **Get a Value by Key:**
  ```bash
  GET key
  ```
- **Delete a Key:**
  ```bash
  DEL key
  ```
- **List All Keys:**
  ```bash
  KEYS *
  ```
- **Set Expiry on a Key:**
  ```bash
  EXPIRE key seconds
  ```
- **Check Time-to-Live (TTL):**
  ```bash
  TTL key
  ```

### Hash Operations
- **Set a Field in a Hash:**
  ```bash
  HSET key field value
  ```
- **Get a Field Value from a Hash:**
  ```bash
  HGET key field
  ```
- **Retrieve All Fields and Values from a Hash:**
  ```bash
  HGETALL key
  ```

### Flush All Data
- **Clear All Keys in Redis:**
  ```bash
  FLUSHALL
  ```

## Additional Resources (Russian)
- [The Little Redis Book (Russian)](https://github.com/akandratovich/the-little-redis-book/blob/master/ru/redis-ru.pdf)

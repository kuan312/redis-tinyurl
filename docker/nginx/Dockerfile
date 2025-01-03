FROM nginx:1.23-alpine

# ВАЖНО: учитываем, что context = .
# значит путь к файлу default.conf -> docker/nginx/default.conf
COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/html

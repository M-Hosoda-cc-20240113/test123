FROM nginx:1.18
# timezone
ENV TZ='Asia/Tokyo'
# conf
COPY  ./deploydir-prod/docker/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY  ./app/public /var/www/app/public

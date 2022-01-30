FROM fabiocicerchia/nginx-lua:latest

COPY nginx.conf /etc/nginx/nginx.conf
COPY default.conf /etc/nginx/conf.d/default.conf

EXPOSE 9503

STOPSIGNAL SIGQUIT

CMD ["nginx"]
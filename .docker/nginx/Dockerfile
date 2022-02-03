FROM fabiocicerchia/nginx-lua:latest

COPY nginx.conf /etc/nginx/nginx.conf
COPY default.conf /etc/nginx/conf.d/default.conf

RUN apk add --update gcc lua5.2-dev musl-dev git g++ openssl \
    && export C_INCLUDE_PATH=/usr/include/lua5.2/ \
    && luarocks install httpclient \
    && luarocks install lua-cjson \
    && apk del gcc lua5.2-dev musl-dev git

#RUN luarocks install openssl
#RUN luarocks install json-lua

EXPOSE 9503

STOPSIGNAL SIGQUIT

COPY docker-entrypoint.sh /
RUN chmod +x /docker-entrypoint.sh
ENTRYPOINT ["/docker-entrypoint.sh"]

CMD ["nginx"]
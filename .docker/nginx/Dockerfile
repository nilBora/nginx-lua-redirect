FROM fabiocicerchia/nginx-lua:latest

COPY nginx.conf /etc/nginx/nginx.conf
COPY default.conf /etc/nginx/conf.d/default.conf

#RUN apk add git g++ openssl \
#    && luarocks install lua-cjson 2.0.0

#RUN apk add --update gcc lua5.2-dev musl-dev git g++ openssl \
#    && export C_INCLUDE_PATH=/usr/include/lua5.4/ \
#    && luarocks install httpclient \
#    && luarocks install lua-cjson \

#RUN luarocks install openssl
#RUN luarocks install json-lua

EXPOSE 9503

STOPSIGNAL SIGQUIT

COPY docker-entrypoint.sh /
RUN chmod +x /docker-entrypoint.sh
ENTRYPOINT ["/docker-entrypoint.sh"]

CMD ["nginx"]
FROM fabiocicerchia/nginx-lua:latest

RUN apk add --no-cache g++ openssl

COPY nginx.conf /etc/nginx/nginx.conf
COPY default.conf /etc/nginx/conf.d/default.conf

CMD ["nginx"]

#FROM alpine:3.6

#RUN apk add --no-cache nginx-mod-http-lua

# Delete default config
#RUN rm -r /etc/nginx/conf.d && rm /etc/nginx/nginx.conf

# Create folder for PID file
#RUN mkdir -p /run/nginx

#RUN apk add --no-cache g++ openssl

#RUN luarocks install pgmoon

# Add our nginx conf
#COPY nginx.conf /etc/nginx/nginx.conf

#CMD ["nginx"]
#FROM nginx:alpine

#RUN apk add --no-cache g++ openssl
#
#RUN luarocks install pgmoon
#
#RUN luarocks install luasocket
#
#RUN luarocks install luaossl

#CMD ["nginx"]
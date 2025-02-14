# syntax=docker/dockerfile:1
FROM valkey/valkey:8.0.2-alpine3.21

COPY ./*.conf /usr/local/etc/valkey/

CMD ["valkey-server", "/usr/local/etc/valkey/valkey.conf"]

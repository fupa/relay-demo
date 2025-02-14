### simple Relay demo project

This project consists of three simple services:
* a Redis compatible cache service (Valkey)
* a nginx webserver that forwards requests to PHP
* a simple PHP service that performs a request to the cache service, using the Relay driver

#### prerequisites
* have Docker installed
* if you are using Phpstorm, the IDE is preconfigured to use a PHP remote interpreter,
  so you don't need to have PHP installed locally
* XDebug is enabled in the PHP container

#### how to start
Run the following command in the root directory of the project:
```bash
  docker compose up --detach
```
(Omit the `--detach` flag to run the services in foreground to see the logs).

If you make any changes to the resources, make sure to restart and rebuild the containers with the following command:
```bash
  docker compose up --detach --build
```

#### calling the service
The PHP service is available at `http://localhost:8080/`. You can call it with a GET request, e.g.:
```bash
  curl http://localhost:8080/
```
It will check for the existence of a key in the cache service. If it exists, it will be returned, 
otherwise the key will be stored.

#### monitor requests to the cache instance
```bash
  docker exec -it relay-demo-cache redis-cli monitor
```

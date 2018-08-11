#!/bin/bash

CONTAINER_WP = wp_my_plugin_wordpress
CONTAINER_DB = wp_my_plugin_db

UID = $(shell id -u)
UGROUP_NAME = $(shell id -g -n)
DOCKER_USER = $(UID):$(shell id -g)
CONTAINER_BUILD = wp_my_plugin_build

.PHONY: up
up:
	docker-compose up -d

.PHONY: down
down:
	docker-compose down

.PHONY: rebuild
rebuild: down
	docker-compose up -d --build

.PHONY: install
install: up
	docker exec -u 1000:1000 -it $(CONTAINER_WP) composer install -d ./wp-content/plugins/wp-my-plugin

.PHONY: mysql
mysql:
	docker exec -it $(CONTAINER_DB) mysql --user=wordpress --password=wordpress wordpress

.PHONY: bash
bash:
	docker exec -it $(CONTAINER_WP) bash

.PHONY: wp-cli
wp-cli:
	docker exec -u www-data -it $(CONTAINER_WP) bash

.PHONY: generate-dist
generate-dist:
	mkdir -p ./dist
	docker build -f Dockerfile.build -t $(CONTAINER_BUILD) .
	docker run --rm --interactive --tty \
		--user $(DOCKER_USER) \
		--volume $(PWD)/dist:/app/dist \
		$(CONTAINER_BUILD) bash -c "zip -r /app/dist/wp-my-plugin.zip ."

	@echo "Distribuition generated in wp-my-plugin.zip"

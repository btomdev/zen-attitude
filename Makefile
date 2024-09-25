DOCKER_COMPOSE 		?= docker compose
EXEC				= $(DOCKER_COMPOSE) exec
RUN					= $(DOCKER_COMPOSE) run
DOCKER_COMPOSE 		+= -f docker-compose.yml
CONTAINER 			= php

start: ## Start the project
	@make up
	@make composer-install
	@make database-create
	@make migrate
	@make yarn-install
	@make yarn-build

down:
	$(DOCKER_COMPOSE) down

up:
	$(DOCKER_COMPOSE) up --build -d

shell:
	$(EXEC) -it $(CONTAINER) zsh

bin-console:
	$(EXEC) $(CONTAINER) bin/console $(COMMAND)

composer-install:
	$(EXEC) $(CONTAINER) composer install

database-create:
	$(EXEC) $(CONTAINER) bin/console doctrine:database:create --if-not-exists

migrate:
	$(EXEC) $(CONTAINER) bin/console doctrine:migrations:migrate --no-interaction

yarn-install:
	$(EXEC) $(CONTAINER) yarn install

yarn-build:
	$(EXEC) $(CONTAINER) yarn build
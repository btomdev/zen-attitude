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
	@make npm-install
	@make npm-build
	@echo
	@printf "You now can browse on \033[32mhttp://localhost:8000\033[0m\n"

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
	$(EXEC) $(CONTAINER) bin/console doctrine:database:create --if-not-exists -vvv

migrate:
	$(EXEC) $(CONTAINER) bin/console doctrine:migrations:migrate --no-interaction

npm-build:
	$(EXEC) $(CONTAINER) npm run build

npm-install:
	$(EXEC) $(CONTAINER) npm install
docker-up: ## Create and start all docker containers.
	@docker-compose -f docker/docker-compose.yml up -d --no-deps --build --remove-orphans

docker-down: ## Stop and remove all docker containers.
	@docker-compose -f docker/docker-compose.yml down

docker-down-v: ## Stop and remove all docker containers and information's.
	@docker-compose -f docker/docker-compose.yml down -v

docker-restart: ## Restart all docker containers.
	@docker-compose -f docker/docker-compose.yml restart

docker-config: ## List the configuration
	@docker-compose -f docker/docker-compose.yml config

docker-prune: ## Remove ALL unused docker resources, including volumes
	@docker system prune -a -f --volumes

stan-tests:
	./vendor/bin/phpstan analyse --level=max src tests

unit-tests:
	./vendor/bin/phpunit ./tests

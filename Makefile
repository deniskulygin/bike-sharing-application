.PHONY: build
build:
	docker build --no-cache --force-rm .

.PHONY: up
up:
	docker-compose up -d

.PHONY: down
down:
	docker-compose down

.PHONY: install
install: up
	docker-compose exec app composer install

.PHONY: bash
bash: up
	docker-compose exec -ti app bash

.PHONY: run
run: up
	docker-compose exec app bash -c "php public/index.php $(city)"

.PHONY: run-tests
run-tests: up
	docker-compose exec app bash -c "vendor/bin/phpunit tests"

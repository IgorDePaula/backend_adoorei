CONTAINER_BACK=app

all: help

install: build up composer-install migrate clear

up: ## Inicia o container
	docker compose up -d

down: ## Para e remove containers
	docker compose down

bash: up ## Inicia uma sessao bash
	docker exec -it $(CONTAINER_BACK) /bin/bash

build: ## Constroi os containers
	docker compose build

composer-install: up ## Instala as dependencias do composer
	docker exec $(CONTAINER_BACK) composer install --no-interaction --no-scripts  && chmod -R 777 bootstrap &&  php artisan key:generate

test: up clear ## Executa os testes da apicacao sem cobertura. Use a opcao 'FILTER' para rodar um teste especifico
ifdef FILTER
	docker exec -t $(CONTAINER_BACK) composer unit-test -- --filter="$(FILTER)"
else
	docker exec -t $(CONTAINER_BACK) composer unit-test
endif

logs: up ## Visualiza os logs do container
	docker compose logs --follow

clear: up ## Limpa os caches do laravel
	docker exec $(CONTAINER_BACK) /bin/bash -c "php artisan optimize:clear" && chmod -R 777 storage && chmod -R 777 bootstrap

coverage-html: up clear ## Executa os testes com cobertura
	docker exec -t $(CONTAINER_BACK) composer test-coverage-html

help: ## Mostra o menu de ajuda
	@grep -E '^[a-zA-Z0-9_-]+:.*?## .*$$' $(firstword $(MAKEFILE_LIST)) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}'

migrate: ## Executa a migracao do banco
	docker exec $(CONTAINER_BACK) /bin/bash -c "php artisan migrate --seed"

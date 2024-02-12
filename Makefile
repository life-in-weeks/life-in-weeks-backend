project-init: cp-docker-env cp-laravel-env cp-laravel-env build run composer-i db-migrate db-seed storage-link gen-swagger rules

build:
	docker-compose up -d --build

run:
	docker compose up -d

down:
	docker compose down

composer-i:
	docker-compose exec app composer install

db-migrate:
	docker-compose exec app php artisan migrate

db-fresh:
	docker-compose exec app php artisan migrate:fresh

db-seed:
	docker-compose exec app php artisan db:seed

passport-keys:
	docker-compose exec app php artisan passport:client --password

storage-link:
	docker-compose exec app php artisan storage:link

cp-docker-env:
	cp ./.env.example .env

cp-laravel-env:
	cp src/.env.example src/.env

rules:
	sudo chmod 777 -R ./

passport-install:
	docker-compose exec app php artisan passport:install

gen-swagger:
	docker-compose exec app php artisan l5-swagger:generate

project-init: build run composer-i db-migrate db-seed storage-link

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

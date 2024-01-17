build:
	docker-compose up -d --build

run:
	docker compose up -d

down:
	docker compose down

composerI:
	docker-compose exec app composer install

migrate:
	docker-compose exec app php artisan migrate

seed:
	docker-compose exec app php artisan db:seed

# Installation and Running Life-in-weeks-backend

1. Start Docker containers:

    ```bash
    docker-compose up -d --build
    ```

2. Install Composer dependencies:

    ```bash
    docker-compose exec app composer install
    ```

3. Modify access permissions (optional):

    ```bash
    sudo chmod 777 -R ./
    ```

4. Launch containers:

    ```bash
    docker compose up -d
    ```

5. lets to src

    ```bash
    cd src
    ```

6. Copy .env.example to .env
   ```bash
   cp .env.example .env
   ```

7. set migration:

    ```bash
    docker-compose exec app php artisan migrate
    ```

8. Modify access permissions (optional):

    ```bash
    sudo chmod 777 -R ./
    ```
---
The application is available at http://localhost:8080/

### Project Description: Life in Weeks Backend REST API

The Life in Weeks Backend REST API serves as the backend infrastructure
to facilitate the functionalities required for the Life in Weeks application.
It handles data processing, communication with the database, and serves
as the intermediary between the frontend and the server.

#

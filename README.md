<h1 align="center">Life in Weeks</h1>

## Installation and Running Life-In-Weeks-backend

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

## Development Setup

### Prerequisites

- Install [Node.js](https://nodejs.org/en) which includes [Node Package Manager][npm](https://docs.npmjs.com/getting-started)
- Install [pnpm](https://pnpm.io/) by following the installation [instructions](https://pnpm.io/installation)
- Install [Docker](https://www.docker.com/) by following the installation [instructions](https://www.docker.com/get-started/)

### Setting Up a Project

1. Clone this repository

    ```bash
    git clone git@github.com:life-in-weeks/life-in-weeks-backend.git
    ```
   
2. Init project by Makefile command

    ```bash
    make project-init
    ```
   
3. Create a Password Grant Client

    ```bash
    make passport-install
    ```

- The application is available at http://localhost:8080/
- The documentation REST API is available at http://localhost:8080/api/documentation


#### Project Description: Life in Weeks Backend REST API

The Life in Weeks Backend REST API serves as the backend infrastructure
to facilitate the functionalities required for the Life in Weeks application.
It handles data processing, communication with the database, and serves
as the intermediary between the frontend and the server.


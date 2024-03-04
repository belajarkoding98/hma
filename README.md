# Muhammad Jahidin

3 Tahun pengalaman di Web Developer, membuat system berbasis website
diperuntukan kebutuhan kantor dan freelance. Saya seorang yang enjoy bekerja
sendiri dan tim, lebih menyukai tantangan yang bersifat konstruktif untuk
pengalaman. Berkomitmen untuk membangun sistem sesuai kebermanfaatan.

## Table of Contents

-   [Muhammad Jahidin](#muhammad-jahidin)
    -   [Table of Contents](#table-of-contents)
    -   [Features](#features)
    -   [Installation](#installation)
        -   [Usage](#usage)
        -   [To do API](#to-do-api)
        -   [Thanks](#thanks)

## Features

-   Product management: Easily add, edit, and delete products.
-   Sales transactions

## Installation

1. Clone the repository:

    ```bash
    https://github.com/belajarkoding
    ```

2. Navigate to the project directory:

    ```bash
    cd your-project
    ```

3. Install PHP dependencies:

    ```bash
    composer install
    ```

4. Copy the `.env.example` file to `.env` and configure your database:

    ```bash
    cp .env.example .env
    ```

5. Change Database to:

    ```bash
    db_hma
    ```

6. Generate the application key:

    ```bash
    php artisan key:generate
    ```

7. Migrate the database:

    ```bash
    php artisan migrate --seed
    ```

8. Start the development server:

    ```bash
    php artisan serve
    ```

### Usage

Visit `http://localhost:8000` in your browser to access the web-based landing page generator.

### To do API

1. API Register, `http://localhost:8000/api/register`:

    ```bash
    method : POST
    fullname : muhammad jahidin
    email : xxxxx@xxx.vcom
    password : qweqweqwe
    password_confirmation : qweqweqwe
    ```

2. API Login, `http://localhost:8000/api/login`:

    ```bash
    method : POST
    email : xxxxx@xxx.vcom
    password : qweqweqwe
    ```

3. API Get All Users, `http://localhost:8000/api/users`:

    ```bash
    method : GET
    ```

4. API Get One Users, `http://localhost:8000/api/users/1`:

    ```bash
    method : GET
    ```

5. API Create Users, `http://localhost:8000/api/users`:

    ```bash
    method : POST
    fullname : muhammad jahidin
    email : xxxxx@xxx.vcom
    password : qweqweqwe
    password_confirmation : qweqweqwe
    ```

6. API Update Users, `http://localhost:8000/api/users/1`:

    ```bash
    method : PUT
    fullname : muhammad jahidin
    email : xxxxx@xxx.vcom
    password : qweqweqwe
    password_confirmation : qweqweqwe
    ```

7. API Delete Users, `http://localhost:8000/api/users/1`:

    ```bash
    method : DELETE
    ```

8. API Logout, `http://localhost:8000/api/logout`:

    ```bash
    method : POST
    ```

### Thanks

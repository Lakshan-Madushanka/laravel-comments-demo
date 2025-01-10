
<div align="center"> 

# Demo for the commenter package

[Commenter Package](https://github.com/Lakshan-Madushanka/laravel-comments) |
[Admin Panel](https://github.com/Lakshan-Madushanka/laravel-comments-admin-panel)

</div>

## Description

This is a demo project for the [commenter](https://github.com/Lakshan-Madushanka/laravel-comments) package
## Installation

1. Create .env file and copy the .env.example file content.

2. Install composer dependencies,
    ```bash
        composer install
    ```
    
3. Create database.sqlite in database directory

4. Generate app key
    ```bash
        php artisan key:generate
    ```

5. Install Commenter
    ```bash
    php artisan commenter:install
    ```
6. Migrate and seed the database
    ```bash
        php artisan migrate:fresh --seed
    ```

7. Install and build npm dependencies
    ```bash
        npm install
        npm run dev
    ```

8. Start server
   ```bash
       php artisan serve
   ```    


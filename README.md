
<div align="center"> 

# Demo for the commenter package

[Commenter Package](https://github.com/Lakshan-Madushanka/laravel-comments) |
[Admin Panel](https://github.com/Lakshan-Madushanka/laravel-comments-admin-panel)

</div>

## Description

This is a demo project for the [commenter](https://github.com/Lakshan-Madushanka/laravel-comments) package
## Installation

Create .env file and copy the .env.example file content.

Install composer dependencies,

```bash
    composer install
```
Create database.sqlite in database directory

```bash
    php artisan migrate:fresh --seed
```
Install Commenter

```bash
php artisan commenter:install
```

Install npm dependencies and start dev server

```bash
    npm install
    npm run dev
```


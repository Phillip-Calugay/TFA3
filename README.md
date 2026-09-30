# Simple POS System

A CodeIgniter 4 point-of-sale account demo backed by MySQL. Customer and user records can be created, edited, validated, and displayed in responsive account tables. User profiles support prepared JPG/PNG avatar thumbnails.

## Pages

- `/` - landing page
- `/about` - project information
- `/customers` - database-backed customer records
- `/users` - database-backed user accounts
- `/customers/new` and `/customers/edit/{id}` - validated customer create/edit forms
- `/users/new` and `/users/edit/{id}` - validated user create/edit forms with avatar upload on edit

## Setup

1. Start Apache and MySQL in XAMPP, then run `composer install` if dependencies are not already installed.
2. The local database connection in `.env` uses the default XAMPP MySQL account (`root` with an empty password). Change it if your account differs.
3. Create and populate the database using either option:
   - Import [database/simple_pos.sql](database/simple_pos.sql) in phpMyAdmin; or
   - Run `php spark migrate` followed by `php spark db:seed PosAccountsSeeder`.
4. If upgrading an existing TFA2 database, run `php spark migrate` to add the `users.avatar` column. A fresh SQL import already includes the column.
5. Run `php spark serve`, then open `http://localhost:8080`.

Uploaded avatars are validated as JPG/PNG files no larger than 2 MB, resized to a 300 × 300 display-ready thumbnail, and saved under `public/uploads`. Only the generated filename is stored in the database.

The repository includes both the SQL database export and CodeIgniter migration/seeder files for reproducible setup.

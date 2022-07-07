# Virtual Restaurant - Documentation
---
## Introduction
- Virtual restaurant is a website where you can order meals, desserts & beverages and we will deliver it to your location.
- It has the same concept as e-commerce (shopping site) where you can pick any product you like and they will send it to you.
- The difference is, while most e-commerce companies act as an aggregator, instead we act as a product owner.

## Project Preview
If you want to see how this project visually looks, then you can open the `PREVIEW.md` file in the parent directory or [click here to redirect.](https://github.com/iqbaltaufiq/virtual-restaurant/blob/master/PREVIEW.md)

## Tech used
* HTML, CSS & Vanilla JS
* [PHP 7.3.2](https://www.php.net)
* [Laravel 7.x](https://laravel.com)
* [Bootstrap 4.2.1](https://getbootstrap.com)
* [MariaDB 10.1.38](https://mariadb.org)
* [jQuery](https://jquery.com) (included for dependencies only)

## How to Install
#### [ ZIP ]
1. Download this repository as a `.zip` file.
2. Create a new laravel project using composer in your local computer.
3. Extract the previously downloaded zip file.
4. Copy all items from inside the extracted file.
5. Paste it into your newly created laravel project folder.
6. Open `phpmyadmin` and create a new database (to make it easier to configure, named it to `virtual-restaurant`).
7. Import the SQL database from `_SQL_FILE` folder to your newly created database (don't forget to read the `How_to_use.txt` guide).
8. Do some common configuration, like `.env` files, and any other configurations that you may need to configure.
9. Run `php artisan serve` from your working directory to see if that works smoothly.

## How Things Work
#### [ As a user ]
1. Open the website (e.g. `127.0.0.1:8000`).
2. Create an account or sign-in with the existing account.
3. Click the *Menu List* on the navbar and select any category you like.
4. Click on any food you want.
5. Select the item quantity, options (if available) and message note for your order. (You can add multiple foods by repeating the process from point 4)
6. Open the *foodcart* menu to see your order.
7. Click *payment* to continue.
8. Click *Complete* to finish your current invoice, or *Cancel Order* to cancel your current invoice and removes all the items from your foodcart.
* notes: users can't and shouldn't access the `/admin` route.

#### [ As an admin ]
1. Open the website (e.g. `127.0.0.1:8000`).
2. Sign-in with existing admin account.
3. Admin will be redirected to `/admin` route.
4. Admin can add a new menu into database by clicking *add item* on the bottom right of the screen.
5. Admin can `edit` and `delete` a menu from database by clicking on *view* button on the selected menu.
* notes: admin can't and shouldn't make an invoice. If you want to order some foods, use `user`'s account instead.

#### [ As a guest ]
1. A guest means someone that isn't logged in as either a user or an admin.
2. Guest can only open the menu categories and see the menu details (such as description, quantity, options and price) but they __CANNOT__ perform any ordering activities.
3. Guest can't and shouldn't access `/admin` route.
4. If a guest is trying to order a food, then they will be redirected to a login page.
5. If a guest is trying to access `/admin` route, then they will also be redirected to a login page.
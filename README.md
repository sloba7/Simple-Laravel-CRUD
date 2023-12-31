
# Simple Laravel CRUD

This is a simple CRUD user management application built with Laravel. The application allows you to perform basic user management operations such as creating, reading, updating, and deleting users. It also provides features for filtering, pagination, sorting, and search functionality.


Clone the repository to your local machine:

```php
git clone https://github.com/sloba7/Simple-Laravel-CRUD.git
```
Navigate to the project directory:

```php
cd user-management-app
```

Install the project dependencies using Composer:

```php
composer install
```
Copy the .env.example file and rename it to .env:

```php
cp .env.example .env
```

Generate a new application key:

```php
php artisan key:generate
```

Update the .env file with your database credentials and other necessary configurations.

Run the database migrations:

```php
php artisan migrate
```

Start the development server:

```php
php artisan serve
```
Open your web browser and access the application at http://localhost:8000.

# Usage
- To create a new user, navigate to the "Create User" page and fill in the required user information.
- To view the list of users, go to the "Home" page.
- You can use the search box to filter users by their name.
- Click on the column headers in the user list to sort the users based on that field.
- Pagination is enabled, and you can navigate between pages using the previous and next buttons.

# Contributing
Contributions are welcome! If you find any issues or have suggestions for improvements, feel free to open an issue or submit a pull request.


# Care Group E-Commerce Platform

## Table of Contents
- [About Care Group](#about-care-group)
- [Features](#features)
  - [Customer Features](#customer-features)
  - [Admin Features](#admin-features)
- [Technologies Used](#technologies-used)
  - [Backend](#backend)
  - [Frontend](#frontend)
- [Installation](#installation)
- [Usage](#usage)
  - [Customer Usage](#customer-usage)
  - [Admin Usage](#admin-usage)
- [Project Structure](#project-structure)
- [API Documentation](#api-documentation)
- [Troubleshooting](#troubleshooting)
- [Contributing](#contributing)
- [License](#license)

## About Care Group

Care Group is a modern e-commerce platform built with Laravel, designed to provide a seamless shopping experience for customers and comprehensive management tools for administrators. The application allows users to browse products, add them to cart, and complete the checkout process, while administrators can manage products, track orders, and view product logs.

## Features

### Customer Features
- **Product Browsing**: Browse through various products with details
- **Shopping Cart**: Add products to cart, update quantities, and remove items
- **Checkout Process**: Complete purchases with customer information
- **Order Confirmation**: Receive confirmation with order details

### Admin Features
- **Product Management**: Create, edit, view, and delete products
- **Order Management**: View and manage customer orders
- **Product Logs**: Track changes to products
- **User Management**: Manage user accounts and profiles

## Technologies Used

### Backend
- **PHP 8.1+**
- **Laravel 10.x**: PHP framework
- **MySQL**: Database
- **Laravel Breeze**: Authentication
- **Laravel Sanctum**: API authentication
- **Hardevine Shopping Cart**: Cart functionality

### Frontend
- **Blade Templates**: Laravel templating engine
- **TailwindCSS**: Utility-first CSS framework
- **AlpineJS**: JavaScript framework for interactivity
- **Vite**: Build tool

## Installation

1. Clone the repository
   ```
   git clone https://github.com/FawziFawzi/care-group.git
   cd care-group
   ```

2. Install PHP dependencies
   ```
   composer install
   ```

3. Install JavaScript dependencies
   ```
   npm install
   ```

4. Create and configure environment file
   ```
   cp .env.example .env
   php artisan key:generate
   ```

5. Configure your database in the `.env` file
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=care_group
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. Run migrations and seed the database
   ```
   php artisan migrate
   php artisan db:seed
   ```

7. Build frontend assets
   ```
   npm run dev
   ```

8. Start the development server
   ```
   php artisan serve
   ```

## Usage

### Customer Usage
1. Visit the homepage to browse products
2. Add products to your cart
3. Proceed to checkout
4. Fill in your details and complete the order
5. View order confirmation

### Admin Usage
1. **Authentication**:
    - Navigate to `/register` in your browser to register an admin
    - Navigate to `/login` in your browser to login
    - You Will be directed automatically to admin page
2. **Accessing the Admin Panel**:
   - Navigate to `/admin/home` in your browser

3. **Product Management**:
   - **View Products**: Navigate to `/admin/products` to see all products
   - **Add Product**: Click "Add New Product" button and fill in the product details
   - **Edit Product**: Click the edit icon next to a product and update its details
   - **Delete Product**: Click the delete icon next to a product and confirm deletion
   - **Search products by name**

4. **Order Management**:
   - Navigate to `/admin/home` to view all orders

5. **Product Logs**:
   - Navigate to `/admin/logs` to view product activity logs
   - Monitor changes made to products, including creation, updates, and deletions

## Project Structure

- **app/**: Contains the core code of the application
  - **Http/Controllers/**: Contains all controllers
    - **admin/**: Contains admin-specific controllers (AdminProductController, OrderController, ProductLogsController)
  - **Models/**: Contains all Eloquent models
  - **Providers/**: Contains all service providers
- **database/**: Contains database migrations, factories, and seeders
  - **migrations/**: Database table definitions
  - **seeders/**: Initial data for the database
  - **factories/**: Model factories for testing and seeding
- **resources/**: Contains views, assets, and language files
  - **views/**: Blade template files
    - **admin/**: Admin panel views (dashboard, product management, logs)
    - **components/**: Reusable UI components
- **routes/**: Contains all route definitions
  - **web.php**: Web routes including admin routes
- **public/**: Contains publicly accessible files
  - **dash/**: Admin dashboard assets
- **tests/**: Contains test files
- **config/**: Contains configuration files
- **storage/**: Contains application storage files


# Care Group E-Commerce Platform - Developer Documentation

## Table of Contents
- [Project Overview](#project-overview)
- [Project Structure](#project-structure)
- [Architecture](#architecture)
- [Key Components](#key-components)
  - [Models](#models)
  - [Controllers](#controllers)
  - [Views](#views)
  - [Routes](#routes)
- [Database Schema](#database-schema)
- [Authentication and Authorization](#authentication-and-authorization)
- [How to Extend](#how-to-extend)
  - [Adding New Features](#adding-new-features)
  - [Extending Models](#extending-models)
  - [Adding New Controllers](#adding-new-controllers)
  - [Creating New Views](#creating-new-views)
- [Development Workflow](#development-workflow)
- [Coding Standards](#coding-standards)
- [Testing](#testing)
- [Deployment](#deployment)

## Project Overview

Care Group is a Laravel-based e-commerce platform that allows customers to browse products, add them to a cart, and complete purchases. It also provides an admin interface for managing products, orders, and tracking product changes.

The application follows the MVC (Model-View-Controller) architecture pattern and uses Laravel's built-in features for routing, authentication, and database management.

## Project Structure

The project follows Laravel's standard directory structure:

```
care-group/
├── app/                      # Application code
│   ├── Http/                 # HTTP layer
│   │   ├── Controllers/      # Controllers
│   │   │   └── admin/        # Admin-specific controllers
│   │   ├── Middleware/       # Middleware
│   │   └── Requests/         # Form requests
│   ├── Models/               # Eloquent models
│   └── Providers/            # Service providers
├── bootstrap/                # Framework bootstrap
├── config/                   # Configuration files
├── database/                 # Database files
│   ├── migrations/           # Database migrations
│   ├── factories/            # Model factories
│   └── seeders/              # Database seeders
├── public/                   # Publicly accessible files
│   └── dash/                 # Admin dashboard assets
├── resources/                # Resources
│   ├── views/                # Blade templates
│   │   ├── admin/            # Admin views
│   │   └── components/       # Reusable UI components
│   ├── css/                  # CSS files
│   └── js/                   # JavaScript files
├── routes/                   # Route definitions
│   ├── web.php               # Web routes
│   └── auth.php              # Authentication routes
├── storage/                  # Storage
└── tests/                    # Test files
```

## Architecture

The application follows Laravel's MVC architecture:

1. **Models**: Represent database tables and define relationships between entities
2. **Views**: Blade templates that render HTML
3. **Controllers**: Handle HTTP requests and return responses

The application also uses Laravel's service providers for bootstrapping and configuring services.

## Key Components

### Models

The application has the following key models:

#### Product

Represents a product in the e-commerce store.

- **File**: `app/Models/Product.php`
- **Key attributes**:
  - `name`: Product name
  - `description`: Product description
  - `category`: Product category
  - `image`: Path to product image
  - `price`: Product price
  - `user_id`: ID of the user who created/updated the product
- **Relationships**:
  - `user()`: Belongs to a User
  - `logs()`: Has many ProductLogs
- **Features**:
  - Uses soft deletes (products are not permanently deleted)

#### Order

Represents a customer order.

- **File**: `app/Models/Order.php`
- **Key attributes**:
  - `order_number`: Unique order identifier
  - `name`: Customer name
  - `phone`: Customer phone number
  - `address`: Customer address
  - `order_items`: JSON array of ordered items
  - `total_price`: Total order price
- **Features**:
  - Stores order items as JSON in the database

#### ProductLog

Tracks changes to products.

- **File**: `app/Models/ProductLog.php`
- **Key attributes**:
  - `product_id`: ID of the product
  - `action`: Type of action (created, updated, deleted)
  - `changed_by`: ID of the user who made the change
  - `changes`: JSON array of changes (old and new values)
- **Relationships**:
  - `product()`: Belongs to a Product
  - `changer()`: Belongs to a User (as changed_by)

### Controllers

The application has the following key controllers:

#### ProductController

Handles customer-facing product browsing.

- **File**: `app/Http/Controllers/ProductController.php`
- **Key methods**:
  - `index()`: Displays products to customers

#### CartController

Manages the shopping cart.

- **File**: `app/Http/Controllers/CartController.php`
- **Key methods**:
  - `index()`: Displays the cart
  - `store()`: Adds a product to the cart
  - `update()`: Updates product quantity in the cart
  - `destroy()`: Removes a product from the cart

#### CheckoutController

Handles the checkout process.

- **File**: `app/Http/Controllers/CheckoutController.php`
- **Key methods**:
  - `index()`: Displays the checkout form
  - `store()`: Processes the order
  - `show()`: Displays order confirmation

#### AdminProductController

Manages products in the admin panel.

- **File**: `app/Http/Controllers/admin/AdminProductController.php`
- **Key methods**:
  - `index()`: Lists all products with search functionality
  - `create()`: Shows form to create a new product
  - `store()`: Saves a new product
  - `show()`: Displays a product
  - `edit()`: Shows form to edit a product
  - `update()`: Updates a product
  - `destroy()`: Deletes a product (soft delete)

#### OrderController

Manages orders in the admin panel.

- **File**: `app/Http/Controllers/admin/OrderController.php`
- **Key methods**:
  - `index()`: Lists all orders

#### ProductLogsController

Displays product activity logs in the admin panel.

- **File**: `app/Http/Controllers/admin/ProductLogsController.php`
- **Key methods**:
  - `index()`: Lists all product logs

### Views

The application uses Blade templates for rendering HTML. Key view directories include:

- `resources/views/admin/`: Admin panel views
- `resources/views/components/`: Reusable UI components

### Routes

The application defines routes in `routes/web.php`, organized by middleware groups:

- **Guest routes**: Product browsing and cart management
- **Cart-dependent routes**: Checkout process
- **Auth routes**: User profile management
- **Admin routes**: Product, order, and log management

## Database Schema

The application uses the following database tables:

### products

- `id`: Primary key
- `name`: Product name
- `description`: Product description
- `category`: Product category
- `image`: Path to product image
- `price`: Product price
- `user_id`: Foreign key to users table
- `created_at`: Timestamp
- `updated_at`: Timestamp
- `deleted_at`: Soft delete timestamp

### orders

- `id`: Primary key
- `order_number`: Unique order identifier
- `name`: Customer name
- `phone`: Customer phone number
- `address`: Customer address
- `order_items`: JSON array of ordered items
- `total_price`: Total order price
- `created_at`: Timestamp
- `updated_at`: Timestamp

### product_logs

- `id`: Primary key
- `product_id`: Foreign key to products table
- `action`: Type of action (created, updated, deleted)
- `changed_by`: Foreign key to users table
- `changes`: JSON array of changes
- `created_at`: Timestamp
- `updated_at`: Timestamp

### users

- Standard Laravel users table
- Used for admin authentication

## Authentication and Authorization

The application uses Laravel Breeze for authentication. Admin access is controlled through middleware that checks if the user is authenticated.

## How to Extend

### Adding New Features

To add a new feature to the application:

1. **Plan your feature**: Define what the feature will do and how it will integrate with the existing application
2. **Create or modify models**: If your feature requires new data structures
3. **Create migrations**: If your feature requires database changes
4. **Create or modify controllers**: To handle the business logic
5. **Create or modify views**: To display the feature to users
6. **Add routes**: To make the feature accessible

### Extending Models

To extend an existing model:

1. **Add new attributes**: Update the model's `$fillable` array and create a migration to add the new columns
2. **Add new relationships**: Define new relationship methods in the model
3. **Add new methods**: Add custom methods to the model to encapsulate business logic

Example of extending the Product model:

```php
// Add a new column to the products table
// Create a migration: php artisan make:migration add_is_featured_to_products_table

// In the migration file:
public function up(): void
{
    Schema::table('products', function (Blueprint $table) {
        $table->boolean('is_featured')->default(false);
    });
}

// In the Product model:
protected $fillable = [
    'name',
    'image',
    'price',
    'user_id',
    'description',
    'category',
    'is_featured', // Add the new attribute
];

// Add a scope to find featured products
public function scopeFeatured($query)
{
    return $query->where('is_featured', true);
}
```

### Adding New Controllers

To add a new controller:

1. **Create the controller**: Use Laravel's artisan command
2. **Define methods**: Add methods to handle different actions
3. **Add routes**: Register routes for the controller in `routes/web.php`

Example of creating a new controller:

```bash
php artisan make:controller FeaturedProductController
```

```php
// In the controller:
public function index()
{
    $featuredProducts = Product::featured()->get();
    return view('featured-products', ['products' => $featuredProducts]);
}

// In routes/web.php:
Route::get('/featured', [FeaturedProductController::class, 'index'])->name('products.featured');
```

### Creating New Views

To create a new view:

1. **Create the Blade template**: Create a new file in the `resources/views` directory
2. **Use components**: Leverage existing components for consistency
3. **Add styles**: Use TailwindCSS classes for styling

Example of creating a new view:

```php
// resources/views/featured-products.blade.php
@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Featured Products</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($products as $product)
                @include('components.product-card', ['product' => $product])
            @endforeach
        </div>
    </div>
@endsection
```

# Locations
Add countries, provinces, cities and suburbs to your laravel admin project.
This will allow you to add cities, countries, each with a google map location.

## Installation
Update your project's `composer.json` file.

```bash
composer require bpocallaghan/locations
```

## Usage

Register the routes in the `routes/vendor.php` file.
- Admin
```bash
Route::group(['prefix' => 'locations', 'namespace' => 'Locations'], function () {
    Route::resource('suburbs', 'SuburbsController');
    Route::resource('cities', 'CitiesController');
    Route::resource('provinces', 'ProvincesController');
    Route::resource('countries', 'CountriesController');
});
```

## Commands
```bash
php artisan locations:publish
```
This will copy the `database/seeds` and `database/migrations` to your application.
Remember to add `$this->call(LocationTableSeeder::class);` in the `DatabaseSeeder.php`

```bash
php artisan locations:publish --files=all
```
This will copy the `models, views and controllers` to their respective directories.
Please note when you execute the above command. You need to update your `routes`.
- Admin
```bash
Route::group(['prefix' => 'general/locations', 'namespace' => 'Locations\Controllers\Admin'], function () {
    Route::resource('suburbs', 'SuburbsController');
    Route::resource('cities', 'CitiesController');
    Route::resource('provinces', 'ProvincesController');
    Route::resource('countries', 'CountriesController');
});
```

## Demo
Package is being used at [Laravel Admin Starter](https://github.com/bpocallaghan/laravel-admin-starter) project.

### TODO
- add the navigation seeder information (to create the navigation/urls)
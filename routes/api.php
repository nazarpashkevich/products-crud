<?php

use App\Http\Controllers\ProductController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'products', 'controller' => ProductController::class], function (Router $router) {
    $router->get('', 'index')->name('products.index');
    $router->post('', 'create')->name('products.create');
    $router->get('export-to-csv', 'exportToCsv')->name('products.export-to-csv');
    $router->get('{product}', 'show')->name('products.show');
    $router->put('{product}', 'update')->name('products.update');
    $router->delete('{product}', 'delete')->name('products.delete');
});

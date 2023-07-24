    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\OrderController;
    use App\Http\Controllers\ProductController;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('products', ProductController::class);


    Route::get('/products/import', function () {
        return view('products.import');
    })->name('import.view');



    //Orders

    Route::resource('orders', OrderController::class);

    // Ruta para procesar la importación del archivo CSV
    Route::post('import/products', [ProductController::class, 'import'])->name('import.products');


    //INVENTARIO

    Route::resource('inventories', InventoryController::class);


    Route::get('/orders/{id}/pdf', [OrderController::class, 'downloadPdf'])->name('orders.pdf');


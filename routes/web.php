<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']);

Route::get('evento/visualizar/{id}', [EventController::class, 'show']);

Route::get('evento/adicionar', [EventController::class, 'create'])->middleware('auth');

Route::post('evento/salvar', [EventController::class, 'store'])->middleware('auth');

Route::get('evento/editar/{id}', [EventController::class, 'edit'])->middleware('auth');

Route::put('evento/atualizar/{id}', [EventController::class, 'update'])->middleware('auth');

Route::delete('evento/deletar/{id}', [EventController::class, 'destroy'] )->middleware('auth');

Route::post('evento/participar/{id}', [EventController::class, 'joinEvent'])->middleware('auth');

Route::post('evento/sair/{id}', [EventController::class, 'leaveEvent'])->middleware('auth');

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
    
// });


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

// Route::get('/', function () {
//     $name = "Pedro";
//     $list = [1,2,3,4,5];

//     return view('hello_world', 
//         [
//             'name' => $name,
//             'list' => $list
//         ]
//     );
// });

// Route::get('/contato/{id}', function ($id) {
//     return view('contact', 
//         [
//             'id' => $id,
//         ]
//     );
// });

// Route::get('/cliente', function () {

//     $search = request('busca');

//     return view('client', 
//         [
//             'search' => $search,
//         ]
//     );
// });

// Route::get('/produto/{id?}', function ($id = null) {
//     return view('product', 
//         [
//             'id' => $id,
//         ]
//     );
// });



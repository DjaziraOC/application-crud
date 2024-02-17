<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
| Route::get('/client', [ClientsController::class, 'methodName']);
*/

Route::get('/client',[ClientsController::class,'liste_clients']);
Route::get('/addClients',[ClientsController::class,'addClients']);
Route::post('/addClients/traitement', [ClientsController::class, 'addclient_traitement']);







// Route::get('/', function () {
//     return view('welcome');
// });

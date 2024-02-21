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

// La première route définit une méthode GET pour afficher le formulaire de modification du client.
// Elle pointe vers la méthode edit du contrôleur ClientsController. 
Route::get('/updateClient/{id}',[ClientsController::class,'edit']);
// La deuxième route définit une méthode POST pour traiter la soumission du formulaire de modification du client. 
// Elle pointe vers la méthode updateClient du contrôleur ClientsController.
Route::post('/updateClient/traitement', [ClientsController::class, 'updateClient']);
Route::get('/client',[ClientsController::class,'liste_clients']);
Route::get('/addClients',[ClientsController::class,'addClients']);
Route::post('/addClients/traitement', [ClientsController::class,'addclient_traitement']);









// Route::get('/', function () {
//     return view('welcome');
// });

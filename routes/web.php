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

// La route 1:définit une méthode GET pour afficher le formulaire de modification du client.
// Elle pointe vers la méthode edit du contrôleur ClientsController. 
Route::get('/updateClient/{id}',[ClientsController::class,'edit']);

// La route 2:définit une méthode POST pour traiter la soumission du formulaire de modification du client. 
// Elle pointe vers la méthode updateClient du contrôleur ClientsController.
Route::post('/updateClient/traitement',[ClientsController::class,'updateClient']);

// La route 3:définit une méthode GET pour afficher les client sauvgarder dans la base de donnée.
// Elle pointe vers la méthode liste_clients du contrôleur ClientsController. 
Route::get('/client',[ClientsController::class,'liste_clients']);

// La route 4:définit une méthode GET pour afficher le formulaire de l'ajout du client.
// Elle pointe vers la méthode addClients du contrôleur ClientsController.
Route::get('/addClients',[ClientsController::class,'addClients']);

// La route 5:définit une méthode POST pour traiter la soumission du formulaire de l'ajout du client. 
// Elle pointe vers la méthodeaddclient_traitement du contrôleur ClientsController.
Route::post('/addClients/traitement',[ClientsController::class,'addclient_traitement']);

// La route 6:définit une méthode GET pour supprimer un client de la liste globale des clients.
// Elle pointe vers la méthode deleteClient du contrôleur ClientsController. 
Route::get('/deleteClient/{id}',[ClientsController::class,'deleteClient']);


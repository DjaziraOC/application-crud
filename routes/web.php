<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ArticlesController;
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
/*
|-------------------------------------------------------------------------------------------------
|                                           Clients
|-------------------------------------------------------------------------------------------------
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

// La route 7:définit une méthode GET pour afficher le formulaire de l'image à téléverser.
// Elle pointe vers la méthode getPictureForm du contrôleur ClientsController. 
Route::get('/uploadImage',[ClientsController::class,'showUploadForm']);

// La route 8:définit une méthode POST pour téléverser l'image .
// Elle pointe vers la méthode store du contrôleur ClientsController. 
Route::post('/uploadImage',[ClientsController::class, 'uploadImageStore']);

// La route 8:définit une méthode POST pour téléverser l'image .
// Elle pointe vers la méthode store du contrôleur ClientsController.
Route::get('/images',[ClientsController::class, 'showImage']);

/*
|-------------------------------------------------------------------------------------------------
|                                        Articles
|-------------------------------------------------------------------------------------------------
*/
// La route 1:définit une méthode GET pour afficher le formulaire de l'ajout d'un article.
// Elle pointe vers la méthode addFormArticle du contrôleur ArticlesController.
Route::get('/addArticle',[ArticlesController::class,'addFormArticle']);

// La route 2:définit une méthode POST pour traiter la soumission du formulaire de l'ajout d'un article. 
// Elle pointe vers la méthode createArticle du contrôleur ArticlesController.
Route::post('/addArticle',[ArticlesController::class,'createArticle'])->name('addArticle');;
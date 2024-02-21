<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
//  importer le model de client
use App\Models\client;

class ClientsController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function addClients()
    {
        return view('client.addClient');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addclient_traitement(Request $request)
    {
        // Validation des données entrées par l'utilisateur
        $request->validate([
            'nom' => 'required',
            'ville' => 'required',
            'telephone' => 'required',
        ]);

        // Création d'une nouvelle instance de Client
        $client = new Client();
        $client->nom = $request->nom;
        $client->ville = $request->ville;
        $client->telephone = $request->telephone;

        // Sauvegarde du client dans la base de données
        $client->save();

        // Redirection vers la page d'ajout de clients avec un message de succès
        return redirect('/addClients')->with('status', 'Le client a été ajouté avec succès');
    }

    /**
     * Display a listing of the resource.
     */
    public function liste_clients() //index()
    {
        $clients = client::all(); 
        return view('client.liste',compact('clients'));
        // compact('clients'):Cette fonction crée un tableau associatif avec le nom de la variable 'clients'
        // et ses valeurs correspondantes.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)  
    { 
        // Rechercher le client par son ID et déclencher une erreur 404 si non trouvé
        $client = client::findorfail($id);
        return view('client.updateClient', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateClient(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom'=>'required',
            'ville' =>'required',
            'telephone'=>'required'
        ]);

        // Rechercher le client par son ID et déclencher une erreur 404 si non trouvé
        $client = Client::findOrFail($request->id);

        // Mettre à jour les données du client dans la base de données
        $client->nom = $request->nom;
        $client->ville = $request->ville;
        $client->telephone = $request->telephone;

        // Sauvegarde du client dans la base de données
        $client->save();

        // Redirection vers la page client avec un message de succès
        return redirect('/client')->with('status','Les données du client séléctionné ont été mises à jour avec succès');
    }

    


     /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
       
    // }
}

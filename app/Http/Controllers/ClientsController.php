<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
//  importer le model de client
use App\Models\client;

class ClientsController extends Controller
{
    public function addClients()
    {
        return view('client.addClient');
    }

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

    public function liste_clients() //index()
    {
        $clients = client::all(); 
        return view('client.liste',compact('clients'));
        // compact('clients'):Cette fonction crée un tableau associatif avec le nom de la variable 'clients'
        // et ses valeurs correspondantes.
    }

    public function edit($id)  
    { 
        // Rechercher le client par son ID et déclencher une erreur 404 si non trouvé
        $client = client::findorfail($id);
        return view('client.updateClient', compact('client'));
    }

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

    public function deleteClient($id)
    {
        // Rechercher le client par son ID et déclencher une erreur 404 si non trouvé
        $client = Client::findOrFail($id);
        
        // Supprimer le client
        $client->delete();

        // Redirection vers la page client avec un message de succès
        return redirect('/client')->with('status','Les données du client séléctionné ont été supprimé à jour avec succès');

    }

}

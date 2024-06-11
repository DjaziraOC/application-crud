<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
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
        // return redirect('/client')->with('status','Les données du client séléctionné ont été supprimé à jour avec succès');
    }

    public function showUploadForm()  
    { 
        return view('client.uploadImage');
    }

    // public function  uploadImageStore (Request $request)
    // {
    //     // Valider les données du formulaire
    //     $request->validate([
    //         'image'=>'required|image|max:3048',
    //     ]);
        
    //     if ($request->hasFile('image')){

            // $path = $request->file('image')->store('images', 'public');

            // // Retourner le chemin de l'image stockée
            // return view('client.showImage', ['image' => asset('storage/'. $path)]);
            
    //         // Stocker l'image dans le système de fichiers
    //         $picturePath = $request->file('image')->store('images','public');

    //         // Récupérer l'URL de l'image
    //         $url = Storage::url($picturePath);

    //         // Rediriger vers la vue d'affichage de l'image avec l'URL de l'image
    //         return redirect()->route('showImage', ['url' => $url]);
           

    //         // Redirection vers la page client avec un message de succès
    //         // return redirect('/client')->with('status','l\'image télécharger avec succès');
    //     }else{
    //         // Redirection vers la page client avec un message d'erreur
    //         return redirect()->back()->with('error', 'Veuillez sélectionner une image à télécharger.');
    //     }
    // }
    // public function  showImage ($url){
    //     return view('client.showImage', ['image'=>$url]);
    // }

     /**
     * Store a newly created resource in storage.
     */
  
    // public function pictureStore (Request $request)
    // {
    //     $request->validate([
    //         'image'=>'required|image|max:3048',
    //     ]);

    //     // Récupérer la liste des fichiers d'images dans le répertoire 'public/images'
    //     $files = Storage::files('public/images');

    //     // Transformer les chemins des fichiers en URLs
    //     $imageUrls = array_map(function ($file) {
    //         return asset(Storage::url($file));
    //     }, $files);

    //     // Passer les URLs des images à la vue
    //     return view('article.showArticles', ['image' => $imageUrls]);
    // }
    


    
}

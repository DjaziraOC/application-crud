<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\article;

class ArticlesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function addFormArticle()
    {
        return view('article.addArticle');
    }

    /**
     * Create a new resource.
     */
    public function createArticle(Request $request)
    {
        // Validation des données entrées par l'utilisateur
        $request->validate([
            'nameArticle'=>'required',
            'facturer'=>'required',
            'description'=>'required',
            'mainPepper'=>'required',
            'image'=>'required|image|max:2048',
            'heat'=>'required|integer|min:0|max:10'
        ]);
       
        // Enregistrer l'image dans le répertoire 'public/images'
        if ($request->hasFile('image')) {
            $picturePath= $request->file('image')->store('public/images');
        } else {
            // Gérer le cas où aucune image n'est téléchargée
            return back()->withErrors(['image' => 'Une image est requise.'])->withInput();
        }

        // Transformer le chemin de stockage en URL
        $url = Storage::url($picturePath);

        // Création d'une nouvelle instance de Article avec les données du formulaire
        $article= new article ([
            'nameArticle'=> $request->nameArticle,
            'facturer'=> $request->facturer,
            'description' => $request->description,
            'mainPepper' => $request->mainPepper,
            'image' => $url,// Enregistrer le chemin de l'image dans la base de données
            'heat' => $request->heat
        ]);
        
        // Sauvegarde du client dans la base de données
        $article->save();

        // Redirection vers la page d'ajout de clients avec un message de succès
        return redirect('/displayArticles')->with('success', 'Article ajouté avec succès.');
    }

    /**
     * Display a listing of the resource.
     */
    public function displayArticles()
    {  
        $articles = article::all(); 

        // Récupérer la liste des fichiers d'images dans le répertoire 'public/images'
        $files = Storage::files('public/images');

        // Transformer les chemins des fichiers en URLs
        $imageUrls = array_map(function ($file) {
            return asset(Storage::url($file));
        }, $files);

        // compact('articles'):Cette fonction crée un tableau associatif avec le nom de la variable 'article'
        // et ses valeurs correspondantes.
        return view('article.showArticles',compact('articles', 'imageUrls'));

    }
   
    /**
     * Display the specified resource.
     */
    public function showFormUpdateArticle(string $id)
    {
        // Rechercher le client par son ID et déclencher une erreur 404 si non trouvé
         $article = article::findorfail($id);
         return view('article.updateArticle', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateArticle(Request $request)
    {
         // Validation des données entrées par l'utilisateur
        $request->validate([
            'nameArticle'=>'required',
            'facturer'=>'required',
            'description'=>'required',
            'mainPepper'=>'required',
            'image'=>'required|image|max:2048',
            'heat'=>'required|integer|min:0|max:10'
        ]);

        // Rechercher l'article par son ID et déclencher une erreur 404 si non trouvé
        $article = article::findorfail($request->id);

        // Enregistrer l'image dans le répertoire 'public/images'
        if ($request->hasFile('image')) {
            $picturePath= $request->file('image')->store('public/images');
        } else {
        // Gérer le cas où aucune image n'est téléchargée
            return back()->withErrors(['image' => 'Une image est requise.'])->withInput();
        }

        // Transformer le chemin de stockage en URL
        $urlmodified = Storage::url($picturePath);

        // Mettre à jour les données du client dans la base de données
        $article->nameArticle = $request->nameArticle;
        $article->facturer =$request->facturer;
        $article->description =$request->description;
        $article->mainPepper =$request->mainPepper;
        $article->image= $urlmodified;
        $article->heat =$request->heat;

        // Sauvegarde l'article modifié dans la base de données
        $article->save();

        // Redirection vers la page client avec un message de succès
        return redirect('/displayArticles')->with('status','Les données de l\'article séléctionné ont été mises à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyArticle(Request $request)
    {
        // Rechercher l'article par son ID et déclencher une erreur 404 si non trouvé
        $article= article::findorfail($request->id);

        // le chemin relatif en enlevant la partie de base de l'URL
        $pictureUrl = $article->image;

        // $pictureName = ltrim(parse_url($urlpicture, PHP_URL_PATH), '/storage');
         $pictureName =basename(parse_url( $pictureUrl, PHP_URL_PATH));

        // Chemin relatif complet de l'image dans le répertoire de stockage public
        $picturePath = 'storage/app/public/image/' .  $pictureName;

        // Supprimer l'image du stockage
        if (Storage::disk('public')->exists($picturePath)) {
            Storage::disk('public')->delete($picturePath);
            echo "L'image a été supprimée avec succès.";
        } else {
            echo "L'image n'existe pas.";
        }

  
        // Supprimer l'article
        $article->delete();

        // Redirection vers la page client avec un message de succès
        return redirect('/displayArticles')->with('status','l\'article séléctionné supprimé avec succès');
    } 

     /**
     * Store a newly created resource in storage.
     */
  
    public function pictureStore (Request $request)
    {
        // Récupérer la liste des fichiers d'images dans le répertoire 'public/images'
        $files = Storage::files('public/picturs');

        // Transformer les chemins des fichiers en URLs
        $imageUrls = array_map(function ($file) {
            return asset(Storage::url($file));
        }, $files);

        // Passer les URLs des images à la vue
        return view('article.showArticles', $imageUrls);
    }

}


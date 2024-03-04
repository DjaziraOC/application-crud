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
            'image' =>$url,// Enregistrer le chemin de l'image dans la base de données
            'heat' => $request->heat
        ]);
        
        // Sauvegarde du client dans la base de données
        $article->save();

        // Redirection vers la page d'ajout de clients avec un message de succès
        return redirect('/')->with('success', 'Article ajouté avec succès.');
    }

    /**
     * Display a listing of the resource.
     */
    public function displayArticles()
    {  
        $articles = article::all(); 
        // compact('articles'):Cette fonction crée un tableau associatif avec le nom de la variable 'article'
        // et ses valeurs correspondantes.
        return view('article.showArticles',compact('articles'));
    }
   





    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD IN LARAVEL 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col">
          <hr>
            <h1 class="mt-5">Ajouter un article</h1>
     
         <hr>
            <form class="row  mb-3"  action="/addArticle" method="POST" enctype="multipart/form-data">
              @csrf
              @method('POST')
                <div class="row mb-3">
                    <label for="nameArticle" class="col-sm-2 col-form-label" required>Nom</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="nameArticle" name="nameArticle">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="facturer" class="col-sm-2 col-form-label">Fabricant</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="facturer" name="facturer">
                    </div>
                </div>
                 <div class="row mb-3">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-7">
                      <textarea id="description"  class="form-control" name="description"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="mainPepper" class="col-sm-2 col-form-label">Ingrédients</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="mainPepper" name="mainPepper">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label" >Image</label>
                    <div class="col-sm-7">
                      <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                  </div>
                <div class="row mb-3">
                    <label for="heat" class="col-sm-2 col-form-label">Piquants</label>
                    <div class="col-sm-7">
                        <input type="range" class="form-range"  min="0" max="10" id="heat" name="heat">
                    </div>
                </div>
                <div class="col-12"> 
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                    <a href="/" type="submit" class="btn btn-danger">Annuler</a> 
                </div>
            </form>
          <hr>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
  </body>
</html>
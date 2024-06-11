<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD IN LARAVEL 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
  </head>
  <!-- Responsive navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
      <a class="navbar-brand" href="/displayArticles"> HOT TAKES</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">          
              <li class="nav-item"><a class="nav-link" href="/displayArticles">SAUCES</a></li>
              <li class="nav-item"><a class="nav-link" href="/">LOGOUT</a></li>
          </ul>
      </div>
    </div>
  </nav>
  <!-- Page Content-->
  <body>
    <div class="container" style="min-height: 100vh;">
      <div class="row">
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
                    <div class="col-sm-7" text-center>
                      <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                  </div>
                <div class="row mb-3">
                    <label for="heat" class="col-sm-2 col-form-label">Piquants</label>
                    <div class="col-sm-7" style="margin-top:40px;">
                        <input type="range" class="form-range"  min="1" max="10" id="heat" name="heat">
                    </div>
                </div>
                <div class="col-12"> 
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                    <a href="/displayArticles" type="submit" class="btn btn-danger">Annuler</a> 
                </div>
            </form>
          <hr>
      </div>
    </div>
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-4 px-lg-5">
          <p class="m-0 text-center text-white">Copyright &copy; Your Website 2024</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>
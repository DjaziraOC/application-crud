<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD IN LARAVEL 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col">
          <hr>
            <h1 class="mt-5"> Télécharger une image</h1>
            @if(session('error'))
              <div class="alert alert-success">{{session('error')}}</div>
            @endif
          <hr>
            <form class="row g-3" action="/uploadImage" method="POST" enctype="multipart/form-data" >
              @csrf
              @method('POST')
              <div class="col-md-6">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
              </div>
              <div class="col-12">
                <button type="submit"class="btn btn-primary">Télécharger</button>
                <a href="/client" type="submit" class="btn btn-danger">Annuler</a>
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
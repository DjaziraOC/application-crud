
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD IN LARAVEL 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <style>
      .row-gap { margin-bottom: 3px; }
    </style>
</head>
<body>
<div class="container">
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
    @foreach($articles as $article)
    <div class="col mb-4">
      <div class="card">
        <img src="{{$article->image}}" class="card-img-top" alt="image de la sauce">
        <div class="card-body">
          <h5 class="card-title">{{$article->nameArticle}}</h5>
          <label for="heat">Piquants</label>
          <input type="text" id="heat" name="heat" value="{{$article->heat}}" class="form-control" readonly>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>

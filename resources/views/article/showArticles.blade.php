
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
  <!-- Responsive navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
      <a class="navbar-brand" href="/addArticle"> ADD SAUCES</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">          
              <li class="nav-item"><a class="nav-link" href="/client">CLIENTS</a></li>
              <li class="nav-item"><a class="nav-link" href="/">LOGOUT</a></li>
          </ul>
      </div>
    </div>
  </nav>
  <!-- Page Content-->
  <div class="container px-4 px-lg-5">
      <!-- Call to Action-->
      <div class="card text-white bg-secondary my-5 py-4 text-center">
          <div class="card-body"><p class="text-white m-0">This call to action card is a great place to showcase some important information or display a clever tagline!</p></div>
      </div>
      <!-- Content Row-->
  </div>
  <div class="container "  style="min-height: 100vh;">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
      @foreach($articles as $article)
        <a href="/updateArticle/{{$article->id}}" style=" text-decoration: none;">
          <div class="col mb-4">
            <div class="card">
              <img src="{{$article->image}}" class="card-img-top" alt="image de la sauce piquate sauce 1" style="width:300px;height:300px; align-items: center;">
              <div class="card-body">
                <h5 class="card-title">{{$article->nameArticle}}</h5>
                <p class="card-paragraph">Piquants: {{$article->heat}}/10</p>
              </div>  
            </div>
          </div>
        </a> 
      @endforeach
    </div>
  </div> 
  <!-- Footer-->
  <footer class="py-5 bg-dark">
      <div class="container px-4 px-lg-5"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2024</p></div>
  </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <title>Show Image</title>
</head>
<body>
    <h1>Image</h1>
    @foreach ($imageUrls as $imageUrl)
    <img src="{{ $imageUrl }}" alt="Image">
    @endforeach

        <!-- <div class="carousel slide">
          <div class="carousel-indicators">
              @foreach($articles as $key => $article)
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}" aria-label="Slide {{ $key + 1 }}"></button>
              @endforeach
          </div>
          <div class="carousel-inner">
              @foreach($articles as $key => $article)
                  <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                      <img class="img-fluid rounded mb-4 mb-lg-0" src="{{ $imageUrls[$key] }}" alt="Les images des articles affiché sur la page accueil" />
                  </div>
              @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
          </button>
        </div> -->



</body>
</html>

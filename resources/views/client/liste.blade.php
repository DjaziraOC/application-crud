<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD IN LARAVEL 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- <style>
      .custom-bg:nth-child(odd) {
        background-color:gray; /* Couleur de fond pour les colonnes impaires */
      }
      .custom-bg:nth-child(even) {
        background-color:darkcyan; /* Couleur de fond pour les colonnes paires */
      }
    </style> -->
  </head>
  <body>
    <div class="container text-center">
      <div class="row">
        <div class="col">
          <hr>
            <h1 class="mt-5">CRUD IN LARAVEL 10</h1>
          <hr>
            @if(session('status'))
              <div class="alert alert-success">{{session('status')}} </div>
            @endif
            <a href="/addClients" class="btn btn-primary" style="background-color:darkcyan;float:right;margin-bottom:20px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0"/>
              </svg>
            </a>
            <table class="table  table-bordered ">
              <thead>
                <tr>
                  <th class="col">ID</th>
                  <th class="col-3 custom-bg">Nom</th>
                  <th class="col-3">Ville</th>
                  <th class="col-3 custom-bg">Téléphone</th>
                  <th class="col">Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($clients as $client)
                <tr>
                  <td scope="row">{{ $client->id}}</td>
                  <td>{{ $client->nom }}</td>
                  <td>{{ $client->ville }}</td>
                  <td>{{ $client->telephone}}
                  <td>
              <!-- Bouton pour ouvrir le modal -->
                    <a href="/updateClient/{{$client->id}}"  class="btn"  style="background-color:darkcyan;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                      </svg>
                    </a>
              <!-- Bouton pour ouvrir le modal -->
                    <button type="button" class="btn btn-danger"  data-bs-toggle="modal"  data-bs-target="#deleteModal{{$client->id}}">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                      </svg>
                    </button>
                  </td>
                </tr>  
                <div class="modal fade" id="deleteModal{{$client->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Voulez vous vraient supprimer ce client?
                      </div>
                      <div class="modal-footer">
                        <a href="/client" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</a>
                        <a href="/deleteClient/{{$client->id}}" type="button" class="btn btn-danger">Supprimer</a>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </table>
        </div>
        <hr>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
  </body>
</html>
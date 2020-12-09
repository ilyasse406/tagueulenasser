<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="{{ route('welcome') }}">Welcome <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route("article.index") }}">article</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route("backoffice") }}">Back Office</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class=" btn btn-danger underline text-sm text-gray-600 hover:text-gray-900">
                            {{ __('Logout') }}
                        </button>
                    </form>
                </li>
                
            </div>
          </nav>
    </header>



    <div class="container">
      <div class="text-center mb-5">
          <h1>Article</h1>
  
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Create
          </button>
  
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Création d'user</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form action="{{ route('article.store') }}" method="POST">
  
                              @csrf
  
                              @if ($errors->any())
                                  <div class="alert alert-danger">
                                      <ul>
                                          @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                          @endforeach
                                      </ul>
                                  </div>
                              @endif
  
  
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Nom de l'article</label>
                                  <input type="text" class="form-control" id="exampleInputPassword1" name="name">
                              </div>
  
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Description</label>
                                  <input type="text" class="form-control" id="exampleInputPassword1" name="description">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Stock</label>
                                  <input type="number" class="form-control" id="exampleInputPassword1" name="stock">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Prix Unitaire</label>
                                  <input type="text" class="form-control" id="exampleInputPassword1" name="prix">
                              </div>
                              
                              
  
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                      </div>
  
                  </div>
              </div>
          </div>
  
      </div>
  
      {{-- fin modal --}}



      <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom de l'article</th>
                <th scope="col">Déscription</th>
                <th scope="col">Stock</th>
                <th scope="col">Prix</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $e)
                <tr>
                    <th scope="row">{{ $e->id }}</th>
                    <td>{{ $e->name }}</td>
                    <td>{{ $e->description }}</td>
                    <td>{{ $e->stock }}</td>
                    <td>{{ $e->prix }}$</td>
                    <td class="d-flex">
                        <button type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#exampleModal-{{ $e->id }}">
                            edit
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal-{{ $e->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modification de l'article</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/article/{{ $e->id }}" method="POST">
                                            @method("put")

                                            @csrf

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif


                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Nom de l'article</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1"
                                                    name="name" value="{{ $e->name }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Déscription</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1"
                                                    name="description" value="{{ $e->description }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Stock</label>
                                                <input type="number" class="form-control" id="exampleInputPassword1"
                                                    name="stock" value="{{ $e->stock }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Prix</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1"
                                                    name="prix" value="{{ $e->prix }}">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

</div>

{{-- fin modal --}}








<form action="/article/{{ $e->id }}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger ml-2" type="submit">Delete</button>

</form>



</td>

</tr>

@endforeach

</tbody>
</table>




</div>































</body>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




</html>
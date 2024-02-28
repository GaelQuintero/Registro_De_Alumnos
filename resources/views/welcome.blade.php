<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Registro de alumnos</title>
</head>
<body>
    <h1 class="text-center p-4">Alumnos</h1>
</br>
    
<div class="p-5 table-responsive-sm">
<table class="table table-dark-emphasis table-striped table-bordered border-white-50">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Matricula &nbsp <i class="fa-solid fa-list-ol"></i></th>
      <th scope="col">Nombre &nbsp <i class="fa-solid fa-user"></i></th>
      <th scope="col">Edad &nbsp <i class="fa-solid fa-cake-candles"></i></th>
      <th scope="col">Localidad &nbsp <i class="fa-solid fa-location-dot"></i></th>
      <th scope="col">Cuatrimestre &nbsp <i class="fa-solid fa-graduation-cap"></i></th>
      <th scope="col"> Editar &nbsp <i class="fa-solid fa-pen-to-square"></i></th>
      <th scope="col"> Borrar &nbsp <i class="fa-solid fa-user-xmark"></i></th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
  @foreach ($datos as $item)
    <tr>
      <th>{{$item -> idAlumno}}</th>
      <td>{{$item -> Matricula}}</td>
      <td>{{$item -> Nombre}}</td>
      <td>{{$item -> Edad}}</td>
      <td>{{$item -> Localidad}}</td>
      <td>{{$item -> Cuatrimestre}}</td>
      <td class="text-center"><a href="" class="btn btn-primary btn-sm rounded-5"><i class="fa-solid fa-user-pen"></i></a></td>
      <td class="text-center"><a href="" class="btn btn-danger btn-sm rounded-5"><i class="fa-solid fa-trash"></i></a></td>
    </tr>
    @endforeach
  </tbody>
  <caption class="text-center">Lista de alumnos</caption>
</table>

</div>
    <!-- CDN Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- CDN FontAwesome -->
    <script src="https://kit.fontawesome.com/b15e99318d.js" crossorigin="anonymous"></script>
  </body>
</html>
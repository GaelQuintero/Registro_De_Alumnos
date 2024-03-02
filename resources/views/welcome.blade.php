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
    @if (session("correcto"))
    <div class="alert alert-success"> {{session("correcto")}}</div>
    @endif 

    @if (session("incorrecto"))
    <div class="alert alert-danger"> {{session("incorrecto")}}</div>
    @endif 

   <script>
    var res=function(){
      var not=confirm("¿Estas seguro de eliminar?");
      return not;
    }
   </script>
 
</br>
    
<div class="p-5 table-responsive-sm">
  <button type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Añadir Alumno</button>
  <!-- Modal -->
<div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registar Alumno</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{ route("crud.create") }}" method="POST">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Matricula</label>
    <input type="text" class="form-control" id="Matricula" aria-describedby="emailHelp"  name="Matricula">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="Nombre" name="Nombre">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Edad</label>
    <input type="text" class="form-control" id="Edad" name="Edad">
  </div><div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Localidad</label>
    <input type="text" class="form-control" id="Localidad" name="Localidad">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Cuatrimestre</label>
    <input type="text" class="form-control" id="Cuatrimestre" name="Cuatrimestre">
  </div>
 
  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
</form>
      </div>
      
    </div>
  </div>
</div>
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
      <td class="text-center"><a href=""  data-bs-toggle="modal" data-bs-target="#modalEditar{{$item -> Matricula}}"class="btn btn-primary btn-sm rounded-5"><i class="fa-solid fa-user-pen"></i></a></td>
      <td class="text-center"><a href="{{route("crud.delete", $item -> idAlumno)}}" onclick="return res()" class="btn btn-danger btn-sm rounded-5"><i class="fa-solid fa-trash"></i></a></td>



    
   
<!-- Modal -->
<div class="modal fade" id="modalEditar{{$item -> Matricula}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Datos del Alumno</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route("crud.update")}}" method="post" >
        @csrf
        
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Matricula</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="Matricula" value="{{$item->Matricula}}" readonly>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="Nombre" value="{{$item->Nombre}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Edad</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="Edad" value="{{$item->Edad}}">
  </div><div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Localidad</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="Localidad" value="{{$item->Localidad}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Cuatrimestre</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="Cuatrimestre" value="{{$item->Cuatrimestre}}">
  </div>
 
  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Modificar</button>
      </div>
</form>
      </div>
      
    </div>
  </div>
</div>
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
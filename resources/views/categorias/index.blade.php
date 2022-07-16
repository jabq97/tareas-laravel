@extends('app')

@section('content')
<div class="container w-25 border p-4 my-4">
    <div class="row mx-auto">
        <form action="{{ route('categorias.update', ['categoria' => $categoria->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success')}}</h6>
            @endif
    
            @error('name')
            <h6 class="alert alert-danger">{{  $message }}</h6>
            @enderror
            <div class="mb-3">
              <label for="name" class="form-label">Nombre de la categoria</label>
              <input type="text" name="name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="color" class="form-label">Color de la categoria</label>
                <input type="color" name="color" class="form-control">
              </div>
            <button type="submit" class="btn btn-primary">Crear nueva categoria</button>
          </form>

<div>
    @foreach ($categorias as $categoria)
    <div class="row py-1">
        <div class="col-md-9 d-flex align-items-center">
            <a href=" {{ route('categorias.show', ['categoria' => $categoria->id]) }}" class="d-flex align-items-center gap-2">
            <span class="color-container" style="background-color: {{ $categoria->color}} "></span>{{ $categoria->name }}  
            </a>
        </div>
        <div class="col-md-3 d-flex justyfy-content-end">
            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{$categoria->id}}">Eliminar</button>
        </div>
    </div>
    
   <!-- Modal -->
<div class="modal fade" id="modal-{{$categoria->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Al eliminar la categoria <strong>{{ $categoria->name}}</strong> se eliminaran todas las tareas.
          ¿Esta seguro que desea eliminar la categoria <strong>{{ $categoria->name}}</strong> ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form action="{{ route('categorias.destroy', ['categoria' => $categoria->id])}}"> 
            @method('DELETE')
            @csrf
               <button type="button" class="btn btn-danger">Eliminar</button>
          </form>

       
        </div>
      </div>
    </div>
  </div>
        
    @endforeach
</div>


    </div>
</div>


@endsection
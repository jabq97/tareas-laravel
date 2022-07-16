@extends('app')

@section('content')
@extends('app')

@section('content')
<div class="container w-25 border p-4 my-4">
    <div class="row mx-auto">
        <form action="{{ route('categorias.update')}}" method="POST">
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
            <button type="submit" class="btn btn-primary">Actualizar categoria</button>
          </form>
         
         <div>
          @if ($categoria->todos->count() > 0)
          <div class="row py-1">
            <div class="col-md-9 d-flex align-items-center">
              <a href="{{ route('todos-edit',['id' => $todo->id]) }}">{{ $todo->title }}</a>
            </div>
            <div class="col-md-3 d-flex justify-content-end">
              <form action="{{ route('todos-destroy'), [$todo->id] }}" method="POST"></form>
              @method('DELETE')
              @csrf
              <button class="btn btn-danger btn-sm">Eliminar</button>
            </div>
          </div>

          @else

          No hay tareas para esta categoria

          @endif
         </div>
          
    </div>
</div>

@endsection


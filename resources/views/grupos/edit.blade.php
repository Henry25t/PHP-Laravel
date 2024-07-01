@extends('layouts.app')

@section('content')
    <h1>Editar grupo</h1>
    <form action="{{ route('grupos.update', $grupo->id) }}" method="POST">
        @csrf
        <di class="row">
            <div class="col-md-4">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" 
                name="nombre" value="{{ $grupo->nombre }}" require>
            </div>
        </di>
        <div class="row">
            <div class="col-md-6">
                <label for="description" class="form-label">Descripcion</label>
                <textarea class="form-control" id="description" 
                name="description">{{ $grupo->description }}</textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Modificar</button>
                <a href="{{ route('grupos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>  
        </div>
    </form>
@endsection 
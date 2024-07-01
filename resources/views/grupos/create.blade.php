@extends('layouts.app')

@section('content')
    <h1>Crear nuevo grupo</h1>
    <form action="{{ route('grupos.store')}}" method="POST">
        @csrf
        <di class="row">
            <div class="col-md-4">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" require>
            </div>
        </di>
        <div class="row">
            <div class="col-md-6">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Crear</button>
                <a href="{{ route('grupos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>
    </form>
@endsection
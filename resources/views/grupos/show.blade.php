@extends('layouts.app')

@section('content')
    <h1>Ver grupo</h1>
    <div class="row">
        <div class="col-md-4">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" 
                value="{{ $grupo->nombre }}" disabled>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" id="description" 
                name="description" disabled>{{ $grupo->description }}
            </textarea>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('grupos.index') }}" class="btn btn-primary">Retornar</a>
        </div>
    </div>
@endSection
@extends('layouts.app_admin')

@section('content')

<!DOCTYPE html>
<html>
    <head>
        <title>Inicio</title>
    </head>

    <body>
        <table class = "table table-striped">
            <thead>
                <tr>
                    <th>Categoría</th>
                    <th>Encargado</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                
                @foreach ($categoriesInfo as $info)
                    <tr>
                        <td>{{$info->categoryName}}</td>
                        <td>{{$info->userName}}</td>
                        <td>
                            <button class="btn btn-warning" type="button" title="Editar"
                            onclick="window.location='{{ route('categories.index') }}';">
                             <i class="fas fa-pencil-alt"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>

@endsection

{{-- @section('content')
    <div id="content">
        <div class="card mb-3">
            <div class="card-header">
                Profesores
            </div>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="/adminpanel/profesores" class="btn btn-primary">Ir a Profesores</a>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                Reportes
            </div>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Ver reportes</a>
            </div>
        </div>
    </div>
@endsection
 --}}
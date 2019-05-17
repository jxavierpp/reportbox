@extends('layouts.app_admin')

@section('titulo', 'Encargados')

@section('content')

<!DOCTYPE html>
<html>

    <div id="content">
        <div class="card">
            <div class="card-header">
                <h4><strong>Lista de Encargados</strong></h4>
            </div>

            <div class="card-body">
                <table class = "table table-striped">
                    <tr>
                        <th>Categoría</th>
                        <th>Encargado</th>
                        <th>Acciones</th>
                    </tr>
                        
                    @foreach ($categoriesInfo as $info)
                        <tr>
                            <td>{{$info->categoryName}}</td>

                            @if($info->userName != null)
                                <td>{{$info->userName}}</td>
                            @else
                                <td>Sin asignar</td>
                            @endif

                            <td>
                                <button class="btn btn-warning" type="button" 
                                title="Editar" 
                                onclick="window.location='{{ url('adminpanel/encargados/edit/'.$info->userID) }}';">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</html>

@endsection
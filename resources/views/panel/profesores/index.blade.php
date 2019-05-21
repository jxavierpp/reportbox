@extends('layouts.app_admin')

@section('content')
    <div id="content">
        <div class="card">
            <div class="card-header">
               <h4><strong>Administrador</strong></h4>
           </div>
           <div class="card">
                <table class="table table-striped">
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <?php if($usuario->rol == 0){
                                ?>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>
                                @csrf
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button class="btn btn-warning" type="button" title="Editar" onclick="window.location='{{ url('adminpanel/profesores/edit/'.$usuario->id) }}';">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                </div>
                            </td>
                            <?php
                            }
                            ?>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <br></br>
        <div class="card">
            <div class="card-header">
                <h4 style="position: absolute;"><strong>Lista de Profesores</strong></h4>
                <a href="{{ URL::to('adminpanel/profesores/create') }}">
                    <button type="button" class="btn btn-sm btn-primary float-right">Registrar Profesor</button>
                </a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <?php if($usuario->rol == 1){
                                ?>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>
                                @csrf
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button class="btn btn-warning" type="button" title="Editar" onclick="window.location='{{ url('adminpanel/profesores/edit/'.$usuario->id) }}';">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <form action="{{ url('adminpanel/profesores/'.$usuario->id) }}" method="POST">
                                        {{csrf_field()}}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger" type="submit" title="Borrar" onclick="
                                        return confirm('¿Estás seguro? ¡Esta acción eliminará a este profesor!')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <?php
                            }
                            ?>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

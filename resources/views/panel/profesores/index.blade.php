@extends('layouts.app_admin')

@section('content')
    <div id="content">
        <div class="card">
            <div class="card-header">
                <h4 style="position: absolute;"><strong>Lista de Profesores</strong></h4>
                <a href="{{ URL::to('register') }}">
                    <button type="button" class="btn btn-sm btn-primary float-right">Registrar Profesor</button>
                </a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Categoria Asignada</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>la categoria</td>
                            <td>
                                @csrf
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button class="btn btn-warning" type="button" title="Editar" onclick="window.location='{{ url('adminpanel/profesores/edit/'.$usuario->id) }}';">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <form action="{{ url('adminpanel/profesores/'.$usuario->id) }}" method="POST">
                                        {{csrf_field()}}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger" type="submit" title="Borrar">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                                {{-- <a href="{{ route("publicaciones.index1", $usuario->id) }}" class="btn btn-sm btn-success float-left" style="margin-right: 5px">Produccion Academica</span></a>
                                <a href="{{ route("profesores.edit", $usuario->id) }}" class="btn btn-sm btn-info float-left" style="margin-right: 5px">Editar</span></a> --}}
                                {{-- <div>
                                    {!! Form::open(['route'=>['profesores.destroy', $usuario->id], 'method'=>'DELETE']) !!}
                                        <button name="submit" type="submit" class="btn btn-sm btn-danger float-left" style="margin-right: 5px">Borrar</button>
                                    {!! Form::close() !!}
                                </div> --}}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

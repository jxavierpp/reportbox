@extends('layouts.app_admin')

@section('content')
    <div id="content">
        <div class="card">
            <div class="card-header">
                <h4 style="position: absolute;"><strong>Evidencias del Plan de Acción Seleccionado</strong></h4>
                <div class="float-right">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalCreate">Subir Evidencia</button>
                </div>
            </div>
            <div class="card-body">
                @if(!($evidencias->isEmpty()))
                    <table class="table table-striped">
                        <tr>
                            <th>Nombre</th>
                            <th>Formato</th>
                            <th>Tamaño</th>
                            <th>Fecha de Creación</th>
                            <th>Acciones</th>
                        </tr>
                        @foreach ($evidencias as $evidencia)
                            <tr>
                                <td>{{ $evidencia->name }}</td>
                                <td>{{ $evidencia->format }}</td>
                                <td>{{ $evidencia->size }} KB</td>
                                <td>{{ Carbon::parse($evidencia->created_at)->toDayDateTimeString() }}</td>
                                <td>
                                    @csrf
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-warning" type="button" title="Visualizar" href="{{url('/').$evidencia->url}}" target="_blank" > <i class="fas fa-eye"></i> </a>
                                        
                                        <form action="{{ url('/adminpanel/evidencias/'.$evidencia->id) }}" method="POST">
                                            {{csrf_field()}}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger" type="submit" title="Borrar" onclick="return confirm('¿Estás seguro? Esta acción eliminará la imagen.')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <div class="alert alert-warning" role="alert">
                        No hay Reportes para mostrar.
                    </div>
                @endif
                <button class="btn btn-secondary" title="Atras" onclick="window.location='{{ url('/adminpanel/formulario/'.$registro->categoria) }}';">Regresar</button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Nueva Evidencia</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form center">
                    <form action="/adminpanel/evidencias/store" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="centered">
                            <input type="file" class="form-control" name="file" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <input name="registro_id" type="hidden" value="{{ Request()->id }}">
                        @include('commons.errors')
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection

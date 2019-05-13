@extends('layouts.app')

@section('content')
    <div id="content">
        <div class="card">
            <div class="card-header title">
                <h4><strong>Editar profesor</strong></h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action={{ url('formulario/'.$registro->id) }} method="POST">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                                <input type="text" class="form-control" name="nombre" value="{{ $usuario->nombre }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $usuario->email }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <!-- Display validation errors -->
                            @include('commons.errors')
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-secondary" onclick="window.location='{{ url('adminpanel/profesores') }}';">Cancelar</button>
                </form>	
            </div>
        </div>
    </div>
@endsection

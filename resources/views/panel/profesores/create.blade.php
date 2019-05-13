@extends('layouts.app_admin')

@section('content')
    <div id="content">
        <div class="card">
            <div class="card-header title">
                <h4><strong>Añadir nuevo profesor</strong></h4>
            </div>

            <div class="card-body">
                <form action={{ url('/adminpanel/profesores/store') }} method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contrasena</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <!-- Display validation errors -->
                    @include('commons.errors')
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-secondary" onclick="window.location='{{ url('adminpanel/profesores') }}';">Cancelar</button>
                </form>	
            </div>
        </div>
    </div>
@endsection

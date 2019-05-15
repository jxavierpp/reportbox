@extends('layouts.app_admin')

@section('content')
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
                <a href="/panel/reportes" class="btn btn-primary">Ir a reportes</a>
            </div>
        </div>
    </div>
@endsection

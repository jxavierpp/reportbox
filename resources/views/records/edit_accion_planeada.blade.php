@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 offset-md-1">
			<div class="card ">
				<h5 class="card-header">Editar Accion Planeada</h5>

				<div class="card-body">
                    <form action={{ url('formulario/store_ap/'.$registro->id) }} method="POST">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Accion Planeada</label>
                            <input type="text" class="form-control" name="accion_planeada" value="{{ $registro->accion_planeada }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ejecucion en Meses</label>
                            <input type="number" class="form-control" name="duracion" value="{{ $registro->duracion }}" min="1" max="48">
                        </div>
                        <!-- Display validation errors -->
                        @include('commons.errors')
				</div>
				<div class="card-footer text-muted">
					<button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" onclick="window.location='{{ url('formulario') }}';">Cancelar</button>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

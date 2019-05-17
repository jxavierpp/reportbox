@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 offset-md-1">
			<div class="card ">
				<h5 class="card-header">Editar Recomendación</h5>

				<div class="card-body">
                    <form action={{ url('formulario/'.$registro->id) }} method="POST">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Identificador</label>
                            <input type="text" class="form-control" name="identificador" value="{{ $registro->version }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Recomendación</label>
                            <input type="text" class="form-control" name="recomendacion" value="{{ $registro->recomendacion }}">
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

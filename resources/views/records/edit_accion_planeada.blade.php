@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 offset-md-1">
			<div class="card ">
				<h5 class="card-header">Editar Acción Planeada</h5>

				<div class="card-body">
                    <form action={{ url('formulario/store_ap/'.$registro->id) }} method="POST" enctype="multipart/form/data">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Acción Planeada</label>
                            <input type="text" class="form-control" @error('accion_planeada') is-invalid @enderror name="accion_planeada" value="{{ $registro->accion_planeada }}" required autocomplete="accion_planeada" autofocus>
                            @error('accion_planeada')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label>Fecha límite</label>
                            <input id="datepicker" class="form-control" @error('duracion') is-invalid @enderror name="duracion" value="{{$registro->duracion}}" required autocomplete="duracion">
                            @error('duracion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <script>
                            $('#datepicker').datepicker({
                                format: "dd/mm/yy",
                                language: "es"
                                });
                        </script>
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

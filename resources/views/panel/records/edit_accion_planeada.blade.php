@extends('layouts.app_admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 pb-3 pt-3">
			<div class="card ">
				<h5 class="card-header">Editar Acción Planeada</h5>

				<div class="card-body">
                    <form action={{ url('adminpanel/formulario/store_ap2/'.$registro->id) }} method="POST">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Accion Planeada</label>
                            <input type="text" class="form-control" @error('accion_planeada') is-invalid @enderror name="accion_planeada" value="{{ $registro->accion_planeada }}" required autocomplete="accion_planeada">
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
                    <button type="submit" class="btn btn-secondary" onclick="window.location='{{ url('formulario/' .$registro->id) }}';">Cancelar</button>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

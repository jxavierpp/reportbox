@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 offset-md-1 pb-5">
			<div class="card">
				<h5 class="card-header">Categoría - {{ $nombre_categoria }}</h5>
				<div class="card-body">
					<div class="card mb-3">
						<h5 class="card-header">Recomendaciones
							<div class="pb-2 float-right">
								<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalCreate">Agregar Recomendación</button>
							</div>
						</h5>
						<div class="card-body">
							@if(!($registros->isEmpty()))
								<table class="table table-striped">
									<thead>
										<tr>
											<th scope="col">Identificador</th>
											<th scope="col">Recomendación</th>
											<th scope="col">Acciones</th>
										</tr>
									</thead>
									<tbody>
										@foreach($registros as $registro)
											<tr>
												<th scope="row">{{ $registro->version }}</th>
												<td>{{ $registro->recomendacion }}</td>
												<td>
													@csrf
													<div class="btn-group" role="group" aria-label="Basic example">
														<button class="btn btn-warning" type="button" title="Editar" onclick="window.location='{{ url('formulario/edit/'.$registro->id) }}';">
															<i class="fas fa-pencil-alt"></i>
														</button>
														<form action="{{ url('formulario1/'.$registro->id) }}" method="POST">
															{{csrf_field()}}
															{{ method_field('DELETE') }}
															<button class="btn btn-danger" type="submit" title="Borrar" onclick="
															return confirm('¿Estás seguro? Esta acción eliminará todas las evidencias asociadas a esta recomendación.')">
																<i class="fas fa-trash-alt"></i>
															</button>
														</form>
													</div>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							@else
								<div class="alert alert-warning" role="alert">
									No hay Recomendaciones para mostrar.
								</div>
							@endif
						</div>
					</div>
					<div class="card">
						<h5 class="card-header">Acciones Planeadas</h5>
						<div class="card-body">
							@if(!($registros->isEmpty()))
								<table class="table table-striped">
									<thead>
										<tr>
											<th scope="col">Identificador</th>
                      						<th scope="col">Acción Planeada</th>
											<th scope="col">Fecha límite</th>
											<th scope="col">Acciones</th>
										</tr>
									</thead>
									<tbody>
										@foreach($registros as $registro)
											<tr>
												<th scope="row">{{ $registro->version }}</th>
												<td>{{ $registro->accion_planeada }}</td>
												<td>{{ $registro->duracion }}</td>
												<td>
													@csrf
													<div class="btn-group" role="group" aria-label="Basic example">
														<button class="btn btn-warning" type="button" title="Editar" onclick="window.location='{{ url('formulario/edit_ap/'.$registro->id) }}';">
															<i class="fas fa-pencil-alt"></i>
														</button>
														@if($registro->duracion != "En espera de ser capturado.")
															<form action="{{ url('formulario2/'.$registro->id) }}" method="POST">
																{{csrf_field()}}
																{{ method_field('DELETE') }}
																<button class="btn btn-danger" type="submit" title="Borrar">
																	<i class="fas fa-trash-alt"></i>
																</button>
															</form>
														@endif
                										<button class="btn btn-dark" type="button" title="Evidencias" onclick="window.location='{{ url('/evidencias/'.$registro->id) }}';">
															<i class="far fa-copy"></i>
														</button>
													</div>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							@else
								<div class="alert alert-warning" role="alert">
									No hay Planes de Acción para mostrar.
								</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header text-center">
			<h4 class="modal-title w-100 font-weight-bold">Nueva Recomendación</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body mx-3">
			<div class="md-form mb-5">
				<form action="/formulario/store" method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="exampleInputEmail1">Identificador</label>
						<input type="text" class="form-control" @error('identificador') is-invalid @enderror name="identificador" required autofocus="identificador">
						@error('identificador')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Recomendación</label>
						<input type="text" class="form-control" @error('recomendacion') is-invalid @enderror name="recomendacion" required autocomplete="recomendacion">
						@error('recomendacion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
				@include('commons.errors')
			</div>
		</div>
		<div class="modal-footer d-flex justify-content-center">
			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</form>
	</div>
</div>

@endsection

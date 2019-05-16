@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 offset-md-1 pb-5">
			<div class="card ">
				<h5 class="card-header">Categoria</h5>
				<div class="card-body">
					<div class="card mb-3">
						<h5 class="card-header">Recomendaciones</h5>
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
														<form action="{{ url('formulario/'.$registro->id) }}" method="POST">
															{{csrf_field()}}
															{{ method_field('DELETE') }}
															<button class="btn btn-danger" type="submit" title="Borrar">
																<i class="fas fa-trash-alt"></i>
															</button>
														</form>
													</div>
												</td>
											</tr>
										@endforeach
									</tbody>
							</div>
								</table>
								<div class="pb-2">
										<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalCreate">Agregar Recomendación</button>
								</div>
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
											<th scope="col">Accion Planeada</th>
											<th scope="col">Ejecucion en Meses</th>
											<th scope="col">Acciones</th>
										</tr>
									</thead>
									<tbody>
										@foreach($registros as $registro)
											<tr>
												<th scope="row">{{ $registro->version }}</th>
												<td>{{ $registro->accion_planeada }}</td>
												<td>{{ $registro->duracion }} Meses</td>
												<td>
													@csrf
													<div class="btn-group" role="group" aria-label="Basic example">
														<button class="btn btn-warning" type="button" title="Editar" onclick="window.location='{{ url('formulario/edit_ap/'.$registro->id) }}';">
															<i class="fas fa-pencil-alt"></i>
														</button>
														<form action="{{ url('formulario/'.$registro->id) }}" method="POST">
															{{csrf_field()}}
															{{ method_field('DELETE') }}
															<button class="btn btn-danger" type="submit" title="Borrar">
																<i class="fas fa-trash-alt"></i>
															</button>
														</form>
													</div>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
								<div class="pb-2">
									<a href="{{ URL::to('generatepdf/') }}">
                    					<button type="button" class="btn btn-sm btn-primary float-right">Generar reporte</button>
                					</a>
                				</div>
							@else
								<div class="alert alert-warning" role="alert">
									No hay Planes de Accion para mostrar.
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
						<input type="text" class="form-control" name="identificador">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Recomendación</label>
						<input type="text" class="form-control" name="recomendacion">
					</div>
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

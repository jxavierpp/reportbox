@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 offset-md-1">

			<!-- New task form -->
			{{-- <form action="{{ url('tasks') }}" method="POST"> --}}
				
			<div class="card ">
				<h5 class="card-header">Categoria</h5>

				<div class="card-body">
					<div class="card mb-3">
						<h5 class="card-header">Recomendaciones</h5>
						<div class="card-body">
							<form action="/" method="POST">
								{{ csrf_field() }}
								<div class="form-group">
									<div class="input-group mb-3">
										<input type="text" class="form-control" placeholder="Nueva Recomendación" aria-label="Username" aria-describedby="basic-addon1">
										<div class="input-group-append">
											<button class="btn btn-primary" type="submit">Agregar Recomendación</button>
										</div>
									</div>
								</div>
								<!-- Display validation errors -->
								@include('commons.errors')
							</form>	
								
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">Identificador</th>
										<th scope="col">Recomendación</th>
										<th scope="col">Acciones</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row">1.3.4</th>
										<td>Los escucsados estan muy sucios, se recomiendo limpiarlos</td>
										<td>
											<button class="btn btn-warning" type="submit" aria-label="Undone" title="Editar">
												<i class="fas fa-pencil-alt"></i>
											</button>
											<button class="btn btn-danger" type="submit" aria-label="Undone" title="Borrar">
												<i class="fas fa-trash-alt"></i>
											</button>
										</td>
									</tr>
									<tr>
										<th scope="row">1.3.5</th>
										<td>Se recomienda un nuevo logotipo para la carrera</td>
										<td>
											<button class="btn btn-warning" type="submit" aria-label="Undone" title="Editar">
												<i class="fas fa-pencil-alt"></i>
											</button>
											<button class="btn btn-danger" type="submit" aria-label="Undone" title="Borrar">
												<i class="fas fa-trash-alt"></i>
											</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card">
						<h5 class="card-header">Acciones Planeadas</h5>
						<div class="card-body">
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
									<tr>
										<th scope="row">1.3.4</th>
										<td>Se contratara personal para la limpieza de las areas baños.</td>
										<td>6 meses</td>
										<td>
											<button class="btn btn-warning" type="submit" aria-label="Undone" title="Editar">
												<i class="fas fa-pencil-alt"></i>
											</button>
											<button class="btn btn-danger" type="submit" aria-label="Undone" title="Borrar">
												<i class="fas fa-trash-alt"></i>
											</button>
										</td>
									</tr>
									<tr>
										<th scope="row">1.3.5</th>
										<td>Se propondra un concurso para la eleccion del nuevo logotipo de la carrera</td>
										<td>9 meses</td>
										<td>
											<button class="btn btn-warning" type="submit" aria-label="Undone" title="Editar">
												<i class="fas fa-pencil-alt"></i>
											</button>
											<button class="btn btn-danger" type="submit" aria-label="Undone" title="Borrar">
												<i class="fas fa-trash-alt"></i>
											</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						
					</div>
				</div>
				<div class="card-footer text-muted">
					<button type="button" class="btn btn-primary">Guardar</button>
					<button type="button" class="btn btn-secondary">Cancelar</button>
				</div>

			</div>
			
		</div>
	</div>
</div>
@endsection

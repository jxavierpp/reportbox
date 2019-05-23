@extends('layouts.app_admin')

@section('content')
    <div id="content">
        <div class="card">
            <div class="card-header title">
                <h4><strong>Editar encargado</strong></h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <table class = "table table-striped">

                        <form action={{ url('/adminpanel/encargados/'.$categoria->id) }} method="POST">
                            {{ csrf_field() }}
                            @method('PUT')

                        <tr>
                        <th>Nombre Categoría</th>
                        <th>Encargado</th>
                        </tr>

                            <td>

                            <div class="form-group">
                                <input type="text" class="form-control" name="name" 
                                id='id_nombreCategoria' value="{{ $categoria->name }}" readonly>
                            </div>
                            <div class="form-group">

                            </td>

                            <td>

                                <select class="form-control @error('encargado') is-invalid @enderror" name='encargado' >
                                    
                                    <option value = "">Sin asignar</option>
                                   @foreach($usuarios as $usuario)
                                        <option value = "{{$usuario->id}}" <?php 
                                        if ($usuario->id == $categoria->encargado) 
                                            echo "selected"; 
                                        ?> >
                                            {{ $usuario->name }}
                                        </option>
                                   @endforeach

                                </select>
                                @error('encargado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </td>

                            </div>
                    </table>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-secondary" 
                onclick="window.location='{{ url('adminpanel/encargados') }}';">Cancelar</button>
                </form> 
            </div>
        </div>
    </div>
@endsection






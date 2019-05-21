@extends('layouts.app_admin')

@section('content')
    <div id="content">
        <div class="card">
            <div class="card-header title">
                <h4><strong>Editar profesor</strong></h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action={{ url('/adminpanel/profesores/'.$usuario->id) }} method="POST">
                            {{ csrf_field() }}
                            @method('PUT')
                        <div class="form-group">
                        <strong>
                        <label >{{ __('Nombre:') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $usuario->name }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </strong>
                    </div>
                    <div class="form-group">
                        <strong>
                        <label for="email" >{{ __('Correo Electrónico:') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </strong>
                    </div>
                    <div class="form-group">
                        <strong>
                        <label for="password" >{{ __('Contraseña:') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </strong>
                    </div>
                    <div class="form-group">
                        <strong>
                        <label for="password-confirm" >{{ __('Confirmar Contraseña:') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </strong>
                    </div>

                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-secondary" onclick="window.location='{{ url('adminpanel/profesores') }}';">Cancelar</button>
                </form>	
            </div>
        </div>
    </div>
@endsection

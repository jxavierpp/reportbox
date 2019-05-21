@extends('layouts.app_admin')

@section('content')
    <div id="content">
        <div class="card">
            <div class="card-header title">
                <h4><strong>Añadir nuevo profesor</strong></h4>
            </div>

            <div class="card-body">
                <form action={{ url('/adminpanel/profesores/store') }} method="POST">
                    @csrf
                    <div class="form-group">
                        <strong>
                        <label >{{ __('Nombre:') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                    <div >
                        <strong>
                        <label for="categoria" class="form-group">{{ __('Seleccione Una Categoría') }}</label>
                        </strong>
                    </div>
                    
                    <div class="form-group">
                            <p><label for="categoria">
                                <select class="form-control" name='categoria'>
                                    
                                    <option value = "">Sin asignar</option>
                                   @foreach($categorias as $categoria)
                                        <option value = "{{$categoria->id}}">
                                            {{ $categoria->name }}
                                        </option>
                                   @endforeach

                                </select>
                                        {!! $errors->first('categoria', '<span class=error>:message</span>') !!}
                            </label></p>
                    </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                        {{ __('Registrar') }}</button>
                            <button type="button" class="btn btn-secondary" onclick="window.location='{{ url('adminpanel/profesores') }}';">Cancelar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection

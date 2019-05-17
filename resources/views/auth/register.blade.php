@extends('layouts.app_admin')

@guest
@else
    @section('content')
    <div id="content">
        <div class="card">
            <div class="card-header title">
                <h4><strong>Añadir nuevo profesor</strong></h4>
            </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione Una Categoria') }}</label>

                                <div class="col-md-8">
                                    <p><label for="categoria">
                                        <select name="categoria" value="{{ old('categoria') }}" class="col-md-20 col-form-label text-md-right" required autocomplete="categoria" autofocus>
                                            <option value="" selected disabled hidden>Seleccione uno</option>
                                            <option value="Personal Academico">1. Personal Academico</option>
                                            <option value="Estudiantes">2. Estudiantes</option>
                                            <option value="Plan de Estudios">3. Plan de Estudios</option>
                                            <option value="Evaluacion del Aprendizaje">4. Evaluacion del Aprendizaje</option>
                                            <option value="Formacion Integral">5. Formacion Integral</option>
                                            <option value="Servicios de Apoyo para el Aprendizaje">6. Servicios de Apoyo para el Aprendizaje</option>
                                            <option value="Vinculacion_Extension">7. Vinculacion_Extension</option>
                                            <option value="Investigacion">8. Investigacion</option>
                                            <option value="Infraestrutura y Equipamiento">9. Infraestrutura y Equipamiento</option>
                                            <option value="Gestion Administrativa y Financiacion">10. Gestion Administrativa y Financiacion</option>
                                        </select>
                                        {!! $errors->first('categoria', '<span class=error>:message</span>') !!}
                                    </label></p>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    @endsection
@endguest

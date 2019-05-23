<style>
    @font-face {
    font-family: SourceSansPro;
    src: url(SourceSansPro-Regular.ttf);
    }
    .clearfix:after {
    content: "";
    display: table;
    clear: both;
    }
    a {
    color: #0087C3;
    text-decoration: none;
    }
    body {
    position: relative;
    width: 21cm;
    height: 29.7cm;
    margin: 0 auto;
    color: #555555;
    background: #FFFFFF;
    font-family: Arial, sans-serif;
    font-size: 14px;
    font-family: SourceSansPro;
    }
    header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #AAAAAA;
    }
    #titulo {
    font-size: 35px;
    text-align: center;
    }
    #categoria {
    font-size: 15px;
    text-align: left;
    font-weight: bold;
    }
    #logounison {
    float: left;
    margin-top: 8px;
    }
    #logolcc {
    float: right;
    margin-top: 8px;
    }
    #logounison img {
    height: 120px;
    }
    #logolcc img {
    height: 120px;
    }
    table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px;
    border: 1px solid #000;
    }
    table th,
    table td {
    padding: 20px;
    background: #EEEEEE;
    text-align: center;
    border-bottom: 1px solid #FFFFFF;
    border: 1px solid #000;
    }
    table th {
    text-align: left;
    }
    table td {
    text-align: left;
    }
    table td h3{
    color: #57B223;
    font-size: 1.2em;
    font-weight: normal;
    margin: 0 0 0.2em 0;
    }
    .page_break { page-break-before: always; }
    </style>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
    <title>Reporte de General<title>
    </head>
    <body>
        <h5 id="titulo">Reporte General</h5>
    </header>
        @if(!($registros1->isEmpty()))
            <h1>Categoria - {{ $categoria1->name }}</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th id="categoria" scope="col">Identificador</th>
                        <th id="categoria" scope="col">Recomendación</th>
                        <th id="categoria" scope="col">Accion planeada</th>
                        <th id="categoria" scope="col">Fecha limite</th>
                    </tr>
                </thead>
                @foreach($registros1 as $registro)
                    <tr>
                        <td>{{ $registro->version }}</td>
                        <td>{{ $registro->recomendacion }}</td>
                        <td>{{ $registro->accion_planeada }}</td>
                        <td>{{ $registro->duracion }}</td>
                    </tr>
                @endforeach
            </table>
            <h5 id="titulo">Evidencias</h5>
            @foreach($registros1 as $registro)
                @foreach ($registro->evidencias()->get() as $evidencia)
                    <img src="{{ public_path().$evidencia->url }}" width="100px" height="100px">
                @endforeach
            @endforeach
        @endif
        @if(!($registros2->isEmpty()))
        <div class="page_break">
            <h1>Categoria - {{ $categoria2->name }}</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th id="categoria" scope="col">Identificador</th>
                        <th id="categoria" scope="col">Recomendación</th>
                        <th id="categoria" scope="col">Accion planeada</th>
                        <th id="categoria" scope="col">Fecha limite</th>
                    </tr>
                </thead>
                @foreach($registros2 as $registro)
                    <tr>
                        <td>{{ $registro->version }}</td>
                        <td>{{ $registro->recomendacion }}</td>
                        <td>{{ $registro->accion_planeada }}</td>
                        <td>{{ $registro->duracion }}</td>
                    </tr>
                @endforeach
            </table>
            <h5 id="titulo">Evidencias</h5>
            @foreach($registros2 as $registro)
                @foreach ($registro->evidencias()->get() as $evidencia)
                    <img src="{{ public_path().$evidencia->url }}" width="100px" height="100px">
                @endforeach
            @endforeach
        </div>
        @endif
        @if(!($registros3->isEmpty()))
        <div class="page_break">
            <h1>Categoria - {{ $categoria3->name }}</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th id="categoria" scope="col">Identificador</th>
                        <th id="categoria" scope="col">Recomendación</th>
                        <th id="categoria" scope="col">Accion planeada</th>
                        <th id="categoria" scope="col">Fecha limite</th>
                    </tr>
                </thead>
                @foreach($registros3 as $registro)
                    <tr>
                        <td>{{ $registro->version }}</td>
                        <td>{{ $registro->recomendacion }}</td>
                        <td>{{ $registro->accion_planeada }}</td>
                        <td>{{ $registro->duracion }}</td>
                    </tr>
                @endforeach
            </table>
            <h5 id="titulo">Evidencias</h5>
            @foreach($registros3 as $registro)
                @foreach ($registro->evidencias()->get() as $evidencia)
                    <img src="{{ public_path().$evidencia->url }}" width="100px" height="100px">
                @endforeach
            @endforeach
        </div>
        @endif
        @if(!($registros4->isEmpty()))
        <div class="page_break">
            <h1>Categoria - {{ $categoria4->name }}</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th id="categoria" scope="col">Identificador</th>
                        <th id="categoria" scope="col">Recomendación</th>
                        <th id="categoria" scope="col">Accion planeada</th>
                        <th id="categoria" scope="col">Fecha limite</th>
                    </tr>
                </thead>
                @foreach($registros4 as $registro)
                    <tr>
                        <td>{{ $registro->version }}</td>
                        <td>{{ $registro->recomendacion }}</td>
                        <td>{{ $registro->accion_planeada }}</td>
                        <td>{{ $registro->duracion }}</td>
                    </tr>
                @endforeach
            </table>
            <h5 id="titulo">Evidencias</h5>
            @foreach($registros4 as $registro)
                @foreach ($registro->evidencias()->get() as $evidencia)
                    <img src="{{ public_path().$evidencia->url }}" width="100px" height="100px">
                @endforeach
            @endforeach
        </div>
        @endif
        @if(!($registros5->isEmpty()))
        <div class="page_break">
            <h1>Categoria - {{ $categoria5->name }}</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th id="categoria" scope="col">Identificador</th>
                        <th id="categoria" scope="col">Recomendación</th>
                        <th id="categoria" scope="col">Accion planeada</th>
                        <th id="categoria" scope="col">Fecha limite</th>
                    </tr>
                </thead>
                @foreach($registros5 as $registro)
                    <tr>
                        <td>{{ $registro->version }}</td>
                        <td>{{ $registro->recomendacion }}</td>
                        <td>{{ $registro->accion_planeada }}</td>
                        <td>{{ $registro->duracion }}</td>
                    </tr>
                @endforeach
            </table>
            <h5 id="titulo">Evidencias</h5>
            @foreach($registros5 as $registro)
                @foreach ($registro->evidencias()->get() as $evidencia)
                    <img src="{{ public_path().$evidencia->url }}" width="100px" height="100px">
                @endforeach
            @endforeach
        </div>
        @endif
        @if(!($registros6->isEmpty()))
        <div class="page_break">
            <h1>Categoria - {{ $categoria6->name }}</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th id="categoria" scope="col">Identificador</th>
                        <th id="categoria" scope="col">Recomendación</th>
                        <th id="categoria" scope="col">Accion planeada</th>
                        <th id="categoria" scope="col">Fecha limite</th>
                    </tr>
                </thead>
                @foreach($registros6 as $registro)
                    <tr>
                        <td>{{ $registro->version }}</td>
                        <td>{{ $registro->recomendacion }}</td>
                        <td>{{ $registro->accion_planeada }}</td>
                        <td>{{ $registro->duracion }}</td>
                    </tr>
                @endforeach
            </table>
            <h5 id="titulo">Evidencias</h5>
            @foreach($registros6 as $registro)
                @foreach ($registro->evidencias()->get() as $evidencia)
                    <img src="{{ public_path().$evidencia->url }}" width="100px" height="100px">
                @endforeach
            @endforeach
        </div>
        @endif
        @if(!($registros7->isEmpty()))
        <div class="page_break">
            <h1>Categoria - {{ $categoria7->name }}</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th id="categoria" scope="col">Identificador</th>
                        <th id="categoria" scope="col">Recomendación</th>
                        <th id="categoria" scope="col">Accion planeada</th>
                        <th id="categoria" scope="col">Fecha limite</th>
                    </tr>
                </thead>
                @foreach($registros7 as $registro)
                    <tr>
                        <td>{{ $registro->version }}</td>
                        <td>{{ $registro->recomendacion }}</td>
                        <td>{{ $registro->accion_planeada }}</td>
                        <td>{{ $registro->duracion }}</td>
                    </tr>
                @endforeach
            </table>
            <h5 id="titulo">Evidencias</h5>
            @foreach($registros7 as $registro)
                @foreach ($registro->evidencias()->get() as $evidencia)
                    <img src="{{ public_path().$evidencia->url }}" width="100px" height="100px">
                @endforeach
            @endforeach
        </div>
        @endif
        @if(!($registros8->isEmpty()))
        <div class="page_break">
            <h1>Categoria - {{ $categoria8->name }}</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th id="categoria" scope="col">Identificador</th>
                        <th id="categoria" scope="col">Recomendación</th>
                        <th id="categoria" scope="col">Accion planeada</th>
                        <th id="categoria" scope="col">Fecha limite</th>
                    </tr>
                </thead>
                @foreach($registros8 as $registro)
                    <tr>
                        <td>{{ $registro->version }}</td>
                        <td>{{ $registro->recomendacion }}</td>
                        <td>{{ $registro->accion_planeada }}</td>
                        <td>{{ $registro->duracion }}</td>
                    </tr>
                @endforeach
            </table>
            <h5 id="titulo">Evidencias</h5>
            @foreach($registros8 as $registro)
                @foreach ($registro->evidencias()->get() as $evidencia)
                    <img src="{{ public_path().$evidencia->url }}" width="100px" height="100px">
                @endforeach
            @endforeach
        </div>
        @endif
        @if(!($registros9->isEmpty()))
        <div class="page_break">
            <h1>Categoria - {{ $categoria9->name }}</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th id="categoria" scope="col">Identificador</th>
                        <th id="categoria" scope="col">Recomendación</th>
                        <th id="categoria" scope="col">Accion planeada</th>
                        <th id="categoria" scope="col">Fecha limite</th>
                    </tr>
                </thead>
                @foreach($registros9 as $registro)
                    <tr>
                        <td>{{ $registro->version }}</td>
                        <td>{{ $registro->recomendacion }}</td>
                        <td>{{ $registro->accion_planeada }}</td>
                        <td>{{ $registro->duracion }}</td>
                    </tr>
                @endforeach
            </table>
            <h5 id="titulo">Evidencias</h5>
            @foreach($registros9 as $registro)
                @foreach ($registro->evidencias()->get() as $evidencia)
                    <img src="{{ public_path().$evidencia->url }}" width="100px" height="100px">
                @endforeach
            @endforeach
        </div>
        @endif
        @if(!($registros10->isEmpty()))
        <div class="page_break">
            <h1>Categoria - {{ $categoria10->name }}</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th id="categoria" scope="col">Identificador</th>
                        <th id="categoria" scope="col">Recomendación</th>
                        <th id="categoria" scope="col">Accion planeada</th>
                        <th id="categoria" scope="col">Fecha limite</th>
                    </tr>
                </thead>
                @foreach($registros10 as $registro)
                    <tr>
                        <td>{{ $registro->version }}</td>
                        <td>{{ $registro->recomendacion }}</td>
                        <td>{{ $registro->accion_planeada }}</td>
                        <td>{{ $registro->duracion }}</td>
                    </tr>
                @endforeach
            </table>
            <h5 id="titulo">Evidencias</h5>
            @foreach($registros10 as $registro)
                @foreach ($registro->evidencias()->get() as $evidencia)
                    <img src="{{ public_path().$evidencia->url }}" width="100px" height="100px">
                @endforeach
            @endforeach
        </div>
        @endif
    </body>
</html>
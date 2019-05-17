@extends('app')
@section('css')
    <link href="{{ asset('/css/dropzone.css') }}" rel="stylesheet">
@endsection
@section('content')
    {{$registro_id}}
    <div class="container">
        <div class="row"    >
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Subir archivos
                </div>
                <div class="panel-body">
                    {!! Form::open(['route'=> 'file.store', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
                    <div class="dz-message" style="height:200px;">
                        Drop your files here
                    </div>
                    <div class="dropzone-previews"></div>
                    <input type="hidden" name="registro_id" value="{{$registro_id}}">
                    <button type="submit" class="btn btn-success" id="submit">Guardar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('js/dropzone.js'); !!}
    <script>
        Dropzone.options.myDropzone = {
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilezise: 10,
            maxFiles: 2,

            init: function() {
                var submitBtn = document.querySelector("#submit");
                myDropzone = this;

                submitBtn.addEventListener("click", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
                this.on("addedfile", function(file) {
                    alert("Archivo añadido");
                });

                this.on("Completado", function(file) {
                    myDropzone.removeFile(file);
                });

                this.on("Exito!",
                    myDropzone.processQueue.bind(myDropzone)
                );
            }
        };
    </script>
@endsection
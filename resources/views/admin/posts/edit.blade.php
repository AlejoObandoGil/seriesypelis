@extends('admin.layout')

@section('header')

<h1 class="m-0">{{ config('app.name')}}
    <small>Crear Publicación</small>
</h1>
<ol class="breadcrumb">
    {{-- links de rutas --}}
    <li><a href="{{ route('admin.admin') }}"> <i class="fa fa-home"></i> Inicio</a></li>
    <li><a href="{{ route('admin.posts.index') }}"> <i class="fa fa-list"></i> Publicaciones</a></li>
</ol>

@stop

@section('content')
    <form method="POST" action="{{ route('admin.posts.update', $post) }}">
        @csrf {{ method_field('PUT') }}
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Crear Películas & Series</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group {!! $errors->has('title') ? 'has-error' : ' ' !!}">
                            <label for="">Título de la publicación</label>
                            <input name="title"
                                    class="form-control"
                                    value="{{  old('title', $post->title) }}"
                                    placeholder="Ingresa el título de la película o serie">

                            {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('body') ? 'has-error' : ' ' !!}">
                            <label for="">Contenido de la publicación</label>
                            <textarea rows="10"
                                    name="body"
                                    class="form-control"
                                    placeholder="Ingresa el contenido completo de la película o serie">{{  old('body', $post->body) }}</textarea>

                            {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="">Agregar Imagenes</label>
                            <div class="dropzone"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <div class="form-group">
                        <div class="card-body">
                            <div class="form-group {!! $errors->has('description') ? 'has-error' : ' ' !!}">
                                <label for="">Descripción de la publicación</label>
                                <textarea name="description"
                                            class="form-control"
                                            placeholder="Ingresa una descripción breve de la película o serie">{{ old('description', $post->description) }}</textarea>

                                {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
                            </div>
                            <!-- Date -->
                            <div class="form-group">
                                <label>Fecha de publicación:</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    <input name="published_at"
                                            type="text"
                                            class="form-control datetimepicker-input"
                                            value="{{  old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null)}}"
                                            data-target="#reservationdate"/>
                                </div>
                            </div>
                            <div class="form-group {!! $errors->has('category') ? 'has-error' : '' !!}">
                                <label for="">Géneros</label>
                                <select name="category" class="form-control">
                                    <option value="">Seleccione un género</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category', $post->category_id) == $category->id ? 'selected' : ''}}
                                        >{{ $category->name }}</option>
                                    @endforeach
                                </select>

                                {!! $errors->first('category', '<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="form-group">
                                <label for="">Etiquetas</label>
                                <select name="tags[]" class="form-control select2"
                                        multiple="multiple">
                                    {{-- <option value="">Seleccione una etiqueta</option> --}}
                                    @foreach ($tags as $tag)
                                        <option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Guardar Publicación</button>
                            </div>
                            <!-- Date and time -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"></h3>
            </div>
            <div class="form-group">
                <div class="card-body">
                    <label for="">Eliminar Imagenes</label>
                        @foreach ($post->photos as $photo)
                            <form method="POST" action="{{ route('admin.photos.destroy', $photo) }}">
                                {{ method_field('DELETE') }} {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-3">
                                        <button class="btn btn-danger btn-xs" style="position: absolute">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        <img src="{{ url($photo->url) }}" class="img-fluid" alt="Responsive image">
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('styles')
<!-- daterange picker -->
<link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
{{-- <!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> --}}
{{-- dropzone Subir imagenes --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.css">
@endpush

@push('scripts')
<!-- Select2 -->
<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="/adminlte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="/adminlte/plugins/moment/moment.min.js"></script>
<script src="/adminlte/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
{{-- dropzone Subir imagenes --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}
<!-- Page specific script  EDITOR DE TEXTO-->
{{-- <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script> --}}

<!-- Page specific script  FECHA Y CALENDARIO-->
<script>
    $(function () {
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        //Date and time picker
        $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        // $('.my-colorpicker1').colorpicker()
        // //color picker with addon
        // $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })

        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    })

    var myDropzone = new Dropzone('.dropzone', {
        url: '/posts/{{ $post->url }}/photo',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        paramName: 'photo',
        acceptedFiles: 'image/*',
        maxFilesize: 2,
        // maxFiles: 1,
        dictDefaultMessage: 'Arrastra un archivo aquí para subir',
    });

    myDropzone.on('error', function(file, res){
        var msg = res.photo[0];
        $('.dz-error-message:last > span').text(msg);
    });

    Dropzone.autoDiscover = false;
</script>
@endpush


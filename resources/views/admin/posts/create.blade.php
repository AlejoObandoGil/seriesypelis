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

<form method="POST" action="{{ route('admin.posts.store')}}">
    @csrf
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
                                value="{{  old('title') }}"
                                placeholder="Ingresa el título de la película o serie">
                        
                        {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('body') ? 'has-error' : ' ' !!}">
                        <label for="">Contenido de la publicación</label>
                        <textarea rows="10" 
                                name="body" 
                                class="form-control" 
                                placeholder="Ingresa el contenido completo de la película o serie">{{  old('body') }}</textarea>
                    
                        {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
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
                                        placeholder="Ingresa una descripción breve de la película o serie">{{ old('description') }}</textarea>        
                            
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
                                        value="{{  old('published_at') }}"
                                        data-target="#reservationdate"/>
                            </div>
                        </div>
                        <div class="form-group {!! $errors->has('category') ? 'has-error' : '' !!}">
                            <label for="">Géneros</label>
                            <select name="category" class="form-control">
                                <option value="">Seleccione un género</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category') == $category->id ? 'selected' : ''}}    
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
                                    <option {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Guardar Publicación</button>
                            </select>
                        </div>
                        <!-- Date and time -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@stop

@push('styles')
<!-- daterange picker -->
<link rel="stylesheet" href="adminlte/plugins/daterangepicker/daterangepicker.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
{{-- <!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> --}}
@endpush

@push('scripts')
<!-- Select2 -->
<script src="adminlte/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="adminlte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="adminlte/plugins/moment/moment.min.js"></script>
<script src="adminlte/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="adminlte/plugins/jszip/jszip.min.js"></script>
<script src="adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}
<!-- Page specific script  EDITOR DE TEXTO-->
{{-- <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script> --}}

<!-- Page specific script TABLA-->
<script>
    $(function () {
        $("#post-table").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
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
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()
    
        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })
    
        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    })
</script>
@endpush


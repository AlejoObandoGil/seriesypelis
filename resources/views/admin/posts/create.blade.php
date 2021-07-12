<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <form method="POST" action="{{ route('admin.posts.store')}}">
        @csrf

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Escribe el título de la nueva Película o Serie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group {!! $errors->has('title') ? 'has-error' : ' ' !!}">
                    {{-- <label for="">Título de la publicación</label> --}}
                    <input name="title" 
                            class="form-control" 
                            value="{{  old('title') }}"
                            placeholder="Ingresa el título de la película o serie">
                    
                    {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary">Nueva Publicación</button>
            </div>
        </div>
    </div>
    </form>
</div>
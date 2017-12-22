<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$cur->idcurriculum}}">
{{ Form::Open(array('action'=>array('CurriculumController@destroy',$cur->idcurriculum),'method'=>'delete')) }}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
                <h4 class="modal-title">Eliminar curriculum</h4>
            </div>
            <div class="modal-body">
                <p>Confirme que desea eliminar el curriculum</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>

            </div>
        </div>
    </div>

    {{Form::Close()}}
</div>
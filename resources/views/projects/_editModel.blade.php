
<div class="modal fade" id="editProjectModal-{{ $project->id }}" tabindex="-1" role="dialog"
     aria-labelledby="editProjectModal-{{ $project->id }}-Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProjectModal-{{ $project->id }}-Label">编辑项目</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {!! Form::Model($project,['route' => ['projects.update',$project->id], 'files' => true, 'method'=>'PATCH']) !!}
            <div class="modal-body">
                <div class="model-body">
                    <div class="model-group">
                        {!! Form::label('name', '项目名称:') !!}
                        {!! Form::text('name',null, ['class' => "form-control"]) !!}
                        {!! $errors->getBag('update-'. $project->id)->first('name','<div class="alert alert-danger">:message</div>') !!}
                    </div>
                    <div class="model-group">
                        {!! Form::label('thumbnail', '缩略图:') !!}
                        {!! Form::file('thumbnail',['class' => 'form-control-file']) !!}
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

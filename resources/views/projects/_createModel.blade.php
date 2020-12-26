<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createProjectModal">
    <i class="fas fa-plus"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="createProjectModal" tabindex="-1" role="dialog" aria-labelledby="createProjectModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProjectModalLabel">新建项目</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['route' => 'projects.store', 'files' => true]) !!}
                <div class="modal-body">

                    <div class="model-body">
                        <div class="model-group">
                            {!! Form::label('name', '项目名称:') !!}
                            {!! Form::text('name','', ['class' => "form-control"]) !!}
                            {!! $errors->create->first('name','<div class="alert alert-danger mt-2">:message</div>') !!}
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

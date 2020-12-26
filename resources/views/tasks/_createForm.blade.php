{!! Form::open(['route' => ['tasks.store','project'=>$project->id], 'method'=>'POST']) !!}
<div class="input-group mb-2">
    <div class="input-group-prepend">
        <div class="input-group-text"><i class="fa fa-plus"></i></div>
    </div>
    {!! Form::text('name','', ['class'=>'form-control','placeholder'=>'创建项目']) !!}
</div>

{!! $errors->create->first('name','<div class="alert alert-danger">:message</div>') !!}
{!! $errors->create->first('project','<div class="alert alert-danger">:message</div>') !!}
{!! Form::close() !!}

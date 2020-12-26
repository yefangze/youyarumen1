{!! Form::open(['route'=>['tasks.destroy',$task->id], 'method'=>'DELETE']) !!}
    <button type="submit" class="btn btn-danger btn-sm">
        <i class="fa fa-trash"></i>
    </button>
{!! Form::close() !!}

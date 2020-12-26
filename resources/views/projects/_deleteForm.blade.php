<form action="{{ route('projects.destroy', $project->id) }}" method="post" >
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit" class="btn btn-default">
        <i class="fa fa-btn fa-times"></i>
    </button>
</form>

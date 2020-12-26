<div class="col-4 my-3">
    <div class="card project-card">
        <div class="icon-bar">
            <ul>
                <li>
                @include('projects._deleteForm')
                </li>
                <li>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProjectModal-{{ $project->id }}">
                        <i class="fa fa-btn fa-cog"></i>
                    </button>
                </li>
            </ul>
        </div>
        <a  href="{{ route('projects.show', $project->id) }}">
            <img src="{{ asset('storage/thumbs/original/'. $project->thumbnail) }}" class="card-img-top" alt="{{ $project->name }}">
            <div class="card-body py-3">
                <h6 class="card-title text-center">{{ $project->name }}</h6>
            </div>
        </a>
    </div>
    @include('projects._editModel')
</div>


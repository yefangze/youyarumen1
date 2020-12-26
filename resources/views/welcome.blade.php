@extends('layouts.app')

@section('content')
    <div class="container">

            <div class="card-deck">
                @if(count($projects)>0)
                    @each('projects._card', $projects, 'project')
                @endif
                <div class="card col-4 my-3">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        @include('projects._createModel')
                    </div>
                </div>
            </div>


    </div>

@endsection
@section('customJS')
    <script>
        $(document).ready(function () {
            $('.icon-bar').hide();
            $('.project-card').hover(function () {
                $(this).find('.icon-bar').toggle();
            });
        })
    </script>
@endsection
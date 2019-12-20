@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Project: {{ $project->title }}</h2>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            {{ $project->description }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Owner:</strong>
            {{ $project->user->name }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        Team:
        <table class="table table-bordered">
            <tr>

                <th>Name</th>
                <th>Role</th>
                <th width="280px">Action</th>
            </tr>

            @foreach ($project->teams as $team)
            <tr>

                <td>{{ $team->user->name }}</td>
                <td>{{ $team->role }}</td>
                <td>
                    <form action="{{ route('teams.destroy',$team->id,$project->id) }}" method="POST">


                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <!-- Topbar Search -->
        Add members:
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{ ('teams.search') }}">
            @csrf
            <div class="input-group">
                <input name="email" type="text" class="form-control bg-light border-0 small" placeholder="Search for user email" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

</div>
</div>
@endsection
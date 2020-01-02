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
                    <form action="{{ route('teams.destroy',$team->id,$project) }}" method="POST">


                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <!-- Topbar Search -->
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Add members:</h2>
                </div>

            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{ route('teams.store') }}" method="Post">
            @csrf
            <div class="input-group">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">
                            <strong>Email:</strong>
                            <input name="email" type="text" class="form-control bg-light border-0 " placeholder="User email" aria-label="Search" aria-describedby="basic-addon2">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Role:</strong>
                            <select class="custom-select" name="role">
                                <option value="Admin">Admin</option>
                                <option value="Team Member">Team Member</option>
                                <option value="External User">External User</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="project_id" name="project_id" value=" {{ $project->id }}">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Add Member</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
</div>
@endsection
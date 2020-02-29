@extends('projects.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Techniques from project: {{ $project->title }}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('projects.technique_projects.create',$project -> id) }}">New Technique <i class="fas fa-plus"></i></a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger">
    <p>{{ $message }}</p>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">
@guest
@if ($project == 1)
<div class="alert alert-danger">
    Before continuing, all team members information must be completed!<br><br>
    <a class="collapse-item" href="{{ route('projects.teams.index', $project -> id) }}">Collect Team Information</a>
</div>
@endif
@else
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                <tr>

                    <th>Name</th>
                    <th>Type</th>
                    <th width="320px">Action</th>
                </tr>

                @foreach ($project->techniques as $technique)
                <tr>

                    <td>{{ $technique->name }}</td>
                    <td>{{ $technique->type }}</td>


                    <td>
                        <form action="{{ route('projects.technique_projects.destroy', ['technique'=>$technique->id,'project'=>$project->id]) }}" method="post">
                            <a class="btn btn-info " href="{{ route('projects.technique_projects.show', ['project'=>$project->id,'technique'=>$technique->id]) }}">View <i class="fas fa-eye"></i> </a>
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Remove <i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>
@endguest

</div>
@endsection
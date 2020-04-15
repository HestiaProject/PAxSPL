@extends('projects.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Assemble techniques into project: {{ $project->title }}</h2>
        </div>
        <!-- <div class="pull-right">
            <a class="btn btn-success" href="{{ route('projects.technique_projects.create',$project -> id) }}">New Technique <i class="fas fa-plus"></i></a>
        </div> -->
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
    <div class="col-xs-12 col-sm-12 col-md-12">
        @if ($project->status_user())
        <div class="alert alert-danger">
            Before continuing, all team members information must be completed!<br><br>
            <a class="collapse-item" href="{{ route('projects.teams.index', $project -> id) }}">Collect Team Information</a>
        </div>
        @elseif ($project->artifacts->count()==0)
        <div class="alert alert-danger">
            Before continuing, at least one artifact must be created!<br><br>
            <a class="collapse-item" href="{{ route('projects.artifact.index', $project -> id) }}">Register Artifacts</a>
        </div>
        @elseif ($project->techniques_project->count()==0)
        <div class="alert alert-danger">
            Before continuing, at least one technique must be added to the project!<br><br>
            <a class="collapse-item" href="{{ route('projects.technique_projects.index', $project -> id) }}">Add Techniques</a>
        </div>
        @else
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('projects.assemble_process.create',$project -> id) }}">New Process <i class="fas fa-plus"></i></a>
        </div>
        <div class="pull-left">
            <h2>My Processes:</h2>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                <tr>

                    <th>Name</th>

                    <th width="300px">Action</th>
                </tr>
                @foreach ($project->assemble_process as $assemble_process)
                <tr>

                    <td>{{ $assemble_process->name }}</td>
                    <td>
                        <form action="{{ route('projects.assemble_process.destroy',['project'=>$project->id, 'assemble_process'=>$assemble_process->id]) }}" method="POST">

                            <a class="btn btn-info " href="{{ route('projects.assemble_process.show',['project'=>$project->id, 'assemble_process'=>$assemble_process->id]) }}">Enter <i class="fas fa-folder-open"></i> </a>

                            <a class="btn btn-primary" href="{{ route('projects.assemble_process.edit',['project'=>$project->id, 'assemble_process'=>$assemble_process->id]) }}">Edit <i class="fas fa-edit"></i></a>


                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete <i class="fas fa-trash"></i></button>

                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            @endif

        </div>
    </div>
</div>

@endsection
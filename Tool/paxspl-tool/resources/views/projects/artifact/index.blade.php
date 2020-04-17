@extends('projects.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Artifacts of project: {{ $project->title }}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('projects.artifact.create',$project -> id) }}">New Artifact <i class="fas fa-plus"></i></a>

            <a class="btn btn-primary btn-warning" href="{{action('ArtifactController@generateDocx',$project)}}">Download Artifact Report <i class="fas fa-file-download"></i></a>

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
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                <tr>

                    <th>Name</th>
                    <th>Type</th>
                    <th>Owner</th>
                    <th>Last Update Date</th>
                    <th>Last Update by</th>
                    <th width="320px">Action</th>
                </tr>

                @foreach ($project->artifacts as $artifact)
                <tr>

                    <td>{{ $artifact->name }}</td>
                    <td>{{ $artifact->type }}</td>
                    <td>{{ $artifact->owner->name }}</td>
                    <td>{{ date('m-d-Y', strtotime($artifact->last_update_date))}}</td>
                    <td>{{ $artifact->update_user->name }}</td>


                    <td>
                        <form action="{{ route('projects.artifact.destroy', ['artifact'=>$artifact->id,'project'=>$project->id]) }}" method="post">
                            <a class="btn btn-info " href="{{ route('projects.artifact.show', ['project'=>$project->id,'artifact'=>$artifact->id]) }}">View <i class="fas fa-eye"></i> </a>
                            <a class="btn btn-primary" href="{{ route('projects.artifact.edit', ['project'=>$project->id,'artifact'=>$artifact->id]) }}">Edit <i class="fas fa-pen"></i></a>
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
</div>
@endsection
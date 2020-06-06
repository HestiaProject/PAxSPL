@extends('projects.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Report Experiences for Process: {{ $exp_process->name }}</h2>
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
        @if ($project->status_user())
        <div class="alert alert-danger">
            Before continuing, all team members information must be completed!<br><br>
            <a class="collapse-item" href="{{ route('projects.teams.index', $project -> id) }}">Collect Team Information</a>
        </div>
        @elseif (!$project->retriever())
        <div class="alert alert-danger">
            You Must be a feature retriver to execute the process!<br><br>

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
        @elseif ($project->assemble_process->count()==0)
        <div class="alert alert-danger">
            Before continuing, at least one technique must be added to the project!<br><br>
            <a class="collapse-item" href="{{ route('projects.technique_projects.index', $project -> id) }}">Add Techniques</a>
        </div>
        @elseif ($exp_process->progress()==='100')
        <div class="alert alert-danger">
            Before continuing, the retrieval process must be finished!<br><br>
            <a class="collapse-item" href="{{ route('projects.execute_f_process.index', $project -> id) }}">Process</a>
        </div>
        @elseif ($project->fm->count()==0)
        <div class="alert alert-danger">
            Before continuing, at least one feature model must be added to the project!<br><br>
            <a class="collapse-item" href="{{ route('projects.feature_model.index', $project -> id) }}">Add Techniques</a>
        </div>
        @else
        <div class="pull-right">
            @if($exp_process->activities_no_exp->count()!=0)
            <a class="btn btn-success" href="{{ route('projects.exp_process.experiences.create',['project' => $project, 'exp_process' => $exp_process]) }}">New Experience <i class="fas fa-plus"></i></a>
            @endif
            <a class="btn btn-primary btn-warning" href="{{action('ExperienceController@generateDocx',['project' => $project, 'exp_process' => $exp_process])}}">Download Report <i class="fas fa-file-download"></i></a>
        </div>
        <br><br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                        <tr>


                            <th>Activity</th>
                            <th>Time Spent (Hours)</th>

                            <th width="320px">Action</th>
                        </tr>

                        @foreach ($exp_process->experiences as $experience)
                        <tr>

                            <td>{{ $experience->activity->name }}</td>
                            <td>{{ $experience->time }}</td>




                            <td>

                                <form action="{{ route('projects.exp_process.experiences.destroy', ['project'=>$project->id,'exp_process'=>$exp_process->id,'experience'=>$experience->id]) }}" method="POST">

                                    @csrf
                                    <a class="btn btn-info" href="{{ route('projects.exp_process.experiences.show', ['project'=>$project->id,'exp_process'=>$exp_process->id,'experience'=>$experience->id]) }}">View <i class="fas fa-eye"></i></a>

                                    <a class="btn btn-primary" href="{{ route('projects.exp_process.experiences.edit', ['project'=>$project->id,'exp_process'=>$exp_process->id,'experience'=>$experience->id]) }}">Edit <i class="fas fa-pen"></i></a>

                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Remove <i class="fas fa-trash"></i></button>


                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>


                @endif
            </div>
        </div>

    </div>
</div>
@endsection
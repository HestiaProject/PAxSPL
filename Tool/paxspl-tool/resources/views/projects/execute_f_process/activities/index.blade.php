@extends('projects.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Execute Retrieval Activities: {{ $project->title }}</h2>
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
        @else

         


        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCard" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">

                <h6 class="m-0 font-weight-bold text-primary">Doing:</h6>
            </a>

            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseCard" style="">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                            <tr>

                                <th>Name</th>
                                <th>Phase</th>
                                <th>Order</th>

                                <th width="320px">Action</th>
                            </tr>

                            @foreach ($assemble_process->activities_retrieval_doing as $activity)
                            <tr>

                                <td>{{ $activity->name }}</td>
                                <td>{{ $activity->phase }}</td>
                                <td>{{ $activity->order }}</td>





                                <td>

                                    <form action="{{ route('projects.assemble_process.activities.destroy', ['project'=>$project->id,'assemble_process'=>$assemble_process->id,'activity'=>$activity->id]) }}" method="POST">



                                        <a class="btn btn-info " href="{{ route('projects.assemble_process.activities.show', ['project'=>$project->id,'assemble_process'=>$assemble_process->id,'activity'=>$activity->id]) }}">Execute <i class="fas fa-play"></i> </a>

                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCard3" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">

                <h6 class="m-0 font-weight-bold text-primary">To Do:</h6>
            </a>


            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseCard3" style="">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                            <tr>

                                <th>Name</th>
                                <th>Phase</th>
                                <th>Order</th>

                                <th width="320px">Action</th>
                            </tr>

                            @foreach ($assemble_process->activities_retrieval_todo as $activity)
                            <tr>

                                <td>{{ $activity->name }}</td>
                                <td>{{ $activity->phase }}</td>
                                <td>{{ $activity->order }}</td>





                                <td>

                                    <form action="{{ route('projects.assemble_process.activities.destroy', ['project'=>$project->id,'assemble_process'=>$assemble_process->id,'activity'=>$activity->id]) }}" method="POST">



                                        <a class="btn btn-info " href="{{ route('projects.assemble_process.activities.show', ['project'=>$project->id,'assemble_process'=>$assemble_process->id,'activity'=>$activity->id]) }}">Execute <i class="fas fa-play"></i> </a>

                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCard2" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">

                <h6 class="m-0 font-weight-bold text-primary">Done:</h6>
            </a>

            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseCard2" style="">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                            <tr>

                                <th>Name</th>
                                <th>Phase</th>
                                <th>Order</th>

                                <th width="320px">Action</th>
                            </tr>

                            @foreach ($assemble_process->activities_retrieval_done as $activity)
                            <tr>

                                <td>{{ $activity->name }}</td>
                                <td>{{ $activity->phase }}</td>
                                <td>{{ $activity->order }}</td>





                                <td>

                                    <form action="{{ route('projects.assemble_process.activities.destroy', ['project'=>$project->id,'assemble_process'=>$assemble_process->id,'activity'=>$activity->id]) }}" method="POST">



                                        <a class="btn btn-info " href="{{ route('projects.assemble_process.activities.show', ['project'=>$project->id,'assemble_process'=>$assemble_process->id,'activity'=>$activity->id]) }}">Execute <i class="fas fa-play"></i> </a>

                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

            @endif
        </div>

    </div>

</div>

@endsection
@extends('projects.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Retrieval Activities: {{ $project->title }}</h2>
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
        @else
        <a class="btn btn-primary btn-warning" href="{{action('ActivityController@generateDocx',['project' => $project, 'assemble_process' => $assemble_process])}}">Download Activities Report <i class="fas fa-file-download"></i></a>
        <br><br>
        

        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCard0" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Generic Process</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseCard0" style="">
                <div class="card-body">
                    <figure style="display: block;  margin-left: auto;  margin-right: auto;  width: 50%;">
                        <img src="https://raw.githubusercontent.com/HestiaProject/Generic-SPL-Re-engineering-Process/master/process/img/genericProcess.png" alt="Generic Feature Retrieval Process">
                        <figcaption>Generic Feature Retrieval Process</figcaption>

                    </figure>

                </div>
            </div>
        </div>




        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            
            <a href="#collapseCard" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">

                <h6 class="m-0 font-weight-bold text-primary">Extract:</h6>
            </a>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('projects.assemble_process.activities.create',['project'=>$project -> id,'assemble_process'=>$assemble_process -> id,'phase'=>'extract']) }}">New Activity <i class="fas fa-plus"></i></a>
            </div>

            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCard" style="">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                            <tr>

                                <th>Name</th>
                                <th>Order</th>
                                <th>Retrieval Tech.</th>

                                <th width="320px">Action</th>
                            </tr>

                            @foreach ($assemble_process->activities_ext as $activity)
                            <tr>

                                <td>{{ $activity->name }}</td>
                                <td>{{ $activity->order }}</td>
                                <td>{{ $activity->technique->name }}</td>





                                <td>

                                    <form action="{{ route('projects.assemble_process.activities.destroy', ['project'=>$project->id,'assemble_process'=>$assemble_process->id,'activity'=>$activity->id]) }}" method="POST">



                                        <a class="btn btn-info " href="{{ route('projects.assemble_process.activities.show', ['project'=>$project->id,'assemble_process'=>$assemble_process->id,'activity'=>$activity->id]) }}">View <i class="fas fa-eye"></i> </a>
                                        <a class="btn btn-primary" href="{{ route('projects.assemble_process.activities.edit', ['project'=>$project->id,'assemble_process'=>$assemble_process->id,'activity'=>$activity->id]) }}">Edit <i class="fas fa-pen"></i></a>

                                        @csrf

                                        @if($activity->input_artifacts->count()==0 and $activity->output_artifacts->count()==0)
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Remove <i class="fas fa-trash"></i></button>
                                        @endif




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
            <a href="#collapseCard3" class="d-block card-header py-3 " data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">

                <h6 class="m-0 font-weight-bold text-primary">Categorize:</h6>
            </a>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('projects.assemble_process.activities.create',['project'=>$project -> id,'assemble_process'=>$assemble_process -> id,'phase'=>'categorize']) }}">New Activity <i class="fas fa-plus"></i></a>
            </div>

            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCard3" style="">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                            <tr>

                                <th>Name</th>
                                <th>Order</th>
                                <th>Retrieval Tech.</th>

                                <th width="320px">Action</th>
                            </tr>

                            @foreach ($assemble_process->activities_cat as $activity)
                            <tr>

                                <td>{{ $activity->name }}</td>
                                <td>{{ $activity->order }}</td>
                                <td>{{ $activity->technique->name }}</td>





                                <td>

                                    <form action="{{ route('projects.assemble_process.activities.destroy', ['project'=>$project->id,'assemble_process'=>$assemble_process->id,'activity'=>$activity->id]) }}" method="POST">



                                        <a class="btn btn-info " href="{{ route('projects.assemble_process.activities.show', ['project'=>$project->id,'assemble_process'=>$assemble_process->id,'activity'=>$activity->id]) }}">View <i class="fas fa-eye"></i> </a>
                                        <a class="btn btn-primary" href="{{ route('projects.assemble_process.activities.edit', ['project'=>$project->id,'assemble_process'=>$assemble_process->id,'activity'=>$activity->id]) }}">Edit <i class="fas fa-pen"></i></a>

                                        @csrf

                                        @if($activity->input_artifacts->count()==0 and $activity->output_artifacts->count()==0)
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Remove <i class="fas fa-trash"></i></button>

                                        @endif



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
            <a href="#collapseCard2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">

                <h6 class="m-0 font-weight-bold text-primary">Group:</h6>
            </a>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('projects.assemble_process.activities.create',['project'=>$project -> id,'assemble_process'=>$assemble_process -> id,'phase'=>'group']) }}">New Activity <i class="fas fa-plus"></i></a>
            </div>

            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCard2" style="">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                            <tr>

                                <th>Name</th>
                                <th>Order</th>
                                <th>Retrieval Tech.</th>

                                <th width="320px">Action</th>
                            </tr>

                            @foreach ($assemble_process->activities_group as $activity)
                            <tr>

                                <td>{{ $activity->name }}</td>
                                <td>{{ $activity->order }}</td>
                                <td>{{ $activity->technique->name }}</td>





                                <td>

                                    <form action="{{ route('projects.assemble_process.activities.destroy', ['project'=>$project->id,'assemble_process'=>$assemble_process->id,'activity'=>$activity->id]) }}" method="POST">



                                        <a class="btn btn-info " href="{{ route('projects.assemble_process.activities.show', ['project'=>$project->id,'assemble_process'=>$assemble_process->id,'activity'=>$activity->id]) }}">View <i class="fas fa-eye"></i> </a>
                                        <a class="btn btn-primary" href="{{ route('projects.assemble_process.activities.edit', ['project'=>$project->id,'assemble_process'=>$assemble_process->id,'activity'=>$activity->id]) }}">Edit <i class="fas fa-pen"></i></a>

                                        @csrf

                                        @if($activity->input_artifacts->count()==0 and $activity->output_artifacts->count()==0)
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Remove <i class="fas fa-trash"></i></button>
                                        @endif




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
            <a href="#collapseCard4" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">

                <h6 class="m-0 font-weight-bold text-primary">Create Feature Model:</h6>
            </a>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('projects.assemble_process.activities.create',['project'=>$project -> id,'assemble_process'=>$assemble_process -> id,'phase'=>'fm']) }}">New Activity <i class="fas fa-plus"></i></a>
            </div>

            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCard4" style="">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                            <tr>

                                <th>Name</th>
                                <th>Order</th>
                                <th>Retrieval Tech.</th>

                                <th width="320px">Action</th>
                            </tr>

                            @foreach ($assemble_process->activities_fm as $activity)
                            <tr>

                                <td>{{ $activity->name }}</td>
                                <td>{{ $activity->order }}</td>
                                <td>{{ $activity->technique->name }}</td>





                                <td>

                                    <form action="{{ route('projects.assemble_process.activities.destroy', ['project'=>$project->id,'assemble_process'=>$assemble_process->id,'activity'=>$activity->id]) }}" method="POST">



                                        <a class="btn btn-info " href="{{ route('projects.assemble_process.activities.show', ['project'=>$project->id,'assemble_process'=>$assemble_process->id,'activity'=>$activity->id]) }}">View <i class="fas fa-eye"></i> </a>
                                        <a class="btn btn-primary" href="{{ route('projects.assemble_process.activities.edit', ['project'=>$project->id,'assemble_process'=>$assemble_process->id,'activity'=>$activity->id]) }}">Edit <i class="fas fa-pen"></i></a>

                                        @csrf

                                        @if($activity->input_artifacts->count()==0 and $activity->output_artifacts->count()==0)
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Remove <i class="fas fa-trash"></i></button>
                                        @endif




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
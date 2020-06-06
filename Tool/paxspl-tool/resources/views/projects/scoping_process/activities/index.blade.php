@extends('projects.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Scoping Activities: {{ $project->title }}</h2>
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

        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCard0" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Generic Process</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseCard0" style="">
                <div class="card-body">
                    <figure style="display: block;  margin-left: auto;  margin-right: auto;  width: 50%;">
                        <img src="https://raw.githubusercontent.com/HestiaProject/PAxSPL/master/process/img/scope.png" alt="Generic Scoping Process">
                        <figcaption>Generic Scoping Process</figcaption>
                    </figure>

                </div>
            </div>
        </div>

        <a class="btn btn-primary btn-warning" href="{{action('ScopingActController@generateDocx',['project' => $project, 'scoping_process' => $scoping_process])}}">Download Activities Report <i class="fas fa-file-download"></i></a>
        <br><br>
        <div class="card shadow mb-4">
            <a href="#collapseCard0x" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">

                <h6 class="m-0 font-weight-bold text-primary">Pre-Scoping:</h6>
            </a>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('projects.scoping_process.activities.create',['project'=>$project -> id,'scoping_process'=>$scoping_process -> id,'phase'=>'SupportS']) }}">New Activity <i class="fas fa-plus"></i></a>
            </div>

            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseCard0x" style="">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                            <tr>

                                <th>Name</th>
                                <th>Order</th>
                                <th>Scoping Tech.</th>

                                <th width="320px">Action</th>
                            </tr>

                            @foreach ($scoping_process->activities_support as $activity)
                            <tr>

                                <td>{{ $activity->name }}</td>
                                <td>{{ $activity->order }}</td>
                                <td>{{ $activity->technique->name }}</td>





                                <td>

                                    <form action="{{ route('projects.scoping_process.activities.destroy', ['project'=>$project->id,'scoping_process'=>$scoping_process->id,'activity'=>$activity->id]) }}" method="POST">



                                        <a class="btn btn-info " href="{{ route('projects.scoping_process.activities.show', ['project'=>$project->id,'scoping_process'=>$scoping_process->id,'activity'=>$activity->id]) }}">View <i class="fas fa-eye"></i> </a>
                                        <a class="btn btn-primary" href="{{ route('projects.scoping_process.activities.edit', ['project'=>$project->id,'scoping_process'=>$scoping_process->id,'activity'=>$activity->id]) }}">Edit <i class="fas fa-pen"></i></a>

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

        </div>
        <!-- Card Header - Accordion -->
        <div class="card shadow mb-4">
            <a href="#collapseCard" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">

                <h6 class="m-0 font-weight-bold text-primary">Domain:</h6>
            </a>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('projects.scoping_process.activities.create',['project'=>$project -> id,'scoping_process'=>$scoping_process -> id,'phase'=>'domain']) }}">New Activity <i class="fas fa-plus"></i></a>
            </div>

            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseCard" style="">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                            <tr>

                                <th>Name</th>
                                <th>Order</th>
                                <th>Scoping Tech.</th>

                                <th width="320px">Action</th>
                            </tr>

                            @foreach ($scoping_process->activities_domain as $activity)
                            <tr>

                                <td>{{ $activity->name }}</td>
                                <td>{{ $activity->order }}</td>
                                <td>{{ $activity->technique->name }}</td>





                                <td>

                                    <form action="{{ route('projects.scoping_process.activities.destroy', ['project'=>$project->id,'scoping_process'=>$scoping_process->id,'activity'=>$activity->id]) }}" method="POST">



                                        <a class="btn btn-info " href="{{ route('projects.scoping_process.activities.show', ['project'=>$project->id,'scoping_process'=>$scoping_process->id,'activity'=>$activity->id]) }}">View <i class="fas fa-eye"></i> </a>
                                        <a class="btn btn-primary" href="{{ route('projects.scoping_process.activities.edit', ['project'=>$project->id,'scoping_process'=>$scoping_process->id,'activity'=>$activity->id]) }}">Edit <i class="fas fa-pen"></i></a>

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

        </div>

        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCard3" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">

                <h6 class="m-0 font-weight-bold text-primary">Asset:</h6>
            </a>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('projects.scoping_process.activities.create',['project'=>$project -> id,'scoping_process'=>$scoping_process -> id,'phase'=>'asset']) }}">New Activity <i class="fas fa-plus"></i></a>
            </div>

            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseCard3" style="">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                            <tr>

                                <th>Name</th>
                                <th>Order</th>
                                <th>Scoping Tech.</th>

                                <th width="320px">Action</th>
                            </tr>

                            @foreach ($scoping_process->activities_asset as $activity)
                            <tr>

                                <td>{{ $activity->name }}</td>
                                <td>{{ $activity->order }}</td>
                                <td>{{ $activity->technique->name }}</td>





                                <td>

                                    <form action="{{ route('projects.scoping_process.activities.destroy', ['project'=>$project->id,'scoping_process'=>$scoping_process->id,'activity'=>$activity->id]) }}" method="POST">



                                        <a class="btn btn-info " href="{{ route('projects.scoping_process.activities.show', ['project'=>$project->id,'scoping_process'=>$scoping_process->id,'activity'=>$activity->id]) }}">View <i class="fas fa-eye"></i> </a>
                                        <a class="btn btn-primary" href="{{ route('projects.scoping_process.activities.edit', ['project'=>$project->id,'scoping_process'=>$scoping_process->id,'activity'=>$activity->id]) }}">Edit <i class="fas fa-pen"></i></a>

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

        </div>
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCard2" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">

                <h6 class="m-0 font-weight-bold text-primary">Product:</h6>
            </a>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('projects.scoping_process.activities.create',['project'=>$project -> id,'scoping_process'=>$scoping_process -> id,'phase'=>'product']) }}">New Activity <i class="fas fa-plus"></i></a>
            </div>

            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseCard2" style="">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                            <tr>

                                <th>Name</th>
                                <th>Order</th>
                                <th>Scoping Tech.</th>

                                <th width="320px">Action</th>
                            </tr>

                            @foreach ($scoping_process->activities_product as $activity)
                            <tr>

                                <td>{{ $activity->name }}</td>
                                <td>{{ $activity->order }}</td>
                                <td>{{ $activity->technique->name }}</td>





                                <td>

                                    <form action="{{ route('projects.scoping_process.activities.destroy', ['project'=>$project->id,'scoping_process'=>$scoping_process->id,'activity'=>$activity->id]) }}" method="POST">



                                        <a class="btn btn-info " href="{{ route('projects.scoping_process.activities.show', ['project'=>$project->id,'scoping_process'=>$scoping_process->id,'activity'=>$activity->id]) }}">View <i class="fas fa-eye"></i> </a>
                                        <a class="btn btn-primary" href="{{ route('projects.scoping_process.activities.edit', ['project'=>$project->id,'scoping_process'=>$scoping_process->id,'activity'=>$activity->id]) }}">Edit <i class="fas fa-pen"></i></a>

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

            @endif
        </div>





    </div>

    @endsection
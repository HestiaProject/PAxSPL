@extends('projects.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Techniques from project: {{ $project->title }}</h2>
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
        @else



        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                <tr>

                    <th>Name</th>
                    <th>Type</th>
                    <th>Recommendation</th>
                    <th width="320px">Action</th>
                </tr>

                @foreach ($project->techniques() as $technique)
                <tr>

                    <td>{{ $technique->name }}</td>
                    <td>{{ $technique->type }}</td>
                    <td>

                        <div class="progress mb-4">
                            <div class="progress-bar" role="progressbar" style="width: {{$technique->recommend_level($project)}}%; background-color:{{$technique->recommend_level_color($project)}};" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                {{$technique->recommend_level($project)}}%
                            </div>
                        </div>
                    </td>




                    <td>
                        @if ($technique->status($project))
                        <form action="{{ route('projects.technique_projects.destroy', ['project'=>$project->id,'technique_project'=>$technique->id]) }}" method="POST">


                            @else
                            <form >


                                
                                @endif
                                <a class="btn btn-info " href="{{ route('projects.technique.show', ['project'=>$project->id,'technique'=>$technique->id]) }}">View <i class="fas fa-eye"></i> </a>

                                @csrf
                                @if ($technique->status($project))

                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove <i class="fas fa-trash"></i></button>

                                @else
                                <a class="btn btn-success " style="color:#fff" data-toggle="modal" data-target="#myModal">Add <i class="fas fa-plus"></i> </a>
                                @endif



                            </form>
                    </td>
                </tr>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="{{ route('projects.technique_projects.store', ['project'=>$project->id,'technique'=>$technique->id]) }}" method="POST">
                        @csrf
                        @method('post')
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Register Reasons</h5>

                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Explain why this technique is being choosen:</strong>
                                        <textarea class="form-control" style="height:150px" name="reason" placeholder="" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-success ">Register <i class="fas fa-save"></i></button>
                                    <button class="btn btn-danger" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @endforeach
            </table>

        </div>
        @endif
    </div>


</div>


@endsection
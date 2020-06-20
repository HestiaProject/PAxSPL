@extends('projects.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Feature Model: {{ $feature_model->name }}</h2>
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
        @elseif ($project->assemble_process_finished->count()>0)
        <div class="alert alert-danger">
            Before continuing, the retrieval process must be finished!<br><br>
            <a class="collapse-item" href="{{ route('projects.technique_projects.index', $project -> id) }}">Process</a>
        </div>
        @else
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('projects.feature_model.features.create',['project' => $project, 'feature_model' => $feature_model]) }}">New Feature <i class="fas fa-plus"></i></a>

            <a class="btn btn-primary btn-warning" href="{{action('FeatureController@generateDocx',['project' => $project, 'feature_model' => $feature_model])}}">Download Features Report <i class="fas fa-file-download"></i></a>
            <a class="btn btn-primary btn-info" href="{{action('FeatureController@generateXML',['project' => $project, 'feature_model' => $feature_model])}}">Download XML <i class="fas fa-file-code"></i></a>

        </div>
        <br><br>



        <div class="pull-right">


            Legend:
            <a style="color:blue;font-style: italic;">Abstract</a>;
            <a style="color:black"> <i class="fas fa-circle"></i> Mandatory;</a>
            <a style="color:black"> <i class="far fa-circle"></i> Optional;</a>
            <a style="color:black"> <i class="fas fa-play "></i> OR Alternative;</a>
            <a style="color:black"> <i class="fas fa-play icon-white"></i> XOR Alternative;</a>

        </div>
        <br><br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                        <tr>


                            <th>Feature</th>


                            <th width="320px">Action</th>
                        </tr>

                        @foreach ($feature_model->features_order() as $feature)
                        <tr>

                            <td style="{{ $feature->style() }}"><i class="{{$feature->icon()}}"></i> {{ $feature->name }}</td>
                            <td>

                                <form action="{{ route('projects.feature_model.features.destroy', ['project'=>$project->id,'feature_model'=>$feature_model->id,'feature'=>$feature->id]) }}" method="POST">



                                    <a class="btn btn-info " href="{{ route('projects.feature_model.features.show', ['project'=>$project->id,'feature_model'=>$feature_model->id,'feature'=>$feature->id]) }}">View <i class="fas fa-eye"></i> </a>

                                    @csrf


                                    <a class="btn btn-primary" href="{{ route('projects.feature_model.features.edit', ['project'=>$project->id,'feature_model'=>$feature_model->id,'feature'=>$feature->id]) }}">Edit <i class="fas fa-pen"></i></a>
                                    @if($feature->children()->count()==0 && $feature->parent!=null)
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
    @endsection
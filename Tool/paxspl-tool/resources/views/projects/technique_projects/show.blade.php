@extends('projects.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Technique Details</h2>
        </div>

    </div>
</div>

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
@if ($technique->status($project))
<form action="{{ route('projects.technique_projects.destroy', ['project'=>$project->id,'technique_project'=>$technique->id]) }}" method="POST">


    @else
    <form action="{{ route('projects.technique_projects.store', ['project'=>$project->id,'technique'=>$technique->id]) }}" method="POST">


        @csrf
        @method('post')
        @endif
        <div class="row">
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Technique Name" value="{{ $technique->name }}" disabled>
                </div>
            </div>

            <div class="col-xs-7 col-sm-7 col-md-7">
                <div class="form-group">
                    <strong>Variations:</strong>
                    <input type="text" name="variations" class="form-control" value="{{$technique->variations}}" disabled>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Definition:</strong>
                    <textarea class="form-control" style="height:100px" name="definition" placeholder="" disabled>{{ $technique->definition }}</textarea>
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Type:</strong>
                    <input type="text" name="extension" class="form-control" value="{{$technique->type}}" disabled>
                </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <strong>Priority Order:</strong>
                    <input type="text" name="priority_order" class="form-control" value="{{$technique->priority_order}}" disabled>
                </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>Input Artifacts:</strong>
                    <input type="text" name="inputs" class="form-control" value="{{$technique->inputs}}" disabled>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Recommended Situation:</strong>
                    <textarea class="form-control" style="height:150px" name="recommended_situation" placeholder="" disabled>{{ $technique->recommended_situation }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Not Recommended Situation:</strong>
                    <textarea class="form-control" style="height:120px" name="not_recommended_situation" placeholder="" disabled>{{ $technique->not_recommended_situation }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Related Techniques:</strong>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                            <tr>

                                <th>Name</th>
                                <th width="320px">Action</th>
                            </tr>

                            @foreach ($technique->related_techniques_from as $rtechnique)
                            <tr>

                                <td>{{ $rtechnique->techniques_to->name }}</td>


                                <td>
                                    <form method="post">
                                        <a class="btn btn-info " href="{{ route('projects.technique.show', ['project'=>$project->id,'technique'=>$rtechnique->related_to]) }}">View <i class="fas fa-eye"></i> </a>


                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                @csrf
                @if ($technique->status($project))

                @method('DELETE')
                <button type="submit" class="btn btn-danger">Remove from Project <i class="fas fa-trash"></i></button>
                @else
                <button type="submit" class="btn btn-primary">Add to Project <i class="fas fa-plus"></i></button>
                @endif
                <a class="btn  " href="{{ route('projects.technique_projects.index', ['project'=>$project->id]) }}">Back <i class="fas fa-arrow-left"></i></a>

            </div>

        </div>
    </form>
    @endsection
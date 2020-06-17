@extends('projects.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Feature Details</h2>
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
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif



<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Name:</strong>
            <input type="text" name="name" class="form-control" placeholder="Feature Name" value="{{$feature->name}}" disabled>
        </div>
    </div>

    <div class="col-xs-2 col-sm-2 col-md-2">
        <div class="form-group">
            <strong>Feature Type:</strong>
            <select class="custom-select" name="type" value='{{$feature->type}}' disabled>
                <option value="Mandatory" {{ $feature->type == 'Mandatory' ? 'selected="selected"' : '' }}>Mandatory</option>
                <option value="Optional" {{ $feature->type == 'Optional' ? 'selected="selected"' : '' }}>Optional</option>
                <option value="OR Alternative" {{ $feature->type == 'OR Alternative' ? 'selected="selected"' : '' }}>OR Alternative</option>
                <option value="XOR Alternative" {{ $feature->type == 'XOR Alternative' ? 'selected="selected"' : '' }}>XOR Alternative</option>
            </select>
        </div>
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
        <div class="form-group">
            <label style="margin-top: 30px;">
                <input disabled type="checkbox" name="abstract" value="1" class="custom-checkbox" {{ $feature->abstract == 1 ? 'checked="checked"' : '' }}>
                Abstract </label>
        </div>

    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
        <div class="form-group">
            <strong>Parent:</strong>
            <select name="parent" class="form-control" value="{{$feature->parent}}" disabled>
                @foreach($feature_model->features as $f)

                @if($f->id!= $feature->id)
                <option value="{{ $feature->id }}" {{ $feature->parent == $f->id ? 'selected="selected"' : '' }}>
                    {{ $f->name }}
                </option>
                @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-10 col-sm-10 col-md-10">
        <div class="form-group">
            <strong>Description:</strong>
            <textarea class="form-control" id="description" style="height:150px" name="description" placeholder="Description" disabled>{{$feature->description}}</textarea>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn" href="{{ route('projects.feature_model.features.index', ['project'=>$project->id,'feature_model'=>$feature_model->id]) }}">Back <i class="fas fa-arrow-left"></i></a>

            
            <a class="btn btn-primary" href="{{ route('projects.feature_model.features.edit', ['project'=>$project->id,'feature_model'=>$feature_model->id,'feature'=>$feature->id]) }}">Edit <i class="fas fa-pen"></i></a>
        
        </div>
    </div>

</div>
<input type="hidden" id="feature_model_id" name="feature_model_id" value=" {{ $feature_model->id }}">

<br><br>
<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCard" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">

        <h6 class="m-0 font-weight-bold text-primary">Feature Artifacts:</h6>
    </a>
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('projects.feature_model.features.artifact.create',['project'=>$project -> id,'feature_model'=>$feature_model -> id,'feature'=>$feature -> id]) }}">Add Artifact <i class="fas fa-plus"></i></a>
    </div>
    <!-- Card Content - Collapse -->
    <div class="collapse" id="collapseCard" style="">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                    <tr>

                        <th>Name</th>
                        <th>Type</th>
                        <th>Last Update Date</th>
                        <th width="320px">Action</th>
                    </tr>

                    @foreach ($feature->artifacts as $artifact)
                    <tr>

                        <td>{{ $artifact->artifact->name }}</td>
                        <td>{{ $artifact->artifact->type }}</td>
                        <td>{{ date('m-d-Y', strtotime($artifact->artifact->last_update_date))}}</td>


                        <td>

                            <form action="{{ route('projects.feature_model.features.artifact.destroy', ['project'=>$project->id,'feature_model'=>$feature_model->id,'feature'=>$feature->id,'artifact'=>$artifact->id]) }}" method="POST">


                                <a class="btn btn-info " href="{{ route('projects.feature_model.features.artifact.show', ['project'=>$project->id,'feature_model'=>$feature_model->id,'feature'=>$feature->id,'artifact'=>$artifact->id,'io'=>'i']) }}">View <i class="fas fa-eye"></i> </a>
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

@endsection
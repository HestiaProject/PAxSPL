@extends('projects.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Artifact</h2>
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


<form action="{{ route('projects.feature_model.features.artifact.store', ['project'=>$project -> id,'feature_model'=>$feature_model -> id,'feature'=>$feature -> id]) }}" method="POST">
    @csrf
    <div class="row">
         
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>Artifact:</strong>
                <select name="artifact_id" class="form-control">
                    @foreach($project->artifacts as $artifact)
                    <option value="{{ $artifact->id }}">
                        {{ $artifact->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <input type="hidden" id="feature_id" name="feature_id" value=" {{ $feature->id }}">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Save <i class="fas fa-save"></i></button>
        </div>
    </div>

</form>
@endsection
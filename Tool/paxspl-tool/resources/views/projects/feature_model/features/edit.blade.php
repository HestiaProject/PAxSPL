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

<form action="{{ route('projects.feature_model.features.update', ['project'=>$project->id,'feature_model'=>$feature_model->id,'feature'=>$feature->id]) }}" method="POST">
    @csrf

    @method('PUT')

    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Feature Name" value="{{$feature->name}}" required maxlength="100">
            </div>
        </div>

        <div class="col-xs-2 col-sm-2 col-md-2">
            <div class="form-group">
                <strong>Feature Type:</strong>
                <select class="custom-select" name="type" value='{{$feature->type}}'>
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
                    <input type="checkbox" name="abstract" value="1" class="custom-checkbox" {{ $feature->abstract == 1 ? 'checked="checked"' : '' }}>
                    Abstract </label>
            </div>

        </div>
        <div class="col-xs-2 col-sm-2 col-md-2">
            <div class="form-group">
                <strong>Parent:</strong>
                <select name="parent" class="form-control" value="{{$feature->parent}}">
                    @foreach($feature_model->features as $f)

                    @if($f->id!= $feature->id)
                    <option value="{{ $f->id }}" {{ $feature->parent == $f->id ? 'selected="selected"' : '' }}>
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
                <textarea class="form-control" id="description" style="height:150px" name="description" placeholder="Description" required maxlength="500">{{$feature->description}}</textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update <i class="fas fa-save"></i></button>
            </div>
        </div>

    </div>
    <input type="hidden" id="feature_model_id" name="feature_model_id" value=" {{ $feature_model->id }}">

</form>

@endsection
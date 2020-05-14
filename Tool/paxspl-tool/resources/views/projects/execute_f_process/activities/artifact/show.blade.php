@extends('projects.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Artifact Details</h2>
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



<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Name:</strong>
            <input type="text" name="name" class="form-control" placeholder="Artifact Name" value="{{ $artifact->artifact->name }}" disabled>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            <strong>Artifact Type:</strong>
            <input type="text" name="type" class="form-control" value="{{$artifact->artifact->type}}" disabled>
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Link to Artifact:</strong>
            <a target="_blank" href="{{ $artifact->artifact->external_link }}">{{ $artifact->artifact->external_link }}</a>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            <strong>File extension:</strong>
            <input type="text" name="extension" class="form-control" value="{{$artifact->artifact->extension}}" disabled>
        </div>
    </div>

    <div class="col-xs-9 col-sm-9 col-md-9">
        <div class="form-group">
            <strong>Description:</strong>
            <textarea class="form-control" style="height:150px" name="description" placeholder="Description" disabled>{{ $artifact->artifact->description }}</textarea>
        </div>
    </div>
    @if($artifact->status=="problem")
    <div class="col-xs-9 col-sm-9 col-md-9">
        <div class="form-group">
            <strong>Problems found:</strong>
            <textarea class="form-control" style="height:150px" name="obs" placeholder="Description" disabled>{{ $artifact->obs}}</textarea>
        </div>
    </div> 
    @endif
    <div class="col-xs-9 col-sm-9 col-md-9 text-center">
        @if ($io=='o')
        <a class="btn btn-primary" href="{{ route('projects.execute_f_process.activities.artifact.edit', ['project'=>$project->id,'execute_f_process'=>$execute_f_process->id,'activity'=>$activity->id,'artifact'=>$artifact->id]) }}">Edit <i class="fas fa-pen"></i></a>
        @endif
    </div>


</div>

@endsection
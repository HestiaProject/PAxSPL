@extends('projects.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Activity Details</h2>
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
            <input type="text" name="name" class="form-control" placeholder="Activity Name" value="{{ $activity->name }}" disabled>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            <strong>Activity Order:</strong>
            <input type="text" name="type" class="form-control" value="{{$activity->order}}" disabled>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            <strong>Retrieval Technique:</strong>
            <input type="text" name="type" class="form-control" value="{{$activity->technique->name}}" disabled>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

        <a class="btn btn-primary" href="{{ route('projects.assemble_process.activities.edit', ['project'=>$project->id,'assemble_process'=>$assemble_process->id,'activity'=>$activity->id]) }}">Edit <i class="fas fa-pen"></i></a>
    </div>


    <input type="hidden" id="phase" name="phase" value=" {{ $activity->phase }}">
</div>

@endsection
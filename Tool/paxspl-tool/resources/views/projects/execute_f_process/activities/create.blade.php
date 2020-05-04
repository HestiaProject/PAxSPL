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

<form action="{{ route('projects.assemble_process.activities.store', ['project'=>$project->id,'assemble_process'=>$assemble_process->id]) }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Activity Name">
            </div>
        </div>
         
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>Retrieval Technique:</strong>
                <select name="technique_id" class="form-control"> 
                    @foreach($project->techniques_project as $technique)
                    <option value="{{ $technique->technique_id }}">
                        {{ $technique->techniques_pj->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" id="description" style="height:150px" name="description" placeholder="Description"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Save <i class="fas fa-save"></i></button>
            </div>
        </div>

    </div>
    <input type="hidden" id="assemble_process_id" name="assemble_process_id" value=" {{ $assemble_process->id }}">
    <input type="hidden" id="phase" name="phase" value=" {{ $phase }}">
</form>

@endsection
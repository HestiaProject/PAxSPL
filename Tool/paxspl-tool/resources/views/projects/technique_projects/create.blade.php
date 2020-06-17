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

<form action="{{ route('projects.technique.store', ['project'=>$project->id,'technique'=>$technique->id]) }}" method="POST">
    @csrf
    @method('post')

    <div class="row">
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Technique Name" required maxlength="100">
            </div>
        </div>

        <div class="col-xs-7 col-sm-7 col-md-7">
            <div class="form-group">
                <strong>Variations:</strong>
                <input type="text" name="variations" class="form-control" required maxlength="100" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Definition:</strong>
                <textarea class="form-control" style="height:100px" name="definition" placeholder="" required maxlength="500"></textarea>
            </div>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Type:</strong>
                <input type="text" name="extension" class="form-control" required maxlength="100">
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>Priority Order:</strong>
                <input type="text" name="priority_order" class="form-control" required maxlength="100">
            </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>Input Artifacts:</strong>
                <input type="text" name="inputs" class="form-control"  required maxlength="100">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Recommended Situation:</strong>
                <textarea class="form-control" style="height:150px" name="recommended_situation" placeholder="" required maxlength="500"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Not Recommended Situation:</strong>
                <textarea class="form-control" style="height:120px" name="not_recommended_situation" placeholder="" required maxlength="500"></textarea>
            </div>
        </div>
         
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <button type="submit" class="btn btn-primary">Save <i class="fas fa-save"></i></button>

            <a class="btn btn-danger" href="{{ route('projects.technique_projects.index', ['project'=>$project->id]) }}">Cancel <i class="fas fa-arrow-left"></i></a>

        </div>

    </div>
</form>
@endsection
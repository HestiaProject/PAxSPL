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

<form action="{{ route('projects.artifact.store', $project->id) }}" method="POST">
    @csrf
    <div class="row">
        
    <div class="col-xs-6 col-sm-6 col-md-6">
            <label class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Artifact Name" required maxlength="100">
            </label>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <label class="form-group">
                <strong>Artifact Type:</strong>
                <select class="custom-select" name="type" value='' required>

                    <option value="Domain">Domain</option>
                    <option value="Requirements">Requirements</option>
                    <option value="Design">Design</option>
                    <option value="Architecture">Architecture</option>
                    <option value="Development">Development</option>
                    <option value="Technological">Technological</option>
                </select>
            </label>
        </div>
        
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Link to Artifact:</strong>
                <input type="text" name="external_link" class="form-control" placeholder="Link to Artifact" required maxlength="100">
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>File extension:</strong>
                <input type="text" name="extension" class="form-control" placeholder="File Extension (pdf, doc, xml, etc)" required maxlength="100">
            </div>
        </div>
        <div class="col-xs-9 col-sm-9 col-md-9">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description" required maxlength="500"></textarea>
            </div>
        </div>
        <input type="hidden" id="project_id" name="project_id" value=" {{ $project->id }}">
        <div class="col-xs-9 col-sm-9 col-md-9 text-center">
            <button type="submit" class="btn btn-primary">Save <i class="fas fa-save"></i></button>
        </div>
    </div>

</form>
@endsection
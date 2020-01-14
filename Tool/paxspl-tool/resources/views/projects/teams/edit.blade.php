@extends('projects.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add information.</h2>
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

<form action="{{ route('projects.teams.update',['project'=>$project->id,'team'=>$team->id, ]) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Company Role:</strong>
                <input type="text" name="company_role" value="{{ $team->company_role }}" class="form-control" placeholder="Analyst, Developer, etc">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Experience working with Software Product Lines:</strong>
                <textarea class="form-control" style="height:120px" name="spl_exp" placeholder="Description of experience working with SPL.">{{ $team->spl_exp }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Experience working with Feature Retrieval:</strong>
                <textarea class="form-control" style="height:120px" name="retrieval_exp" placeholder="Description of experience with Feature Retrieval">{{ $team->retrieval_exp }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Observation:</strong>
                <textarea class="form-control" style="height:120px" name="obs" placeholder="">{{ $team->obs }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Experience with Retrieval Techniques:</strong>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label> <input type="checkbox" name="fca" value="1" class="custom-checkbox" {{ $team->fca == 1 ? 'checked="checked"' : '' }}>
                    Formal Concept Analysis (FCA) </label>
                <label><input type="checkbox" name="vsm" value="1" class="custom-checkbox" {{ $team->vsm == 1 ? 'checked="checked"' : '' }}> Vector Space Model (VSM)</label>
                <label><input type="checkbox" name="lsi" value="1" class="custom-checkbox" {{ $team->lsi == 1 ? 'checked="checked"' : '' }}> Latent Semantic Indexing</label>
            </div>
            <div class="form-group">
                <label> <input type="checkbox" name="cluster" value="1" class="custom-checkbox" {{ $team->cluster == 1 ? 'checked="checked"' : '' }}> Clustering</label>
                <label><input type="checkbox" name="dependency" value="1" class="custom-checkbox" {{ $team->dependency == 1 ? 'checked="checked"' : '' }}> Dependency Analysis</label>
                <label> <input type="checkbox" name="data_flow" value="1" class="custom-checkbox" {{ $team->data_flow == 1 ? 'checked="checked"' : '' }}> Data Flow Analysis</label>
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Save <i class="fas fa-save"></i></button>
        </div>
    </div>

</form>
@endsection
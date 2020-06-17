@extends('projects.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Experience</h2>
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

<form action="{{ route('projects.exp_process.experiences.store', ['project' => $project, 'exp_process' => $exp_process]) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Activity:</strong>
                <select name="activity_id" class="form-control">
                    @foreach($exp_process->activities_no_exp as $a)
                    <option value="{{ $a->id }}">
                        {{ $a->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>Time Spent (hours):</strong>
                <input type="number" name="time" class="form-control" placeholder="Time spent in this activity" >
            </div>
        </div>
          
        <div class="col-xs-9 col-sm-9 col-md-9">
            <div class="form-group">
                <strong>Difficulties:</strong>
                <textarea class="form-control" style="height:150px" name="difficulty" placeholder="Difficulties during the activity" required maxlength="500"></textarea>
            </div>
        </div>
        <div class="col-xs-9 col-sm-9 col-md-9">
            <div class="form-group">
                <strong>Decisions or Observations:</strong>
                <textarea class="form-control" style="height:150px" name="obs" placeholder="Decisions made during this activity" required maxlength="500"></textarea>
            </div>
        </div>
        
        <div class="col-xs-9 col-sm-9 col-md-9 text-center">
            <button type="submit" class="btn btn-primary">Save <i class="fas fa-save"></i></button>
        </div>
    </div>

</form>
@endsection
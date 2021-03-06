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


<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Activity:</strong>
            <select name="activity_id" class="form-control" value="{{$experience->activity_id}}" disabled>
                @foreach($exp_process->activities as $a)
                @if($a->experience_id==null || $a->id == $experience->activity_id)
                <option value="{{ $a->id }}">
                    {{ $a->name }}
                </option>
                @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            <strong>Time Spent (hours):</strong>
            <input type="number" name="time" class="form-control" placeholder="Time spent in this activity" value="{{$experience->time}}" disabled>
        </div>
    </div>

    <div class="col-xs-9 col-sm-9 col-md-9">
        <div class="form-group">
            <strong>Difficulties:</strong>
            <textarea class="form-control" style="height:150px" name="difficulty" placeholder="Difficulties during the activity" disabled>{{$experience->difficulty}}</textarea>
        </div>
    </div>
    <div class="col-xs-9 col-sm-9 col-md-9">
        <div class="form-group">
            <strong>Decisions or Observations:</strong>
            <textarea class="form-control" style="height:150px" name="obs" placeholder="Decisions made during this activity" disabled>{{$experience->obs}}</textarea>
        </div>
    </div>

    <div class="col-xs-9 col-sm-9 col-md-9 text-center">
        <a class="btn" href="{{ route('projects.exp_process.experiences.index', ['project'=>$project->id,'exp_process'=>$exp_process->id]) }}">Back <i class="fas fa-arrow-left"></i></a>

        <a class="btn btn-primary" href="{{ route('projects.exp_process.experiences.edit', ['project'=>$project->id,'exp_process'=>$exp_process->id,'experience'=>$experience->id]) }}">Edit <i class="fas fa-pen"></i></a>

    </div>
</div>

@endsection
@extends('projects.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Activity Details</h2>
        </div>

    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

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

<form action="{{ route('projects.execute_s_process.activities.update', ['project'=>$project->id,'execute_s_process'=>$execute_s_process->id,'activity'=>$activity->id]) }}" method="POST">
    @csrf

    @method('PUT')
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Activity Name" value="{{$activity->name}}" disabled>
            </div>
        </div>

        <div class="col-xs-1 col-sm-1 col-md-1">
            <div class="form-group">
                <strong>Order:</strong>
                <select name="order" class="form-control" value="{{$activity->order}}" disabled>

                    @if ($activity->phase == 'SupportS')

                    @foreach($execute_s_process->activities_support as $ac)
                    <option value="{{ $ac->order }}" {{ $activity->order == $ac->order ? 'selected="selected"' : '' }}>
                        {{ $ac->order }}
                    </option>
                    @endforeach
                    @else
                    @if ($activity->phase == 'domain')

                    @foreach($execute_s_process->activities_domain as $ac)
                    <option value="{{ $ac->order }}" {{ $activity->order == $ac->order ? 'selected="selected"' : '' }}>
                        {{ $ac->order }}
                    </option>
                    @endforeach
                    @else
                    @if ($activity->phase == 'asset')

                    @foreach($execute_s_process->activities_asset as $ac)
                    <option value="{{ $ac->order }}" {{ $activity->order == $ac->order ? 'selected="selected"' : '' }}>
                        {{ $ac->order }}
                    </option>
                    @endforeach
                    @else
                    @if ($activity->phase == 'product')

                    @foreach($execute_s_process->activities_product as $ac)
                    <option value="{{ $ac->order }}" {{ $activity->order == $ac->order ? 'selected="selected"' : '' }}>
                        {{ $ac->order }}
                    </option>
                    @endforeach
                    @endif
                    @endif
                    @endif
                    @endif
                </select>
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>Retrieval Technique:</strong>
                <select name="technique_id" class="form-control" value="{{$activity->technique->name}}" disabled>
                    @foreach($project->scoping_techniques($activity->phase) as $technique)
                    <option value="{{ $technique->id }}" {{ $activity->technique_id == $technique->id ? 'selected="selected"' : '' }}>
                        {{ $technique->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" id="description" style="height:150px" name="description" placeholder="Description" disabled>{{$activity->description}}</textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary" name="status" value="doing">Pause <i class="fas fa-pause"></i>

                </button>

                <button type="submit" class="btn btn-success" name="status" value="done">Conclude <i class="fas fa-check"></i>

                </button>

            </div>
        </div>

    </div>
    <input type="hidden" id="assemble_process_id" name="assemble_process_id" value=" {{ $execute_s_process->id }}">
</form>
<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCard" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">

        <h6 class="m-0 font-weight-bold text-primary">Input Artifacts:</h6>
    </a>
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('projects.execute_s_process.activities.artifact.create',['project'=>$project -> id,'execute_s_process'=>$execute_s_process -> id,'activity'=>$activity -> id,'io'=>'i']) }}">Add Artifact <i class="fas fa-plus"></i></a>
    </div>
    <!-- Card Content - Collapse -->
    <div class="collapse" id="collapseCard" style="">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                    <tr>

                        <th>Name</th>
                        <th>Type</th>
                        <th>Last Update Date</th>
                        <th width="320px">Action</th>
                    </tr>

                    @foreach ($activity->input_artifacts as $artifact)
                    <tr>

                        <td>{{ $artifact->artifact->name }}</td>
                        <td>{{ $artifact->artifact->type }}</td>
                        <td>{{ date('m-d-Y', strtotime($artifact->artifact->last_update_date))}}</td>


                        <td>

                            <form action="{{ route('projects.execute_s_process.activities.artifact.destroy', ['project'=>$project->id,'execute_s_process'=>$execute_s_process->id,'activity'=>$activity->id,'artifact'=>$artifact->id]) }}" method="POST">


                                <a class="btn btn-info " href="{{ route('projects.execute_s_process.activities.artifact.show', ['project'=>$project->id,'execute_s_process'=>$execute_s_process->id,'activity'=>$activity->id,'artifact'=>$artifact->id,'io'=>'i']) }}">View <i class="fas fa-eye"></i> </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove <i class="fas fa-trash"></i></button>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>
<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCard3" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">

        <h6 class="m-0 font-weight-bold text-primary">Output Artifacts:</h6>
    </a>

    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('projects.execute_s_process.activities.artifact.create',['project'=>$project -> id,'execute_s_process'=>$execute_s_process -> id,'activity'=>$activity -> id,'io'=>'o']) }}">Add Artifact <i class="fas fa-plus"></i></a>
    </div>
    <!-- Card Content - Collapse -->
    <div class="collapse" id="collapseCard3" style="">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                    <tr>

                        <th>Name</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Last Update Date</th>
                        <th width="320px">Action</th>
                    </tr>

                    @foreach ($activity->output_artifacts as $artifact)
                    <tr>

                        <td>{{ $artifact->artifact->name }}</td>
                        <td>{{ $artifact->artifact->type }}</td>
                        <td style="color:{{$artifact->status_color()}}">{{ $artifact->status() }}</td>
                        <td>{{ date('m-d-Y', strtotime($artifact->artifact->last_update_date))}}</td>





                        <td>

                            <form action="{{ route('projects.execute_s_process.activities.artifact.destroy', ['project'=>$project->id,'execute_s_process'=>$execute_s_process->id,'activity'=>$activity->id,'artifact'=>$artifact->id]) }}" method="POST">


                                <a class="btn btn-info " href="{{ route('projects.execute_s_process.activities.artifact.show', ['project'=>$project->id,'execute_s_process'=>$execute_s_process->id,'activity'=>$activity->id,'artifact'=>$artifact->id,'io'=>'o']) }}">View <i class="fas fa-eye"></i> </a>
                                <a class="btn btn-primary" href="{{ route('projects.execute_s_process.activities.artifact.edit', ['project'=>$project->id,'execute_s_process'=>$execute_s_process->id,'activity'=>$activity->id,'artifact'=>$artifact->id]) }}">Edit <i class="fas fa-pen"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove <i class="fas fa-trash"></i></button>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
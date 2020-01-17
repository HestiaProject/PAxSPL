@extends('projects.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Domain Artifacts of project: {{ $project->title }}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('projects.domain.create',$project -> id) }}">New Artifact <i class="fas fa-plus"></i></a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger">
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




<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                <tr>

                    <th>Name</th>
                    <th>Owner</th>
                    <th>Last Update Date</th>
                    <th>Last Update by</th>
                    <th width="320px">Action</th>
                </tr>

                @foreach ($project->domains as $domain)
                <tr>

                    <td>{{ $domain->name }}</td>
                    <td>{{ $domain->owner->name }}</td>
                    <td>{{ date('d-m-Y', strtotime($domain->last_update_date))}}</td>
                    <td>{{ $domain->update_user->name }}</td>


                    <td>
                        <form action="{{ route('projects.domain.destroy', ['domain'=>$domain->id,'project'=>$project->id]) }}" method="post">
                            <a class="btn btn-info " href="{{ route('projects.domain.show', ['project'=>$project->id,'domain'=>$domain->id]) }}">View <i class="fas fa-eye"></i> </a>
                            <a class="btn btn-primary" href="{{ route('projects.domain.edit', ['project'=>$project->id,'domain'=>$domain->id]) }}">Edit <i class="fas fa-pen"></i></a>
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
@endsection
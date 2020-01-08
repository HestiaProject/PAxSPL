@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Your projects</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('projects.create') }}">New Project <i class="fas fa-plus"></i></a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Owner</th>
                    <th width="300px">Action</th>
                </tr>
                @foreach ($projects as $project)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->user->name }}</td>
                    <td>
                        <form action="{{ route('projects.destroy',$project->id) }}" method="POST">

                            <a class="btn btn-info " href="{{ route('projects.show',$project->id) }}">Enter <i class="fas fa-folder-open"></i> </a>
                            @if ($project->owner_id == Auth::user()->id)
                            <a class="btn btn-primary" href="{{ route('projects.edit',$project->id) }}">Edit <i class="fas fa-edit"></i></a>

                            @csrf
                            @method('DELETE')
                            
                            <button type="submit" class="btn btn-danger">Delete <i class="fas fa-trash"></i></button>
                            @endif
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>


@endsection
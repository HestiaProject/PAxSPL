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


<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCard" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">

        <h6 class="m-0 font-weight-bold text-primary">Artifacts:</h6>
    </a>

    <!-- Card Content - Collapse -->

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

                @foreach ($check_f_process->artifacts() as $artifact)
                <tr>

                    <td>{{ $artifact->artifact->name }}</td>
                    <td>{{ $artifact->artifact->type }}</td>
                    <td style="color:{{$artifact->status_color()}}">{{ $artifact->status() }}</td>
                    <td>{{ date('m-d-Y', strtotime($artifact->artifact->last_update_date))}}</td>
 
                    <td>

                        <form action="{{ route('projects.check_f_process.artifact.destroy', ['project'=>$project->id,'check_f_process'=>$check_f_process->id,'artifact'=>$artifact->id]) }}" method="POST">


                            <a class="btn btn-info " href="{{ route('projects.check_f_process.artifact.edit', ['project'=>$project->id,'check_f_process'=>$check_f_process->id,'artifact'=>$artifact->artifact->id,'io'=>'i']) }}">Check <i class="fas fa-check"></i> </a>


                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>


</div>


@endsection
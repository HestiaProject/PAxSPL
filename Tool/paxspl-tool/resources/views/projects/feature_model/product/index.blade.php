@extends('projects.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Project: {{ $project->title }}</h2>
        </div>
        <!-- <div class="pull-right">
            <a class="btn btn-success" href="{{ route('projects.technique_projects.create',$project -> id) }}">New Technique <i class="fas fa-plus"></i></a>
        </div> -->
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
        @if ($project->status_user())
        <div class="alert alert-danger">
            Before continuing, all team members information must be completed!<br><br>
            <a class="collapse-item" href="{{ route('projects.teams.index', $project -> id) }}">Collect Team Information</a>
        </div>
        @elseif ($project->artifacts->count()==0)
        <div class="alert alert-danger">
            Before continuing, at least one artifact must be created!<br><br>
            <a class="collapse-item" href="{{ route('projects.artifact.index', $project -> id) }}">Register Artifacts</a>
        </div>
        @elseif ($project->techniques_project->count()==0)
        <div class="alert alert-danger">
            Before continuing, at least one technique must be added to the project!<br><br>
            <a class="collapse-item" href="{{ route('projects.technique_projects.index', $project -> id) }}">Add Techniques</a>
        </div>
        @elseif ($project->assemble_process_finished->count()>0)
        <div class="alert alert-danger">
            Before continuing, the retrieval process must be finished!<br><br>
            <a class="collapse-item" href="{{ route('projects.technique_projects.index', $project -> id) }}">Process</a>
        </div>
        @else
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('projects.feature_model.product.create',['project' => $project, 'feature_model' => $feature_model]) }}">New Product <i class="fas fa-plus"></i></a>
        </div>
        <br> 
        <div class="card shadow mb-4">
            <a class="d-block card-header py-3 collapsed" href="#collapseTrace" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseTrace">

                <h6 class="m-0 font-weight-bold text-primary">Feature Traceability Matrix:</h6>
            </a>

            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseTrace" style="">
                <div class="card-body">


                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                            <tr>
                                <th><strong> Features/Products</strong></th>
                                @foreach ($feature_model->products as $product)
                                <th>{{ $product->name }}</th>
                                @endforeach

                            </tr>
                            @foreach ($feature_model->features_order() as $feature)
                            <tr>

                                <td>{{ $feature->name }}</td>
                                @foreach ($feature_model->products as $product)

                                <td style=" text-align: center; vertical-align: middle;">{!! $product->check_feature($feature) !!}</td>

                                @endforeach
                            </tr>
                            @endforeach
                        </table>


                    </div>
                </div>
            </div>
        </div>
        <div class="pull-left">
            <h2>My Products:</h2>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                <tr>

                    <th>Name</th>

                    <th width="600px">Action</th>
                </tr>
                @foreach ($feature_model->products as $product)
                <tr>

                    <td>{{ $product->name }}</td>
                    <td>
                        <form action="{{ route('projects.feature_model.product.destroy',['project'=>$project->id, 'feature_model'=>$feature_model->id, 'product'=>$product->id]) }}" method="POST">

                            <a class="btn btn-primary btn-warning" href="{{action('ProductController@generateDocx',['project' => $project, 'feature_model' => $feature_model, 'product' => $product])}}">Feature Report <i class="fas fa-file-download"></i></a>

                            <a class="btn btn-primary btn-info" href="{{action('ProductController@generateXML',['project' => $project, 'feature_model' => $feature_model, 'product' => $product])}}">Configuration XML <i class="fas fa-file-code"></i></a>


                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete <i class="fas fa-trash"></i></button>

                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            @endif

        </div>
    </div>
</div>



@endsection
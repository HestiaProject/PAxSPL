@extends('projects.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Feature Model: {{ $feature_model->name }}</h2>
        </div>

    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Feature Model</h6>
    </div>
    <div class="card-body">
        <div id="canvas"></div>
    </div>

</div>
 

 
@endsection
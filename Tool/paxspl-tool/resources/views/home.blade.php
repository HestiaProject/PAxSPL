@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header py-3">Project Management</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <a href="{{ url('/projects') }}" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-list-alt"></i>
                        </span>
                        <span class="text">My Projects</span>
                    </a>
                    <div class="my-2"></div>
                    <a href="{{ url('/projects/create') }}" class=" btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">New Project</span>
                    </a>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
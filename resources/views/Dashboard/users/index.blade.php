@extends('layouts.dashboard')
@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

@endsection
@section('content')
    <div class="col-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">All USERS</h3>
                @if (auth()->user()->hasRole('super_admin'))
                    <a href="/user-control/roles-assignment" style="float: right;text-decoration: none;" class="mx-2">
                        <button class="btn btn-outline-light mx-2">USERS CONTROL</button>
                    </a>
                @endif
                @if (auth()->user()->hasPermission('readtrashed_users'))
                    <a href="{{route('users.trashed')}}" style="float: right;text-decoration: none;" class="mx-2">
                        <button class="btn btn-outline-light mx-2">Users Trash</button>
                    </a>
                @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                {!! $dataTable->table(['class'=>'table table-bordered table-striped']) !!}
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- modal -->
    <div class="modal fade" id="delModel">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Delete User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['data-action' => route('users.index') , 'method' => 'delete' , 'class' => 'deleteForm']) !!}
                <div class="modal-body">
                    <p>Are You Sure?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    {!! Form::submit('Delete' , [ 'class'=>"btn margin btn-default"]) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
@push('js')
    {!! $dataTable->scripts() !!}
@endpush

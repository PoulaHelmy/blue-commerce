@extends('layouts.dashboard')
@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

@endsection
@section('content')
    <div class="col-3 m-auto">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="{{auth()->user()->image_path}}"
                         alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>

                <p class="text-muted text-center">{{auth()->user()->email}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Role</b> <a class="float-right">{{auth()->user()->roles[0]->display_name}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Account Status</b> <a
                                class="float-right">{{auth()->user()->status == 1 ? "Active" : "In-Active"}}</a>
                    </li>
                </ul>

                @if(auth()->user()->hasPermission('update_profile'))
                    <a href="{{route('edit.profile',auth()->user()->email)}}" class="btn btn-primary btn-block"><b>Update
                            Profile
                            Data</b></a>
                @else
                    <button class="btn btn-primary disabled btn-block cursor-not-allowed"
                    ><b>Update
                            Profile
                            Data</b></button>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

@endsection


@extends('layouts.dashboard')
@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('profile')}}">Profile</a></li>
                    <li class="breadcrumb-item active">Edit Profile</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('content')
    <div class="col-12">
        <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-2 border-bottom-0">
            </div>
            <div class="card-body">
                {{Form::open(['route'=>['update.profile',$user->id],'method'=>'PUT','files'=>'true'])}}
                <div class="row">
                    <input type="hidden" class="d-none" id="id" name="id" value="{{$user->id}}">
                    <div class="form-group col-6">
                        <label for="name">User Name*</label>
                        <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name"
                               id="name" value="{{$user->name}}"
                               placeholder="User name">
                        @if($errors->has('name'))
                            <label class="col-form-label" for="name"><i
                                        class="far fa-times-circle"></i> {{ $errors->first('name') }}</label>
                        @endif
                    </div>
                    <div class="form-group col-6">
                        <label for="slug">User Email*</label>
                        <input type="email" class="form-control" disabled name="email"
                               id="email" value="{{$user->email}}"
                               placeholder="Email">
                        @if($errors->has('email'))
                            <p class="text-danger">
                                {{ $errors->first('email') }}
                            </p>
                        @endif
                    </div>
                    <div class="form-group col-6">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        @if($errors->has('password'))
                            <p class="text-danger">
                                {{ $errors->first('password') }}
                            </p>
                        @endif
                    </div>
                    <div class="form-group col-6">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control"
                               placeholder="Confirm Password">
                        @if($errors->has('password_confirmation'))
                            <p class="text-danger">
                                {{ $errors->first('password_confirmation') }}
                            </p>
                        @endif
                    </div>
                    <div class="form-group col-12">
                        <label>User Role</label>
                        <input type="text" class="form-control" disabled name="role"
                               id="email" value="{{$user->roles[0]->display_name}}"
                               placeholder="Email">
                    </div><!-- end of form-group -->
                    <div class="form-group col-6">
                        <label for="exampleInputFile">User Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file"
                                       class="custom-file-input user_banner_image"
                                       id="exampleInputFile" name="image">
                                <label class="custom-file-label"
                                       for="exampleInputFile">Choose
                                    file</label>
                            </div>
                        </div>
                    </div>
                    <!--  Images Preview --->
                    <div class=" form-group col-6">
                        <h4 class="display-5">User Image</h4>
                        <img src="{{asset($user->image_path)}}" width="150px"
                             height="150px"
                             class="img-thumbnail  user_banner_image_preview">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>

            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.card -->
    </div>
    </div>

@endsection
@push('js')
    <script>
        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

        $(".user_banner_image").change(function () {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.user_banner_image_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }

        });

    </script>
@endpush

@extends('layouts.dashboard')
@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
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
                {{Form::open(['route'=>['users.update',$user->id],'method'=>'PUT','files'=>'true'])}}
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
                        <label for="email">User Email*</label>
                        <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"
                               name="email"
                               id="email" value="{{$user->email}}"
                               placeholder="Email">
                        @if($errors->has('email'))
                            <label class="col-form-label" for="email"><i
                                        class="far fa-times-circle"></i> {{ $errors->first('email') }}</label>
                        @endif
                    </div>
                    <div class="form-group col-6">
                        <label>Password</label>
                        <input type="password" name="password"
                               class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}"
                               placeholder="Password">
                        @if($errors->has('password'))
                            <label class="col-form-label" for="password"><i
                                        class="far fa-times-circle"></i> {{ $errors->first('password') }}</label>
                        @endif
                    </div>
                    <div class="form-group col-6">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation"
                               class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}"
                               placeholder="Confirm Password">
                        @if($errors->has('password_confirmation'))
                            <label class="col-form-label" for="password_confirmation"><i
                                        class="far fa-times-circle"></i> {{ $errors->first('password_confirmation') }}
                            </label>
                        @endif
                    </div>
                    <div class="form-group col-12">
                        <label>User Role</label>
                        <select name="role" class="form-control {{$errors->has('role') ? 'is-invalid' : ''}}">
                            @foreach (\App\Models\Role::all() as $role)
                                <option
                                        value="{{ $role->id }}" {{ isset($user) && $user->roles[0]->id == $role->id ? 'selected' : '' }}>{{$role->name}}</option>
                            @endforeach
                        </select>

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
                <div class="float-right">
                    @if(auth()->user()->hasPermission('update_users'))
                        <input type="checkbox" name="status" {{$user->status===1? 'checked' : ''}} data-bootstrap-switch
                               data-off-color="danger"
                               data-on-color="success">
                    @endif

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

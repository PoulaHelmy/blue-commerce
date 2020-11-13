@extends('layouts.dashboard')
@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add New User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
                    <li class="breadcrumb-item active">Add New User</li>
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
                {{Form::open(['route'=>['users.store'],'method'=>'POST','files'=>'true'])}}
                <div class="row">
                    <div class="form-group col-6">
                        <label for="name">User Name*</label>
                        <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name"
                               id="name"
                               required value="{{old('name')}}"
                               placeholder="User name">
                        @if($errors->has('name'))
                            <div class="form-group">
                                <label class="col-form-label" for="name"><i
                                            class="far fa-times-circle"></i> {{ $errors->first('name') }}</label>
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-6">
                        <label for="email">User Email*</label>
                        <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"
                               name="email"
                               id="email" value="{{old('email')}}"
                               required
                               placeholder="Email">
                        @if($errors->has('email'))
                            <label class="col-form-label" for="email"><i
                                        class="far fa-times-circle"></i> {{ $errors->first('email') }}</label>

                        @endif
                    </div>
                    <div class="form-group col-6">
                        <label>Password</label>
                        <input type="password" name="password" required
                               class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}"
                               placeholder="Password">
                        @if($errors->has('password'))
                            <label class="col-form-label" for="password"><i
                                        class="far fa-times-circle"></i> {{ $errors->first('password') }}</label>

                        @endif
                    </div>
                    <div class="form-group col-6">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" required
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
                        <select name="role" class="form-control">
                            @foreach (\App\Models\Role::all() as $role)
                                <option
                                        value="{{ $role->id }}">{{$role->name}}</option>
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
                        <img src="{{asset('/uploads/user_images/default.png')}}" width="150px"
                             height="150px"
                             class="img-thumbnail  user_banner_image_preview">
                    </div>
                </div>
                <div class="float-right">
                    <input type="checkbox" name="status" checked data-bootstrap-switch data-off-color="danger"
                           data-on-color="success">
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

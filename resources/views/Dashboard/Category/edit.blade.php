@extends('layouts.dashboard')
@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Update Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Category</a></li>
                    <li class="breadcrumb-item active">Update Category</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

@endsection

@section('content')
    <div class="col-12">
        <div class="card card-dark card-tabs">
            <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active text-capitalize"
                           id="custom-tabs-one-tab" data-toggle="pill"
                           href="#custom-tabs-one" role="tab"
                           aria-controls="custom-tabs-one"
                           aria-selected="true">Basic Information</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                {{Form::open(['route'=>['categories.update',$category->id],'method'=>'PUT','files'=>'true'])}}

                <div class="tab-content mb-4" id="custom-tabs-tabContent">
                    <!---- BASIC CONTENT CONTENT--->
                    <div class="tab-pane fade show active"
                         id="custom-tabs-one" role="tabpanel"
                         aria-labelledby="custom-tabs-one">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="name">Category Name*</label>
                                    <input type="text" class="form-control" name="name"
                                           id="name"
                                           required
                                           value="{{$category->name}}"
                                           placeholder="Category name ">
                                    @if($errors->has('name'))
                                        <p class="text-danger">
                                            {{ $errors->first('name') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">Category slug*</label>
                                    <input type="text" class="form-control" name="slug"
                                           id="slug"
                                           value="{{$category->slug}}"
                                           required
                                           placeholder="Category slug ">
                                    @if($errors->has('slug'))
                                        <p class="text-danger">
                                            {{ $errors->first('slug') }}
                                        </p>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-dark w-100">Submit</button>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /card -->
    </div>
    </div>

@endsection
@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            $('input[name="name"]').keyup(function () {
                var slug = $(this).val().toLowerCase().replace(/\ /g, '-')
                console.log(slug);
                $('input[name="slug"]').val(slug)
            });
        });
    </script>
@endpush

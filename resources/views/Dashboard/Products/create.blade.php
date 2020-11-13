@extends('layouts.dashboard')
@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add New Product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('products.index')}}">Category</a></li>
                    <li class="breadcrumb-item active">Add New Product</li>
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
                {{Form::open(['route'=>['products.store'],'method'=>'POST','files'=>'true'])}}

                <div class="tab-content mb-4" id="custom-tabs-tabContent">
                    <!---- BASIC CONTENT CONTENT--->
                    <div class="tab-pane fade show active"
                         id="custom-tabs-one" role="tabpanel"
                         aria-labelledby="custom-tabs-one">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="name">Brand Name*</label>
                                    <input type="text" class="form-control" name="name"
                                           id="name"
                                           required value="{{old('name.')}}"
                                           placeholder="Brand name ">
                                    @if($errors->has('name'))
                                        <p class="text-danger">
                                            {{ $errors->first('name') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">Brand slug*</label>
                                    <input type="text" class="form-control" name="slug"
                                           id="slug" value="{{old('slug')}}"
                                           required
                                           placeholder="Brand slug ">
                                    @if($errors->has('slug'))
                                        <p class="text-danger">
                                            {{ $errors->first('slug') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="slug">Product SKE</label>
                                    <input type="text" class="form-control" name="ske"
                                           id="slug" value="{{old('ske')}}"
                                           required
                                           placeholder="Product SKE ">
                                    @if($errors->has('ske'))
                                        <p class="text-danger">
                                            {{ $errors->first('ske') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="categories">Brand</label>
                                    <select name="brand_id" class="form-control">
                                        @foreach(\App\Models\Brand::all() as $brand)
                                            <option
                                                value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputFile">Product Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file"
                                               class="custom-file-input product_banner_image"
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
                                <img src="{{asset('/uploads/product_images/defalut.png')}}" width="150px"
                                     height="150px"
                                     class="img-thumbnail  product_banner_image_preview">
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
        $(".product_banner_image").change(function () {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.product_banner_image_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }

        });

    </script>
@endpush

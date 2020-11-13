@extends('layouts.dashboard')
@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Brands</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Brands</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="container-fluid">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center">
                    <div class="col-12">
                        <!-- general form elements -->
                        <div class="card card-dark">
                            <div class="card-header">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-12 col-md-4">
                                        <h3 class="card-title">All Brands</h3>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <form action="/brands" method="get">
                                            <div class="row justify-content-end align-items-center">
                                                <div class="col-md-4">
                                                    <input type="text" name="search" class="form-control"
                                                           placeholder="Search"
                                                           value="{{ request()->search }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-light text-dark"><i
                                                            class="fa fa-search mx-2"></i>Search
                                                    </button>
                                                    @if (auth()->user()->hasPermission('create_brands'))
                                                        <a href="{{ route('brands.create') }}"
                                                           class="btn btn-light text-dark"><i
                                                                class="fa fa-plus mx-2"></i> Add</a>
                                                    @else
                                                        <a href="#" class="btn  btn-light text-dark disabled"><i
                                                                class="fa fa-plus mx-2"></i> Add</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </form><!-- end of form -->
                                    </div>
                                </div>
                            </div>

                            @if ($finalResults->count() > 0)

                                <table class="table table-hover">

                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        @if (auth()->user()->hasPermission('update_brands','delete_brands'))
                                            <th>Actions</th>
                                        @endif
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($finalResults as $index=>$row)
                                        <tr>
                                            <td>{{ $index + 1+(($finalResults->currentPage()-1) * $finalResults->perPage()) }}</td>
                                            <td>{{$row->name}}</td>
                                            <td>
                                                {{$row->slug}}
                                            </td>
                                            <td class="text-center">
                                                @if (auth()->user()->hasPermission('delete_brands'))
                                                    <form action="{{ route('brands.destroy', $row->id) }}"
                                                          method="post"
                                                          style="display: inline-block">
                                                        {{ csrf_field() }}
                                                        {{ method_field('delete') }}
                                                        <button type="submit"
                                                                class="btn btn-danger delete btn-sm swalDefaultErrorCheck">
                                                            <i
                                                                class="fa fa-trash"></i> Delete
                                                        </button>
                                                    </form><!-- end of form -->
                                                @else
                                                    <button class="btn btn-danger btn-sm disabled"><i
                                                            class="fa fa-trash"></i> Delete
                                                    </button>
                                                @endif
                                                @if (auth()->user()->hasPermission('update_brands'))
                                                    <form action="{{ route('brands.edit', $row->id) }}"
                                                          method="put"
                                                          style="display: inline-block">
                                                        {{ csrf_field() }}
                                                        {{ method_field('put') }}
                                                        <button type="submit"
                                                                class="btn btn-warning btn-sm">
                                                            <i class="fas fa-trash-restore mx-2"
                                                               aria-hidden="true"></i>Update
                                                        </button>
                                                    </form><!-- end of form -->
                                                @else
                                                    <button class="btn btn-danger btn-sm disabled"><i
                                                            class="fa fa-trash"></i>Update
                                                    </button>
                                                @endif

                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>

                                </table><!-- end of table -->

                                {{ $finalResults->appends(request()->query())->links() }}

                            @else

                                <div class="error-content text-center my-4">
                                    <h3><i class="fas fa-exclamation-triangle text-warning"></i>
                                        Oops! No Data</h3>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- end of content -->
    </div>
@endsection
@push('js')
@endpush

@extends('layouts.dashboard')
@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Trashed Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Trashed Users</li>
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
                                        <h3 class="card-title">Trashed Users</h3>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <form action="/users/trashed" method="get">
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
                                                    @if (auth()->user()->hasPermission('create_users'))
                                                        <a href="{{ route('users.create') }}"
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
                                        <th>Email</th>
                                        <th>Status</th>
                                        @if (auth()->user()->hasPermission('update_users','delete_users'))
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
                                                {{$row->email}}
                                            </td>
                                            <td>
                                                @if($row->status == 1)
                                                    {{'Active'}}
                                                @else
                                                    {{'In-Active'}}
                                                @endif
                                            </td>
                                            <td>
                                                @if (auth()->user()->hasPermission('forcedelete_users'))
                                                    <form action="{{ route('users.forceDelete', $row->id) }}"
                                                          method="post"
                                                          style="display: inline-block">
                                                        {{ csrf_field() }}
                                                        {{ method_field('delete') }}
                                                        <button type="submit"
                                                                class="btn btn-danger delete btn-sm swalDefaultErrorCheck">
                                                            <i
                                                                    class="fa fa-trash"></i>Force Delete
                                                        </button>
                                                    </form><!-- end of form -->
                                                @else
                                                    <button class="btn btn-danger btn-sm disabled"><i
                                                                class="fa fa-trash"></i>Force Delete
                                                    </button>
                                                @endif
                                                {{--                                                @if (auth()->user()->hasPermission('restore_users'))--}}
                                                @if (auth()->user()->hasPermission('restore_users'))
                                                    <form action="{{ route('users.restore', $row->id) }}"
                                                          method="post"
                                                          style="display: inline-block">
                                                        {{ csrf_field() }}
                                                        {{ method_field('put') }}
                                                        <button type="submit"
                                                                class="btn btn-warning btn-sm">
                                                            <i class="fas fa-trash-restore mx-2"
                                                               aria-hidden="true"></i>Restore
                                                        </button>
                                                    </form><!-- end of form -->
                                                @else
                                                    <button class="btn btn-danger btn-sm disabled"><i
                                                                class="fa fa-trash"></i>Restore
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

@extends('layouts.dashboard')

@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

@endsection
@section('content')
    <!-- Small boxes (Stat box) -->
    {{--    <div class="col-lg-3 col-6">--}}
    {{--        <!-- small box -->--}}
    {{--        <div class="small-box bg-info">--}}
    {{--            <div class="inner">--}}
    {{--                <h3>{{\App\Models\Destination::where('status',1)->count()}}</h3>--}}

    {{--                <p>Destinations</p>--}}
    {{--            </div>--}}
    {{--            <div class="icon">--}}
    {{--                <i class="fas fa-location-arrow"></i>--}}
    {{--            </div>--}}
    {{--            <a href="{{route('destination.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <!-- ./col -->--}}
    {{--    <div class="col-lg-3 col-6">--}}
    {{--        <!-- small box -->--}}
    {{--        <div class="small-box bg-success">--}}
    {{--            <div class="inner">--}}
    {{--                <h3>{{\App\Models\Package::where(['status'=>1,'is_excursion'=>0])->count()}}</h3>--}}

    {{--                <p>Packages</p>--}}
    {{--            </div>--}}
    {{--            <div class="icon">--}}
    {{--                <i class="fas fa-suitcase"></i>--}}
    {{--            </div>--}}
    {{--            <a href="{{route('packages.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <!-- ./col -->--}}
    {{--    <div class="col-lg-3 col-6">--}}
    {{--        <!-- small box -->--}}
    {{--        <div class="small-box bg-warning">--}}
    {{--            <div class="inner">--}}
    {{--                <h3>{{\App\Models\Package::where(['status'=>1,'is_excursion'=>1])->count()}}</h3>--}}

    {{--                <p>Excursions</p>--}}
    {{--            </div>--}}
    {{--            <div class="icon">--}}
    {{--                <i class="fas fa-umbrella"></i>--}}
    {{--            </div>--}}
    {{--            <a href="{{route('excursions.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <!-- ./col -->--}}
    {{--    <div class="col-lg-3 col-6">--}}
    {{--        <!-- small box -->--}}
    {{--        <div class="small-box bg-danger">--}}
    {{--            <div class="inner">--}}
    {{--                <h3>{{App\Models\Inquire::whereMonth('created_at', '=', Carbon\Carbon::now()->subMonth()->month)->count()}}</h3>--}}

    {{--                <p>last Month Inquires</p>--}}
    {{--            </div>--}}
    {{--            <div class="icon">--}}
    {{--                <i class="fab fa-wpforms"></i>--}}
    {{--            </div>--}}
    {{--            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <!-- ./col -->--}}
    {{--    <!-- ./col -->--}}
    {{--    <div class="col-lg-3 col-6">--}}
    {{--        <!-- small box -->--}}
    {{--        <div class="small-box bg-secondary">--}}
    {{--            <div class="inner">--}}
    {{--                <h3>{{App\Models\Inquire::whereMonth('created_at', '=', Carbon\Carbon::now()->month)->count()}}</h3>--}}

    {{--                <p>Current Month Inquires</p>--}}
    {{--            </div>--}}
    {{--            <div class="icon">--}}
    {{--                <i class="fab fa-wpforms"></i>--}}
    {{--            </div>--}}
    {{--            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <!-- ./col -->--}}

    {{--    <div class="col-lg-3 col-6">--}}
    {{--        <!-- small box -->--}}
    {{--        <div class="small-box bg-dark">--}}
    {{--            <div class="inner">--}}
    {{--                <h3>{{App\Models\Partner::count()}}</h3>--}}

    {{--                <p>Partners</p>--}}
    {{--            </div>--}}
    {{--            <div class="icon">--}}
    {{--                <i class="fas fa-handshake"></i>--}}
    {{--            </div>--}}
    {{--            <a href="{{route('partner.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <!-- ./col -->--}}
    {{--    <div class="col-lg-3 col-6">--}}
    {{--        <!-- small box -->--}}
    {{--        <div class="small-box bg-olive">--}}
    {{--            <div class="inner">--}}
    {{--                <h3>{{App\Models\Hotel::count()}}</h3>--}}

    {{--                <p>Hotels</p>--}}
    {{--            </div>--}}
    {{--            <div class="icon">--}}
    {{--                <i class="fas fa-hotel"></i>--}}
    {{--            </div>--}}
    {{--            <a href="{{route('partner.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    {{--    <div class="col-lg-3 col-6">--}}
    {{--        <!-- small box -->--}}
    {{--        <div class="small-box bg-gradient-yellow">--}}
    {{--            <div class="inner">--}}
    {{--                <h3>{{App\Models\Review::where('is_enabled' , 1)->count()}}</h3>--}}
    {{--                <p>Reviews</p>--}}
    {{--            </div>--}}
    {{--            <div class="icon">--}}
    {{--                <i class="fas fa-comments"></i>--}}
    {{--            </div>--}}
    {{--            <a href="{{route('review.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <!-- ./col -->
@endsection

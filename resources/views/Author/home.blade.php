@extends('Author.Layout.app')

@section('heading', 'Dashboard')

@section('main_content')


<div class="row">

    {{-- Total Active News --}}
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Active News Posts</h4>
                </div>
                <div class="card-body">
                    {{ $total_news }}
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-book-open"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Pending News</h4>
                </div>
                <div class="card-body">
                    122
                </div>
            </div>
        </div>
    </div> --}}
 
</div>


@endsection
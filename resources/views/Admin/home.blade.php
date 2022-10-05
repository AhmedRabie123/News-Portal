@extends('Admin.Layout.app')

@section('heading', 'Dashboard')

@section('main_content')


<div class="row">
 
    {{-- Total News Categories --}}
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fab fa-atlassian"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total News Categories</h4>
                </div>
                <div class="card-body">
                    {{ $total_category }}
                </div>
            </div>
        </div>
    </div>
 
      {{-- Total News SubCategory --}}
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fab fa-bandcamp"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total News SubCategory</h4>
                </div>
                <div class="card-body">
                   {{ $total_subcategory }}
                </div>
            </div>
        </div>
    </div>
 
      {{-- Total News Posts --}}
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total News Posts</h4>
                </div>
                <div class="card-body">
                    {{ $total_news }}
                </div>
            </div>
        </div>
    </div>
  
    {{-- Total News Photo Gallery --}}
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="fas fa-camera"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total News Photo Gallery</h4>
                </div>
                <div class="card-body">
                    {{ $total_photo }}
                </div>
            </div>
        </div>
    </div>
 
    {{-- Total News Video Gallery --}}
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-video"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total News Video Gallery</h4>
                </div>
                <div class="card-body">
                   {{ $total_video }}
                </div>
            </div>
        </div>
    </div>

    {{-- Total News FAQ --}}
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-question-circle"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total News FAQ</h4>
                </div>
                <div class="card-body">
                    {{ $total_faq }}
                </div>
            </div>
        </div>
    </div>

      
    {{-- Total News Polls --}}
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-vote-yea"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total News Online Polls</h4>
                </div>
                <div class="card-body">
                    {{ $total_poll }}
                </div>
            </div>
        </div>
    </div>
 
    {{-- Total News Live Channel --}}
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="far fa-stop-circle"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total News Live Channels</h4>
                </div>
                <div class="card-body">
                   {{ $total_live_channel }}
                </div>
            </div>
        </div>
    </div>

    {{-- Total News Subscribers --}}
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total News Subscribers</h4>
                </div>
                <div class="card-body">
                    {{ $total_Subscribers }}
                </div>
            </div>
        </div>
    </div>
 
</div>


@endsection
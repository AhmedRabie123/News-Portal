@extends('front.layout.app')

@section('title', 'Contact Page')

@section('main_content')

    <div class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $page_data->contact_title }}</h2>
                    <nav class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $page_data->contact_title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        {!! $page_data->contact_detail !!}
                    </div>
                
                <div class="col-lg-6 col-md-12">
                    <div class="contact-form">
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email Address</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Message</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">Send Message</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="map">
                        {!! $page_data->contact_map !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('front.layout.app')

@section('title', 'Reset Password Page')

@section('main_content')

    <div class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Reset Password</h2>
                    <nav class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('author_reset_password_submit') }}" method="post">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ $email }}">

                        <div class="login-form">
                            <div class="mb-3">
                                <label for="" class="form-label">Enter The New Password</label>
                                <input type="text" class="form-control" name="password">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Retype New Password</label>
                                <input type="text" class="form-control" name="retype_password">
                            </div>
                       
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary bg-website">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

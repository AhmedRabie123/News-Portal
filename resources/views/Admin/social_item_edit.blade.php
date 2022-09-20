@extends('Admin.Layout.app')

@section('heading', 'Social Item Update')

@section('button')

    <a href="{{ route('admin_social_item_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>

@endsection

@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin_social_item_update', $social_item_single->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Social Item Update</h5>
                            <div class="form-group mb-3">
                                <label>Social Icon Preview </label>
                                <div>
                                    <i class="{{ $social_item_single->icon }}" style="font-size:25px;"></i>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Social Icon *</label>
                                <input type="text" class="form-control" name="icon"
                                    value="{{ $social_item_single->icon }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Social URL *</label>
                                <input type="text" class="form-control" name="url"
                                    value="{{ $social_item_single->url }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>




    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
    </form>
    </div>

@endsection

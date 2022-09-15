@extends('Admin.Layout.app')

@section('heading', 'Live Channel Update')

@section('button')

    <a href="{{ route('admin_live_channel_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>

@endsection

@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin_live_channel_update',$live_channel_single->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Live Channel Update</h5>

                            
                            <div class="form-group mb-3">
                                <label>Enter New Video Id *</label>
                                <input type="text" class="form-control" name="video_id" value="{{ $live_channel_single->video_id }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Enter New Heading *</label>
                                <input type="text" class="form-control" name="heading" value="{{ $live_channel_single->heading }}">
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

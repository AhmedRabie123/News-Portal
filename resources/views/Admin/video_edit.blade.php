@extends('Admin.Layout.app')

@section('heading', 'Video Update')

@section('button')

    <a href="{{ route('admin_video_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>

@endsection

@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin_video_update',$video_single->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Video Update</h5>

                            
                            <div class="form-group mb-3">
                                <label>Enter New Video Id *</label>
                                <input type="text" class="form-control" name="video_id" value="{{ $video_single->video_id }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Enter New Caption *</label>
                                <input type="text" class="form-control" name="caption" value="{{ $video_single->caption }}">
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

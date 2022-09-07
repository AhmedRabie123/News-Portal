@extends('Admin.Layout.app')

@section('heading', 'Photo Update')

@section('button')

    <a href="{{ route('admin_photo_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>

@endsection

@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin_photo_update',$photo_single->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Photo Update</h5>

                            <div class="form-group mb-3">
                                <label>Existing Photo</label>
                               <div><img src="{{ asset('uploads/'.$photo_single->photo) }}" alt="" style="width:200px;"></div> 
                            </div>

                            <div class="form-group mb-3">
                                <label>New Photo *</label>
                               <div><input type="file" name="photo"></div> 
                            </div>

                            <div class="form-group mb-3">
                                <label>Enter New Caption *</label>
                                <input type="text" class="form-control" name="caption" value="{{ $photo_single->caption }}">
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

@extends('Admin.Layout.app')

@section('heading', 'Add Social Item')

@section('button')

    <a href="{{ route('admin_social_item_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>

@endsection

@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin_social_item_store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Create Social Item</h5>

                            <div class="form-group mb-3">
                                <label>Social Icon *</label>
                                <input type="text" class="form-control" name="icon">
                            </div>

                            <div class="form-group mb-3">
                                <label>Social URL *</label>
                                <input type="text" class="form-control" name="url">
                            </div>

                        </div>
                    </div>
                </div>


              </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

@endsection

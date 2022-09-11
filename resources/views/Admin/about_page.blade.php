@extends('Admin.Layout.app')

@section('heading', 'Edit About Page Content')

@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin_page_about_update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>About Title</h5>

                            <div class="form-group mb-3">
                                <label>About Title *</label>
                                <input type="text" class="form-control" name="about_title"
                                    value="{{ $page_data->about_title }}">
                            </div>

                            <div class="form-group mb-3">
                                <label>About Detail *</label>
                                <textarea name="about_detail" class="form-control snote" cols="30" rows="10">{{ $page_data->about_detail }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label>About Status</label>
                                <select name="about_status" class="form-control">
                                    <option value="Show" @if ($page_data->about_status == 'Show') selected @endif>Show</option>
                                    <option value="Hide" @if ($page_data->about_status  == 'Hide') selected @endif>Hide</option>
                                </select>
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

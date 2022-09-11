@extends('Admin.Layout.app')

@section('heading', 'Edit Disclaimer Page Content')

@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin_page_disclaimer_update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Disclaimer Title</h5>

                            <div class="form-group mb-3">
                                <label>Disclaimer Title *</label>
                                <input type="text" class="form-control" name="disclaimer_title"
                                    value="{{ $page_data->disclaimer_title }}">
                            </div>

                            <div class="form-group mb-3">
                                <label>Disclaimer Detail </label>
                                <textarea name="disclaimer_detail" class="form-control snote" cols="30" rows="10">{{ $page_data->disclaimer_detail }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label>Disclaimer Status</label>
                                <select name="disclaimer_status" class="form-control">
                                    <option value="Show" @if ($page_data->disclaimer_status == 'Show') selected @endif>Show</option>
                                    <option value="Hide" @if ($page_data->disclaimer_status  == 'Hide') selected @endif>Hide</option>
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

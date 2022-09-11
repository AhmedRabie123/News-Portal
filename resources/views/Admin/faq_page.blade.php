@extends('Admin.Layout.app')

@section('heading', 'Edit FAQ Page Content')

@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin_page_faq_update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>FAQ Title</h5>

                            <div class="form-group mb-3">
                                <label>FAQ Title *</label>
                                <input type="text" class="form-control" name="faq_title"
                                    value="{{ $page_data->faq_title }}">
                            </div>

                            <div class="form-group mb-3">
                                <label>FAQ Detail </label>
                                <textarea name="faq_detail" class="form-control snote" cols="30" rows="10">{{ $page_data->faq_detail }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label>FAQ Status</label>
                                <select name="faq_status" class="form-control">
                                    <option value="Show" @if ($page_data->faq_status == 'Show') selected @endif>Show</option>
                                    <option value="Hide" @if ($page_data->faq_status  == 'Hide') selected @endif>Hide</option>
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

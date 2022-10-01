@extends('Admin.Layout.app')

@section('heading', 'Edit Language')

@section('button')

    <a href="{{ route('admin_language_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>

@endsection

@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin_language_update', $language_single->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h5>Edit Language</h5>

                            <div class="form-group mb-3">
                                <label>language Name*</label>
                                <input type="text" class="form-control" value="{{ $language_single->name }}"
                                    name="name">
                            </div>

                            <div class="form-group mb-3">
                                <label>language Short Name*</label>
                                <input type="text" class="form-control" value="{!! $language_single->short_name !!}"
                                    name="short_name">
                            </div>

                            <div class="form-group mb-3">
                                <label>Is Default?</label>
                                <select name="is_default" class="form-control">
                                    <option value="Yes" @if ($language_single->is_default == 'Yes') Selected @endif>Yes</option>
                                    <option value="No" @if ($language_single->is_default == 'No') Selected @endif>No</option>
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

@extends('Admin.Layout.app')

@section('heading', 'Add Language')

@section('button')

    <a href="{{ route('admin_language_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>

@endsection

@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin_language_store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h5>Create Language</h5>

                            <div class="form-group mb-3">
                                <label>language Name*</label>
                                <input type="text" class="form-control" name="name">
                            </div>

                            <div class="form-group mb-3">
                                <label>language Short Name*</label>
                                <input type="text" class="form-control" name="short_name">                            </div>

                            <div class="form-group mb-3">
                                <label>Is Default?</label>
                                <select name="is_default" class="form-control">
                                    <option value="Yes">Yes</option>
                                    <option value="No" >No</option>
                                </select>
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

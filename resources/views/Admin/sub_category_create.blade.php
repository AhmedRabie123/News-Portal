@extends('Admin.Layout.app')

@section('heading', 'Add Sub Category')

@section('button')

    <a href="{{ route('admin_sub_category_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>

@endsection

@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin_sub_category_store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Create Sub Categories</h5>

                            <div class="form-group mb-3">
                                <label>Sub Category Name *</label>
                                <input type="text" class="form-control" name="sub_category_name" value="">
                            </div>

                            <div class="form-group mb-3">
                                <label>Show On Menu?</label>
                                <select name="show_on_menu" class="form-control">
                                    <option value="Show">Show</option>
                                    <option value="Hide">Hide</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Sub Category Order *</label>
                                <input type="text" class="form-control" name="sub_category_order" value="">
                            </div>

                            <div class="form-group mb-3">
                                <label>Select Ctaegory *</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $row)
                                        <option value="{{ $row->id }}">
                                            {{ $row->category_name }}
                                        </option>
                                    @endforeach


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

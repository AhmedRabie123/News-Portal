@extends('Admin.Layout.app')

@section('heading', 'Add Author')

@section('button')

    <a href="{{ route('admin_author_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>

@endsection

@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin_author_store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Create Author</h5>

                            <div class="form-group mb-3">
                                <label>Author Photo</label>
                                <div><input type="file" name="photo"></div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Author Name *</label>
                                <input type="text" class="form-control" name="name">
                            </div>

                            <div class="form-group mb-3">
                                <label>Author Email *</label>
                                <input type="text" class="form-control" name="email">
                            </div>

                            <div class="form-group mb-3">
                                <label>Author Password *</label>
                                <input type="password" class="form-control" name="password">
                            </div>

                            <div class="form-group mb-3">
                                <label>Author Retype Password *</label>
                                <input type="password" class="form-control" name="retype_password">
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

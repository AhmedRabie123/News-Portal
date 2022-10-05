@extends('Admin.Layout.app')

@section('heading', 'Add Live Channel')

@section('button')

    <a href="{{ route('admin_live_channel_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>

@endsection

@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin_live_channel_store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Create live_channel</h5>

                            <div class="form-group mb-3">
                                <label>Video Id *</label>
                                <input type="text" class="form-control" name="video_id">
                            </div>

                            <div class="form-group mb-3">
                                <label>Enter The Heading *</label>
                                <input type="text" class="form-control" name="heading">
                            </div>

                            <div class="form-group mb-3">
                                <label>Select Language</label>
                                <select name="language_id" class="form-control">
                                    @foreach ($global_language_data as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
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

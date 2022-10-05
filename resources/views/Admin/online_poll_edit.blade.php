@extends('Admin.Layout.app')

@section('heading', 'Online Poll Update')

@section('button')

    <a href="{{ route('admin_online_poll_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>

@endsection

@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin_online_poll_update',$online_poll_single->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Online Poll Update</h5>

                            
                            <div class="form-group mb-3">
                                <label>Enter New Question *</label>
                                <textarea name="question" class="form-control snote" cols="30" rows="10" style="height:150px;">{{ $online_poll_single->question }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label>Select Language</label>
                                <select name="language_id" class="form-control">
                                    @foreach ($global_language_data as $row)
                                        <option value="{{ $row->id }}" @if ($row->id == $online_poll_single->language_id) selected @endif>{{ $row->name }}</option>
                                    @endforeach
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

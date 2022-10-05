@extends('Admin.Layout.app')

@section('heading', 'FAQ Update')

@section('button')

    <a href="{{ route('admin_faq_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>

@endsection

@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin_faq_update',$faq_single->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Faq Update</h5>

                            <div class="form-group mb-3">
                                <label>Faq Title *</label>
                                <input type="text" class="form-control" name="faq_title" value="{{ $faq_single->faq_title }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Faq Detail *</label>
                               <textarea name="faq_detail" class="form-control snote" cols="30" rows="10">{{ $faq_single->faq_detail }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label>Select Language</label>
                                <select name="language_id" class="form-control">
                                    @foreach ($global_language_data as $row)
                                        <option value="{{ $row->id }}" @if ($row->id == $faq_single->language_id) selected @endif>{{ $row->name }}</option>
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

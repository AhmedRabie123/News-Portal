@extends('Admin.Layout.app')

@section('heading', 'Edit Terms Page Content')

@section('main_content')

    <div class="section-body">
       
            <div class="row">

                <div class="col-12">

                    @foreach ($page_data as $row)
                    <h3>Language: {{ $row->rLanguage->name }}</h3>
                    <form action="{{ route('admin_page_terms_update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $row->id }}">
                    <div class="card">
                        <div class="card-body">
                            <h5>Terms Section</h5>

                            <div class="form-group mb-3">
                                <label>Terms Title *</label>
                                <input type="text" class="form-control" name="terms_title"
                                    value="{{ $row->terms_title }}">
                            </div>

                            <div class="form-group mb-3">
                                <label>Terms Detail *</label>
                                <textarea name="terms_detail" class="form-control snote" cols="30" rows="10">{{ $row->terms_detail }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label>Terms Status</label>
                                <select name="terms_status" class="form-control">
                                    <option value="Show" @if ($row->terms_status == 'Show') selected @endif>Show</option>
                                    <option value="Hide" @if ($row->terms_status  == 'Hide') selected @endif>Hide</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </div>
                    </div>
                </form>
                    @endforeach
              



                </div>


            </div>
         
        
    </div>

@endsection

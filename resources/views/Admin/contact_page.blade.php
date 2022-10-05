@extends('Admin.Layout.app')

@section('heading', 'Edit Contact Page Content')

@section('main_content')

    <div class="section-body">

        <div class="row">

            <div class="col-12">

                @foreach ($page_data as $row)
                    <h3>Language: {{ $row->rLanguage->name }}</h3>
                    <form action="{{ route('admin_page_contact_update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $row->id }}">
                        <div class="card">
                            <div class="card-body">
                                <h5>Contact Section</h5>

                                <div class="form-group mb-3">
                                    <label>Contact Title *</label>
                                    <input type="text" class="form-control" name="contact_title"
                                        value="{{ $row->contact_title }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label>Contact Detail</label>
                                    <textarea name="contact_detail" class="form-control snote" cols="30" rows="10">{{ $row->contact_detail }}</textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Contact Map (iFrame Code)</label>
                                    <textarea name="contact_map" class="form-control" cols="30" rows="10" style="height:120px;">{{ $row->contact_map }}</textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Contact Status</label>
                                    <select name="contact_status" class="form-control">
                                        <option value="Show" @if ($row->contact_status == 'Show') selected @endif>Show
                                        </option>
                                        <option value="Hide" @if ($row->contact_status == 'Hide') selected @endif>Hide
                                        </option>
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
        >

    </div>

@endsection

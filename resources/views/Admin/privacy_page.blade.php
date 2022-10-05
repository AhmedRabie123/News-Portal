@extends('Admin.Layout.app')

@section('heading', 'Privacy & Policy Page')

@section('main_content')

    <div class="section-body">

        <div class="row">

            <div class="col-12">


                @foreach ($page_data as $row)
                    <h3>Language: {{ $row->rLanguage->name }}</h3>
                    <form action="{{ route('admin_page_Privacy_update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $row->id }}">
                        <div class="card">
                            <div class="card-body">
                                <h5>Privacy Section</h5>

                                <div class="form-group mb-3">
                                    <label>Privacy Title *</label>
                                    <input type="text" class="form-control" name="privacy_title"
                                        value="{{ $row->privacy_title }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label>Privacy Detail *</label>
                                    <textarea name="privacy_detail" class="form-control snote" cols="30" rows="10">{{ $row->privacy_detail }}</textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Privacy Status</label>
                                    <select name="privacy_status" class="form-control">
                                        <option value="Show" @if ($row->privacy_status == 'Show') selected @endif>Show
                                        </option>
                                        <option value="Hide" @if ($row->privacy_status == 'Hide') selected @endif>Hide
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


    </div>

@endsection

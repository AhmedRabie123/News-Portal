@extends('Admin.Layout.app')

@section('heading', 'Language Update Detail')

@section('button')

    <a href="{{ route('admin_language_show') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Back To Previous Page</a>

@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_language_update_detail_submit', $lang_id) }}" method="post">
                            @csrf
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example1">
                                    <thead>
                                        <tr>
                                            <th style="width: 40px;">SL</th>
                                            <th style="width: 45%;">Key</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($json_data as $key => $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td>{{ $key }}</td>
                                                <td>
                                                    <input type="hidden" name="arr_key[]" value="{{ $key }}"
                                                        class="form_control">
                                                    <input type="text" name="arr_value[]" value="{{ $value }}"
                                                        class="form_control">
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

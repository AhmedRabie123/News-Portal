<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}">

    <title>Admin Panel</title>

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">


    @include('Admin.Layout.styles')

    @include('Admin.Layout.scripts')


</head>

<body>
    <div id="app">
        <div class="main-wrapper">

            @include('Admin.Layout.nav')

            @include('Admin.Layout.sidebar')


            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('heading')</h1>
                        {{-- <div class="ml-auto">
                        <a href="" class="btn btn-primary"><i class="fas fa-plus"></i> Button</a>
                    </div> --}}
                    </div>

                    @yield('main_content')

                </section>
            </div>

        </div>
    </div>

   @include('Admin.Layout.scripts_footer')

</body>

</html>

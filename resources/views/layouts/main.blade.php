<!DOCTYPE html>
<html lang="en">
<head>
	<title>CRUD | @yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .container{
            width: 900px;
        }
    </style>
    @yield('custom-css')
</head>
<body>
    @include('includes.header')

    <div class="container">
        @yield('content')
    </div>

    @include('includes.footer')

    @yield('custom-js')
</body>
</html>

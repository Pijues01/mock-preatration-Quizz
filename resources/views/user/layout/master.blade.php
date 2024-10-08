<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url('/') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="{{ url('/') }}/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('/') }}/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/change.css" rel="stylesheet">

    <style>
        li.nav-item.dropdown.no-arrow {
            margin: 28px;
        }
    </style>
    

</head>

<body id="page-top">
    <div id="wrapper">
        @include('user.layout.sidebar')
        @include('user.layout.topbar')
        @include('user.layout.banner')
        @yield('content')
        @include('user.layout.contact-us')
        @include('user.layout.footer')

</body>

</html>
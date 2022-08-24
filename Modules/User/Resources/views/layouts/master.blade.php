<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shopping Cart POD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="{{ 'assets/img/apple-icon.png' }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ 'assets/img/favicon.ico' }}">
    <link rel="stylesheet" href="{{ 'assets/css/bootstrap.min.css' }}">
    <link rel="stylesheet" href="{{ 'assets/css/templatemo.css' }}">
    <link rel="stylesheet" href="{{ 'assets/css/custom.css' }}">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{ 'assets/css/fontawesome.min.css' }}">

</head>

<body>
<!-- Start Top Nav -->
<!-- Header -->
@include('user::layouts.header')
<!-- Close Header -->

<!-- Modal -->
@include('user::layouts.search')


<!-- Start Content -->
@include('user::layouts.content')
<!-- End Content -->

<!-- Start Brands -->
@include('user::layouts.featureProduct')
<!--End Brands-->


<!-- Start Footer -->
@include('user::layouts.footer')
<!-- End Footer -->


<!-- Start Script -->
<script src="{{ 'assets/js/jquery-1.11.0.min.js' }}"></script>
<script src="{{ 'assets/js/jquery-migrate-1.2.1.min.js' }}"></script>
<script src="{{ 'assets/js/bootstrap.bundle.min.js' }}"></script>
<script src="{{ 'assets/js/templatemo.js' }}"></script>
<script src="{{ 'assets/js/custom.js' }}"></script>
<!-- End Script -->
</body>

</html>

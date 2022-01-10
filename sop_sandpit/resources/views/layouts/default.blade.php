<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sop sandpit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap&subset=latin-ext" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link type="text/css" href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="jumbotron jumbotron2 header">
    <div class="container">
        <h1 class="display-4 text-right">Sop sandpit</h1>
    </div>
</div>
<div class="container">
    <div class="jumbotron content">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-md-3 col-12">
                <div id="sidebar-wrapper">
                    <div class="list-group ">
                        <a href="{{ url('/') }}" class="list-group-item list-group-item-action bg-light">Strona główna</a>
                        <a href="{{ url('/SOP') }}" class="list-group-item list-group-item-action bg-light">Same-origin policy</a>
                        <a href="{{ url('/CORS') }}" class="list-group-item list-group-item-action bg-light">Cross-origin resource sharing</a>
                        <a href="{{ url('/CSRF') }}" class="list-group-item list-group-item-action bg-light">Cross-site request forgery</a>
                        <a href="{{ url('/XSS') }}" class="list-group-item list-group-item-action bg-light">Cross-site scripting</a>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>

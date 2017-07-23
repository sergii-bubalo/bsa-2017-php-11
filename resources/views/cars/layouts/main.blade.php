<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-default">
        <a class="navbar-brand" href="{{ route('cars.index') }}">Car Rent Service</a>
        <ul class="nav navbar-nav nav-pills">
            <li role="presentation">
                <a href="{{ route('cars.index') }}">Cars list</a>
            </li>
            <li role="presentation">
                @can('create', App\Entity\Car::class)
                    <a href="{{ route('cars.create') }}">Add</a>
                @endcan
            </li>
        </ul>
    </nav>
    @yield('content')
</div>
</body>
</html>
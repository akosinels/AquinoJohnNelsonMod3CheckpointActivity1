<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Parameter Passing Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Parameter Demo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/customer/1/John%20Doe/123%20Main%20St">Customer Demo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/item/1/Sample%20Item/99.99">Item Demo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/order/1/John%20Doe/ORD001/2024-03-20">Order Demo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/order-detail/TR001/ORD001/1/Sample%20Item/99.99/2">Order Detail Demo</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
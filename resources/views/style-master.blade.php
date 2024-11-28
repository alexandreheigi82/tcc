<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @vite('resources/css/app.css')
    <style>
        body {
            background: linear-gradient(to right, #6cb3c3, #acd4e4);
            font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: #26535e;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 2rem;
            background-color: #26535e;
            color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        /* Insira aqui o restante do CSS necessário */
    </style>
</head>
<body>
    @yield('content')
</body>
</html>

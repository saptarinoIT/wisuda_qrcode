<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Charmonman:wght@700&family=Kanit:wght@100;200;300;400;500;600&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Kanit', sans-serif;
            font-weight: 300;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f8f8;
        }

        .row {
            background-color: #313D62;
            display: flex;
            width: 90%;
            height: 70vh;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(38, 48, 78, 0.3);
        }

        .col {
            width: 50%;
            overflow: hidden;
        }

        .img-undangan {
            object-fit: cover;
            width: 100%;
            height: 70vh;
            border-radius: 10px 0 0 10px;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col">
            <img src="{{ asset('img/bg-login.jpg') }}" class="img-undangan">
        </div>
        <div class="col">
            <h1>Acara Wisuda</h1>
        </div>
    </div>
</body>

</html>

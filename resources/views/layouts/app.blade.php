
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

    
    @vite(["./resources/css/apptw.css", "./resources/js/app.js"])
    <title>Trang chủ</title>

    <style>
        .main.active {
            margin-left: 0px;
            width: 100%;
        }
    </style>
</head>
<body class="text-gray-800 font-inter" id="app">
    @include('layouts.sidenav')

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        @include('layouts.navigation')
        {{ $content }}
    </main>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
 
</script>

</body>
</html>
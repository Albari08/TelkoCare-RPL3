<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TelkoCare</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .activemenu {
            background-color: #fff5f5;
            color: #FF0000;
            border-radius: 5px;
        }
        .activemenu svg {
            fill: #FF0000;
        }
    </style>
    @yield('addCss')
</head>

<body class="bg-white font-Montserrat" x-data="{ sidebarOpen: true }">
    <section class="lg:flex">
        {{-- Sidebar --}}
        @include('layout.dokter.sidebar')
        <section class="w-full  transition ease-out duration-500">
            {{-- navbar --}}
            @include('layout.dokter.navbar')
            <main>
                <section class="px-10">
                    <div class="mb-5">
                        <h1 class="font-bold text-2xl">@yield('title-page')</h1>
                    </div>
                </section>
                @yield('content')
            </main>
        </section>
        <div class="fixed right-0 bottom-0 z-[-1] ">
            <img src="{{ asset('asset/img/ellipse.png') }}" class="max-w-[400px]" alt="ellipse">
        </div>
    </section>
    @yield('addJs')
</body>

</html>

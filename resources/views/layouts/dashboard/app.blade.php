<!DOCTYPE html>
<html lang="id" data-theme="corporate" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="referrer" content="always">
    {{-- <link rel="canonical" href="{{ $page->getUrl() }}"> --}}

    <meta name="description" content="DASHBOARD">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'DASHBOARD' }}</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}">
    @vite('resources/css/app.css')
    {{-- <link rel="icon" href="{{ asset('images/mosque.svg') }}"> --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <script src="https://kit.fontawesome.com/b2ba1193ce.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- <script>
        new WOW().init();

    </script> --}}
</head>

<body>
    <style>
        @font-face {
            font-family: 'Telkomsel Batik';
            /*memberikan nama bebas untuk font*/
            src: url("{{ asset('font/TelkomselBatikSans-Bold.otf') }}");
            /*memanggil file font eksternalnya di folder nexa*/
        }

        .font-batik {
            font-family: 'Telkomsel Batik';
        }

        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    @if (isset($plain))
        @yield('body')
    @else
    @endif
    <livewire:dashboard.navbar />
    <livewire:dashboard.drawer />
    <main class="min-h-screen flex-1 overflow-auto bg-gray-100">
        <div class="mx-auto px-1 py-4 sm:px-6">
            @yield('body')
        </div>
    </main>
    <script type="text/javascript"
        src="https://github.com/niklasvh/html2canvas/releases/download/0.5.0-alpha1/html2canvas.js"></script>
    @yield('script')
    <script>
        document.addEventListener('trix-file-accept', function(event) {
            event.preventDefault();
        });
    </script>
</body>

</html>

{{-- resources/views/components/layout.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Dashboard - SB Admin' }}</title>

    {{-- third-party CSS (optional) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css">

    {{-- YOUR css from /public/css --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- icons (optional) --}}
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">

    <x-header />

    <div id="layoutSidenav">
        <x-sidebar />

        <div id="layoutSidenav_content">
            <main>
                {{ $slot }}
            </main>

            <x-footer />
        </div> {{-- /#layoutSidenav_content --}}
    </div> {{-- /#layoutSidenav --}}

    {{-- YOUR js from /public/js --}}
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- third-party JS (optional) --}}
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2" ></script>
</body>
</html>

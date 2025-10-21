<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/eo2f5dxwbxpgmsxsmeft2ggfac2r5jyyw6ykhnydyqd68qsw/tinymce/8/tinymce.min.js" referrerpolicy="origin"></script>

    @livewireStyles
</head>
<body class="bg-light">

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-2 px-3 shadow-sm">
        <a href="/" class="navbar-brand d-flex align-items-center" href="#">
            <img src="../assets/img/logo11.png" width="265" height="65" alt="Logo">
        </a>

        <div class="flex-grow-1"></div> <!-- prazno mesto između loga i dugmadi -->

        <livewire:date-time-display />

        <div class="d-flex align-items-center gap-2 ms-3">
            @if(auth()->user()->isDoctor())
                <a href="{{ route('doktor') }}" class="btn btn-primary btn-sm">Rad sa pacijentima</a>
            @elseif(auth()->user()->isPatient())
                <a href="{{ route('moji-pregledi') }}" class="btn btn-primary btn-sm">Moji pregledi</a>
            @endif

            <form method="POST" action="{{ route('logout') }}" class="m-0 d-inline-flex">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm">Odjavi se</button>
            </form>
        </div>
    </nav>


    <!-- Main content -->
    <main class="container py-0 pb-5">
        @yield('content')
        {{ $slot ?? '' }}
    </main>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener('notify', event => {
            // Bootstrap UI toast?
            alert(event.detail.message || 'Poruka');
        });
    </script>
    @stack('scripts')
</body>
</html>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="module" src="https://cdn.jsdelivr.net/npm/ldrs/dist/auto/bouncy.js"></script>
    <script>
        // Define a global variable for the CSRF token to use in JS scripts
        window.Laravel = {
            csrfToken: '{{ csrf_token() }}'
        };
    </script>
    @yield('css')

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body>
    <div id="loader" class="loader-inner ball-clip-rotate">
        <l-bouncy size="100" speed="1.75" color="hsl(228, 66%, 47%)"></l-bouncy>
    </div>

    <!-- Affichage d'un message à l'utilisateur si besoin -->
    @if (Session::has('user_alert_message'))
        <script>
            alert('{{ Session::get('user_alert_message') }}');
        </script>
    @endif
    <div id="content" style="visibility:hidden;">
        @yield('content')
    </div>
    <script>
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.getElementById('loader').style.display = 'none';
                document.getElementById('content').style.visibility = 'visible';
            }, 1000); // Délai en millisecondes (1500 ms = 1.5 secondes)
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (Session::has('success'))
        <script>
            document.getElementById('loader').style.display = 'none';
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: "{{ Session::get('success') }}",
                showConfirmButton: true
            });
        </script>
    @endif
    @yield('js')
</body>

</html>

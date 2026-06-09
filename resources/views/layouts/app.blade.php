<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frozeria Stok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container d-flex justify-content-between align-items-center">
            
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('dashboard') }}">
                <div style="width: 30px; height: 30px; background-color: var(--primary-orange); border-radius: 8px; display:flex; justify-content:center; align-items:center; color:white;">F</div>
                Frozeria
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav gap-3">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}" href="{{ route('kategori.index') }}">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('bantuan') ? 'active' : '' }}" href="{{ route('bantuan') }}">Bantuan</a>
                    </li>
                </ul>
            </div>

            <div class="d-none d-lg-flex align-items-center gap-2">
                <div class="text-end">
                    <div class="fw-bold" style="font-size: 0.9rem;">Admin Toko</div>
                </div>
            </div>

        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true
            });
        @endif

        
        function showLoading() {
            Swal.fire({
                title: 'Memproses Data...',
                html: 'Mohon tunggu sebentar.',
                allowOutsideClick: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
        }

        document.addEventListener('submit', function(e) {
            let form = e.target;
            
            if (form.method.toUpperCase() === 'GET') {
                return; 
            }
            showLoading();
        });
    </script>

    @stack('scripts')
</body>
</html>
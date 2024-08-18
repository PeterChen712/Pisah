<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Edukasi Pemilahan Sampah')</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            padding-top: 56px; /* Adjust this value based on your navbar height */
        }
        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        .content-wrapper {
            flex: 1 0 auto;
            padding-bottom: 60px; /* Adjust this value based on your footer height */
        }
        .footer {
            flex-shrink: 0;
            position: flex-end;
            bottom: 0;
            width: 100%;
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 15px 0;
        }
        .navbar {
            background-color: #f8f9fa;
        }
        @media (max-width: 991.98px) {
            .navbar-collapse {
                position: absolute;
                top: 100%;
                left: 0;
                padding-left: 15px;
                padding-right: 15px;
                padding-bottom: 15px;
                width: 100%;
                background-color: #f8f9fa;
                z-index: 1000;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            }
            .navbar-collapse.collapsing {
                height: 0;
                overflow: hidden;
                transition: height 0.35s ease;
            }
            .navbar-collapse.show {
                height: auto;
                max-height: calc(100vh - 56px); /* Adjust based on navbar height */
                overflow-y: auto;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">PilahSampah</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    @if(auth()->check() && auth()->user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.materials.index') }}">Admin Panel</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('klasifikasi') ? 'active' : '' }}" href="{{ route('klasifikasi') }}">Klasifikasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('diskusi') ? 'active' : '' }}" href="{{ route('diskusi') }}">Diskusi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('materials.index') ? 'active' : '' }}" href="{{ route('materials.index') }}">Materi</a>
                    </li>
                    @auth
                        <li class="nav-item me-2">
                            <a class="nav-link" href="{{ route('notifications.index') }}" role="button">
                                <i class="bi bi-bell"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @if(auth()->user()->avatar)
                                    <img src="{{ route('avatar.show', auth()->user()->id) }}" alt="{{ auth()->user()->name }}" class="rounded-circle me-2" width="32" height="32">
                                @else
                                    <img src="https://via.placeholder.com/32" alt="{{ auth()->user()->name }}" class="rounded-circle me-2" width="32" height="32">
                                @endif
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('profile.index') }}"><i class="bi bi-person"></i> Profil Saya</a></li>
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bi bi-gear"></i> Ubah Profil</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="content-wrapper">
        @yield('content')
    </div>

    <footer class="footer">
        <p>&copy; 2024 PilahSampah. Hak Cipta Dilindungi.</p>
    </footer>

    <!-- Crop Image Modal -->
    <div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="cropImagePopLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cropImagePopLabel">Crop Image</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <img id="sample_image" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="crop" class="btn btn-primary">Crop</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    @if(session('notification'))
    <div id="notification-popup">
        <p>{{ session('notification')->title }}</p>
        <p>{{ session('notification')->message }}</p>
    </div>

    <script>
        setTimeout(() => {
            document.getElementById('notification-popup').style.display = 'none';
        }, 5000); // 5 detik
    </script>
    @endif


    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.onkeydown = function(e) {
            if (e.keyCode == 123) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                return false;
            }
        };
    </script>
    @yield('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const avatarInput = document.getElementById('avatar');
            const sampleImage = document.getElementById('sample_image');
            const avatarCropContainer = document.getElementById('avatar-crop-container');
            const croppedAvatarInput = document.getElementById('cropped-avatar');
            let cropper;
        
            if (avatarInput) {
                avatarInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    const reader = new FileReader();
        
                    reader.onload = function(event) {
                        sampleImage.src = event.target.result;
                        $('#cropImagePop').modal('show');
                    };
        
                    reader.readAsDataURL(file);
                });
        
                $('#cropImagePop').on('shown.bs.modal', function() {
                    cropper = new Cropper(sampleImage, {
                        aspectRatio: 1,
                        viewMode: 3,
                        preview: '.preview'
                    });
                }).on('hidden.bs.modal', function() {
                    cropper.destroy();
                    cropper = null;
                });
        
                document.getElementById('crop').addEventListener('click', function() {
                    const canvas = cropper.getCroppedCanvas({
                        width: 300,
                        height: 300
                    });
        
                    canvas.toBlob(function(blob) {
                        const url = URL.createObjectURL(blob);
                        const reader = new FileReader();
        
                        reader.readAsDataURL(blob);
                        reader.onloadend = function() {
                            const base64data = reader.result;
                            $('#cropImagePop').modal('hide');
                            avatarCropContainer.innerHTML = `<img src="${base64data}" alt="Cropped Image" class="rounded-circle" width="150" height="150">`;
                            croppedAvatarInput.value = base64data;
                        };
                    });
                }); 
            }
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Sign Up</title>
    <link rel="icon" type="image/x-icon" href="https://designreset.com/cork/html/src/assets/img/favicon.ico" />

    {{-- Loader --}}
    <link href="{{ asset('backend/layouts/collapsible-menu/css/light/loader.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/layouts/collapsible-menu/css/dark/loader.css') }}" rel="stylesheet" />
    <script src="{{ asset('backend/layouts/collapsible-menu/loader.js') }}"></script>

    {{-- Fonts & Bootstrap --}}
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('backend/src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    {{-- Plugins & Auth Styles --}}
    <link href="{{ asset('backend/layouts/collapsible-menu/css/light/plugins.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/src/assets/css/light/authentication/auth-boxed.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/layouts/collapsible-menu/css/dark/plugins.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/src/assets/css/dark/authentication/auth-boxed.css') }}" rel="stylesheet" />
</head>

<body class="form">

    {{-- Loader --}}
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>

    <div class="auth-container d-flex">
        <div class="container mx-auto align-self-center">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="card mt-3 mb-3">
                              <form action="{{ route('handleregister') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                        <div class="card-body">
                            <h2 class="mb-2">Sign Up</h2>
                            <p>Enter your details to create an account</p>

                            {{-- Form đăng ký --}}
                      

                                <div class="mb-3">
                                    <label class="form-label">User Name</label>
                                    <input type="text" class="form-control" name="username" placeholder="Nhập username"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="first_name">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>

                                <!-- <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" required>
                                </div> -->

                                <div class="mb-4">
                                    <button class="btn btn-secondary w-100" type="submit">SIGN UP</button>
                                </div>
                           

                            {{-- Link đến đăng nhập --}}
                            <div class="text-center">
                                <p class="mb-0">Đã có tài khoản? <a href="{{ route('showlogin') }}"
                                        class="text-warning">Sign In</a></p>
                            </div>
                        </div>
                        
                              </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bootstrap --}}
    <script src="{{ asset('backend/src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
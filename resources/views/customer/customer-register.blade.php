<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/Css/Signup style/main.css">
    <title>Sign Up</title>
     <!-- Icon -->
     <link rel="shortcut icon" href="{{ asset('Assets/img/Logo.png')}}" type="image/x-icon">
    
     <!-- CSS Bootrap-->
     <link rel="stylesheet" href="{{ asset('Assets/Vendor/bootstrap-5.2/css/bootstrap.min.css')}}" />
 
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('Assets/Css/Signup style/main.css')}}" />

      <!-- Link Remixicon -->
    <link rel="stylesheet" href="{{ asset('Assets/Vendor/RemixIcon-master/fonts/remixicon.css')}}" />

    <!--Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@600&family=Poppins:wght@400;600&family=Roboto&display=swap"
        rel="stylesheet">

</head>

<body>
    <section class="signup d-flex justify-content-center justify-content-lg-between">
        <div class="signup-left w-50 h-100 d-none d-lg-block">
            <div class="row justify-content-center align-items-center h-100 ">
                <div class="col-4">
                    <img src="{{ asset('Assets/img/signup.png') }}" class="signup-img">
                </div>
            </div>
        </div>
        <div class="signup-right w-50 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-10 col-lg-6">
                    <div class="header">
                        <div class="text-center">
                            <img src="{{ asset('Assets/img/Logo.png') }}" class="logo">
                            <h1  class="my-0 my-lg-3">Create an Account</h1>
                        </div>
                    </div>
                    <form action="{{route('regis.store')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="signup-form d-flex flex-column gap-1 gap-lg-2 mt-2 mt-lg-4">
                        <label for="name" class="col-12">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" value="{{ old('nama') }}">
                            <label for="address" class="col-12">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" value="{{ old('alamat') }}">
                                    <label for="phone" class="col-12">No Telepon</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan no telepon" value="{{ old('no_telp') }}">
                                    <label for="email" class="col-12">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan email" required value="{{ old('email') }}">
                                    <div class="password-container">
                                        <label for="password" class="col-12">Password</label>
                                        <div class="pass-wrapper position-relative d-flex">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan password" required value="{{ old('password') }}">
                                            <i class="ri-eye-close-fill position-absolute pass-icon " onclick="pass()" id="pass-icon"></i>
                                            <!-- <img src="{{ asset('Assets/img/eye_slash.png') }}" onclick="pass()" class="pass-icon position-absolute" id="pass-icon"> -->
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button class="signup-btn mt-2 mt-lg-3" type="submit">Buat akun</button>
                        </form>
                        <div class="text-center mt-1 mt-lg-2">
                            <span class="d-inline">Sudah memiliki akun? <a href="{{route('customer.login')}}" class="d-inline text-decoration-none">Login</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Js -->
    <script src="{{ asset('Assets/Js/login script/script.js') }}"></script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Subscribe</title>

  <!-- Icon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('Assets/img/Logo.png')}}">
  
  <!-- CSS Bootrap-->
  <link rel="stylesheet" href="{{ asset('Assets/Vendor/bootstrap-5.2/css/bootstrap.min.css')}}" />

  <!-- Link BoxIcon -->
  <link rel="stylesheet" href="{{ asset('Assets/Vendor/boxicons-master/css/boxicons.min.css')}}" />

  <!-- Link Remixicon -->
  <link rel="stylesheet" href="{{ asset('Assets/Vendor/RemixIcon-master/fonts/remixicon.css')}}" />

  <!-- Link AOS -->
  <link rel="stylesheet" href="{{ asset('Assets/Vendor/aos-2/dist/aos.css')}}" />

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('Assets/Css/Subscribe style/main.css')}}" />

</head>
  <body class="vh-100 d-flex flex-column justify-content-between">

    <!-- Navbar Start -->
    <nav class="navbar  bg-white navbar-expand-lg navbar-light ">
        <div class="container py-1 d-lg-flex align-items-lg-center">
        <a href="{{route('customer.catalog')}}" class="text-decoration-none">
            <img src="{{ asset('Assets/img/Logo.png')}}" class="logo" />
        </a>
    </nav>
    <!-- Navbar End -->

<!-- Content Start -->
<section class="content mt-3 mt-lg-0">
    <div class="container">
     <form enctype="multipart/form-data" action="{{route('customer.checkout', $products)}}" method="POST">
        @csrf
        <div class="row row-high">
            <div class="col-10">
                <label class="mb-1" for="">Provinsi</label>
                <select name="provinsi" class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                    <option value=x selected>-- Pilih Provinsi --</option>
                    @foreach ($daftarProvinsi as $provinsi)
                    <option value="{{$provinsi['province_id']}}">{{$provinsi['province']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-10">
                <label class="mb-1" for="">Kabupaten/Kota</label>
                <select name="kabupaten/kota" class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                    <option selected value=x>-- Pilih Kabupaten/Kota --</option>
                </select>
            </div>
            <div class="col-10">
                <label class="mb-1 " for="exampleFormControlInput1" class="">Alamat Lengkap</label>
                <input name="alamat" class="form-control mb-3 alamat" id="exampleFormControlInput1" placeholder="Jl. Mawar No.8 Desa Sukasari">
            </div>
            <div class="col-10">
                <label class="mb-1" for="">Ekspedisi</label>
                <select name="ekspedisi" class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                    <option selected value=x>-- Pilih Ekpedisi --</option>
                    <option value="jne">JNE</option>
                    <option value="tiki">TIKI</option>
                    <option value="pos">POS</option>
                </select>
            </div>
            <div class="col-10">
                <label class="mb-1 " for="exampleFormControlInput1" class="">Berat (gr)</label>
                <input type="text" name="berat" class="form-control mb-3 berat" disabled  id="berat" value="{{$totalBerat}}">
            </div>
            <div class="col-10">
                <label class="mb-1" for="">Pilih Paket</label>
                <select name="paket" class="form-select form-select-sm mb-3 paket text-capitalize" aria-label=".form-select-lg example">
                    <option selected value="x">-- Pilih Paket --</option>
                </select>
            </div>
        </div>
        <div class="row row-1 mt-3">
            <div class="col-10">
                    <div class="form-check once">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault" checked>
                        <label class="mb-1" class="form-check-label" for="flexRadioDefault1">Beli Sekali</label>
                    </div>
                    <div class="form-check ">
                        <input class="form-check-input subs" type="radio" name="flexRadioDefault" id="flexRadioDefault">
                        <label class="mb-1" class="form-check-label" for="flexRadioDefault2">Berlangganan</label>
                    </div>
            </div>
        </div>
        <div class="row row-2 mt-3 d-none">
            <div class="mb-3 col-4 col-lg-2">
                <label class="mb-1" for="date-selector" class="form-label">Setiap Tanggal</label>
                <select class="form-select date-selector tanggal" name="subsDate" id="date-selector" aria-label="Default select example">
                </select>
            </div>
            <div class="col-5 col-lg-3">
                <label class="mb-1" for="date-selector" class="form-label">Selama</label>
                <div class="range-wrapper d-flex gap-2 gap-md-3 align-items-center">
                    <div class="col-7 range d-flex justify-content-between ">
                        <div class="minus d-inline-block" class="col-4">-</div>
                        <input type="text" name="subs"  value="1"  class="col-8 qty-input subs-input">
                        <div class="plus d-inline-block"  class="col-4">+</div>
                    </div>
                    <p class="mb-0 d-inline-block">Bulan Kedepan</p>
                </div>
            </div>
            <div class="col-3 d-flex align-items-center">
                <div class="col-12 col-lg-6 btn btn-outline-dark confirm">Konfirmasi</div>
            </div>
        </div>
        <div class="row row-3 d-none">
            <div class="col-5 col-md-3 date-col d-none">
                <div class="date-wrapper">
                    
                </div>
            </div>
        </div>
        <div class="row row-4 mt-4 align-items-center">
            <div class="col-12 col-lg-10 d-flex justify-content-between">
                <div class="col-7 text-wrapper">*Pengiriman pertama mungkin terlambat 2-3 hari</div>
                <button type="submit" class="disabled col-3 col-lg-2 btn btn-dark d-flex justify-content-center align-items-center">Checkout</button>
            </div>
        </div>
     </form>
    </div>
</section>
<!-- Content End -->

<!-- Footer Start -->
<section class="footer">
    <div class="container footer-wrapper">
        <div class="row row-1 mt-5">
            <div class="col-12 col-lg-6">
                <div class="content d-flex flex-column gap-3">
                    <div class="img-wrap col-2"><img class="img-fluid rounded-4" src="{{ asset('Assets/img/Logo.png')}}"></div>
                    <div class="text col-7">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim vitae consequuntur recusandae possimus soluta corporis </div>
                    <div class="socmed-wrap col-4">
                        <a href="#"><img src="{{ asset('Assets/img/Instagram.png')}}" alt=""></a>
                        <a href="#"><img src="{{ asset('Assets/img/Facebook.png')}}" alt=""></a>
                        <a href="#"><img src="{{ asset('Assets/img/Whatsapp.png')}}" alt=""></a>
                        <a href="#"><img src="{{ asset('Assets/img/Twitter.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex gap-5 mt-4 mt-lg-0">
                <div class="link-wrap col-1 col-md-2 d-flex flex-column gap-3">
                    <div class="head-wrap">Product</div>
                    <div class="child d-flex flex-column gap-1">
                        <a href="#" class="text-decoration-none text-black"><p class="m-0">Catalog</p></a>
                        <a href="#" class="text-decoration-none text-black"><p class="m-0">Select Product</p></a>
                        <a href="#" class="text-decoration-none text-black"><p class="m-0">Best Product</p></a>
                        <a href="#" class="text-decoration-none text-black"><p class="m-0">Contact</p></a>
                    </div>
                </div>
                <div class="link-wrap col-1 col-md-2 d-flex flex-column gap-3">
                    <div class="head-wrap">Information</div>
                    <div class="child d-flex flex-column gap-1">
                        <a href="#" class="text-decoration-none text-black"><p class="m-0">Customer</p></a>
                        <a href="#" class="text-decoration-none text-black"><p class="m-0">Social Media</p></a>
                        <a href="#" class="text-decoration-none text-black"><p class="m-0">Best Product</p></a>
                        <a href="#" class="text-decoration-none text-black"><p class="m-0">Contact Us</p></a>
                    </div>
                </div>
                <div class="link-wrap col-1 col-md-2 d-flex flex-column gap-3">
                    <div class="head-wrap">Company</div>
                    <div class="child d-flex flex-column gap-1">
                        <a href="#" class="text-decoration-none text-black"><p class="m-0">Company Info</p></a>
                        <a href="#" class="text-decoration-none text-black"><p class="m-0">Investor</p></a>
                        <a href="#" class="text-decoration-none text-black"><p class="m-0">Partners</p></a>
                        <a href="#" class="text-decoration-none text-black"><p class="m-0">Email</p></a>
                    </div>
                </div>
                <div class="link-wrap col-1 col-md-2 d-flex flex-column gap-3">
                    <div class="head-wrap">Supports</div>
                    <div class="child d-flex flex-column gap-1">
                        <a href="#" class="text-decoration-none text-black"><p class="m-0">Terms And Conditions</p></a>
                        <a href="#" class="text-decoration-none text-black"><p class="m-0">Insurance</p></a>
                        <a href="#" class="text-decoration-none text-black"><p class="m-0">Warranty</p></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer End -->
  </body>

  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  
  <!-- Main Js -->
  <script src="{{ asset('Assets/Js/Subscribe script/script.js')}}"></script>
  
</html>
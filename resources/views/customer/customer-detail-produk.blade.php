<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Detail | Supp My Coffee</title>
  <!-- Icon -->
<link rel="shortcut icon" href="{{asset('Assets/img/Logo.png')}}" type="image/x-icon">

  <!-- CSS Bootrap-->
<link rel="stylesheet" href="{{asset('Assets/Vendor/bootstrap-5.2/css/bootstrap.min.css')}}" />

  <!-- Link BoxIcon -->
<link rel="stylesheet" href="{{asset('Assets/Vendor/boxicons-master/css/boxicons.min.css')}}" />

  <!-- Link Remixicon -->
<link rel="stylesheet" href="{{asset('Assets/Vendor/RemixIcon-master/fonts/remixicon.css')}}" />

  <!-- Link AOS -->
<link rel="stylesheet" href="{{asset('Assets/Vendor/aos-2/dist/aos.css')}}" />

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

  <!-- CSS -->
<link rel="stylesheet" href="{{asset('Assets/Css/Product Detail Style/main.css')}}" />
</head>
<body>
    <!-- Navbar Start -->
      <nav class="navbar fixed-top bg-white navbar-expand-lg navbar-light ">
        <div class="container py-1 d-lg-flex align-items-lg-center">
          <a href="{{route('customer.catalog')}}" class="text-decoration-none">
          <img src="{{asset('Assets/img/Logo.png')}}" class="logo" />
          </a>     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse mt-3 mt-lg-0 navbar-collapse justify-content-between align-items-center toggle" id="navbarNav">
              <div class="left-content ms-lg-3 d-flex justify-content-start">
                <ul class="navbar-nav gap-3 text-lg-start mt-4 mb-4 mb-lg-0 mt-lg-0 d-flex align-items-start align-items-lg-center">
                  <li class="nav-item mt-3 mt-lg-0">
                    <div href="#" class="nav-link dropdown ddn-ctg p-0 bg-transparent border-0">
                      <div class="ddn  select d-flex align-items-center gap-2">
                        <span class="selected">Kategori</span>
                        <div class="caret bx bx-chevron-down"></div>
                      </div>
                      <ul class="menu">
                        <li><a href="#" class="text-decoration-none text-black title">Arabika</a></li>
                        <li><a href="#" class="text-decoration-none text-black title">Robusta</a></li>
                        <li><a href="#" class="text-decoration-none text-black title">Liberika</a></li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item mt-3 mt-lg-0">
                    <a href="{{route('customer.catalog')}}" class="nav-link p-0">Rekomendasi</a>
                  </li>
                  <li class="nav-item mt-3 mt-lg-0">
                    <a href="{{route('customer.catalog')}}" class="nav-link p-0">Produk Terbaru</a>
                  </li>
                </ul>
              </div>
              <div class="right-content align-items-start d-flex flex-column flex-lg-row  gap-3  ">
              <form action="{{route('customer.catalog.search')}}" method="post">
                @csrf
                <div class="input-group d-flex align-items-center">
                  <input type="text" name="search" class="search form">
                  <button class="border-0" type="submit"><i class='bx bx-search' ></i></button>
                </div>
              </form>
                <a href="{{route('customer.account')}}" class="text-decoration-none text-black account d-flex align-items-center gap-2">
                  <i class='bx bxs-user'></i>
                  @if (auth()->user())
                    <p class="m-0">{{auth()->user()->email}}</p>
                  @else
                    <p class="m-0">Akun</p>
                  @endif
                </a>
                <div class="dropdown">
                  <div class="select">
                    <i class='bx bx-cart crt cart-icon' ></i>
                    <span class="selected">Keranjang</span>
                    <div class="caret bx bx-chevron-down"></div>
                  </div>
                  <ul class="menu menu-cart">
                    <form action="{{route('customer.subscribe')}}" method="post">
                    @csrf
                    <div class="menu-wrap d-flex flex-column-reverse">
                        <!-- <li>
                          <input type="hidden" name="id" class="id" value="01">
                          <div class="title m-0 row align-items-center">
                            <div class="col-8 title">Kopi Robusta Gayo Monero Robusta Coffee 250g - Biji Kopi</div>
                            <div class="col-3 qty-btn d-flex gap-3 justify-content-center align-items-center">
                              <div class="plus" class="col-4">+</div>
                              <input type="text"  value="1"  class="col-4 qty-input">
                              <div class="minus"  class="col-4">-</div>
                            </div>
                            <div class="col-1 delete-wrap text-center"><i class='bx bx-trash'></i></div>
                          </div>
                        </li>
                        <li>
                          <input type="hidden" name="id" class="id" value="01">
                          <div class="title m-0 row align-items-center">
                            <div class="col-8 title">Kopi Robusta Gayo Monero Robusta Coffee 250g - Biji Kopi</div>
                            <div class="col-3 qty-btn d-flex gap-3 justify-content-center align-items-center">
                              <div class="plus" class="col-4">+</div>
                              <input type="text"  value="1"  class="col-4 qty-input">
                              <div class="minus"  class="col-4">-</div>
                            </div>
                            <div class="col-1 delete-wrap text-center"><i class='bx bx-trash'></i></div>
                          </div>
                        </li>
                        <li>
                          <input type="hidden" name="id" class="id" value="01">
                          <div class="title m-0 row align-items-center">
                            <div class="col-8 title">Kopi Robusta Gayo Monero Robusta Coffee 2500g - Biji Kopi</div>
                            <div class="col-3 qty-btn d-flex gap-3 justify-content-center align-items-center">
                              <div class="plus" class="col-4">+</div>
                              <input type="text"  value="1"  class="col-4 qty-input">
                              <div class="minus"  class="col-4">-</div>
                            </div>
                            <div class="col-1 delete-wrap text-center"><i class='bx bx-trash'></i></div>
                          </div>
                        </li> -->
  
                    </div>
                    <li class="btn-wrap row p-1">
                      <button type="submit " class="p-1 mt-2 btn ">Checkout</button>
                    </li>
                    </form>
                  </ul>
                </div>
            </div>
          </div>
      </nav>
    <!-- Navbar End -->

    <!-- Detail Start -->
      <section class="detail">  
        <div class="container">
          <div class="row row-1 justify-content-evenly  align-items-center product">
            <div class="col-6 img-wrapper">
            <img loading="lazy" src="{{ asset('storage/thumbnail/'.$product->produk_thumbnail)}}" class="img-fluid">
            </div>
            <div class="col-4 desc-wrapper">
              <div class="head">
                <div class="title">{{$product -> nama_produk}}</div>
                <div class="trans">{{$product -> sales}} Terjual</div>
                <div class="price">Rp {{number_format($product->harga,0, ".", ".")}}</div>
              </div>
              <div class="footer">
                <div class="desc-wrap">
                  <input type="hidden" value="{{$product->id}}" class="id-product">
                  <div class="title">Deskripsi Produk</div>
                  <div class="desc">
                  {{$product -> desc}}
                </div>
                </div>
                <div class="btn-cart-wrapper px-lg-3 px-0 pt-1 pb-3  mt-3">
                  <button class="btn-cart text-center">
                    <p class="btn-text m-0">Masukkan Keranjang</p>
                  </button>
                </div>  
              </div>
            </div>
          </div>
        </div>
      </section>
    <!-- Detail End -->

    
    <!-- Bottom Start -->
  <div class="bottom">
  <!-- What's New Start -->
  <section class="new mt-4">
    <div class="container new-wrapper">
      <div class="row row-1">
        <div class="col-12">
          <p class="title">Produk Terbaru</p>
        </div>
      </div>
      <div class="row row-2">
        <div  class="swiper mySwiper">
          <div class="swiper-wrapper">
            @foreach ($newProducts as $product)
            <div class="swiper-slide h-100">
              <div class=" product  p-2 h-100">
                <div class="box d-flex flex-column">
                    <a href="{{route('customer.catalog.detail', $product->id)}}" class="text-decoration-none">
                        <div class="product-img"><img loading="lazy" src="{{ asset('storage/thumbnail/'.$product->produk_thumbnail)}}" class="img-fluid"></div>
                    </a>
                    <a href="" class="text-decoration-none">
                        <div class="product-desc px-3 py-3">
                        <input type="hidden" class="id-product" value="{{$product->id}}">
                            <div class="title">{{$product->nama_produk}}</div>
                            <div class="footer d-flex justify-content-between pt-2">
                                <div class="price">Rp {{number_format($product->harga,0, ".", ".")}}</div>
                                <div class="trans d-flex align-items-end">{{$product->sales}} Terjual</div>
                            </div>
                          </div>
                    </a>
                    <div class="btn-cart-wrapper px-3 pt-1 pb-3 mt-auto">
                          <button class="btn-cart text-center">
                            <p class="btn-text m-0">Masukkan Keranjang</p>
                          </button>
                    </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="bx bxs-chevron-right-circle"></div>
          <div class="bx bxs-chevron-left-circle"></div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- What's New End -->

      <!-- Footer Start -->
    <section class="footer">
        <div class="container footer-wrapper">
            <div class="row row-1 mt-5">
                <div class="col-12 col-lg-6">
                    <div class="content d-flex flex-column gap-3">
                        <div class="img-wrap col-2"><img loading="lazy" class="img-fluid rounded-4" src="{{ asset('Assets/img/Logo.png')}}"></div>
                        <div class="text col-7">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim vitae consequuntur recusandae possimus soluta corporis </div>
                        <div class="socmed-wrap col-4">
                            <a href="#"><img loading="lazy" src="{{ asset('Assets/img/Instagram.png')}}" alt=""></a>
                            <a href="#"><img loading="lazy" src="{{ asset('Assets/img/Facebook.png')}}" alt=""></a>
                            <a href="#"><img loading="lazy" src="{{ asset('Assets/img/Whatsapp.png')}}" alt=""></a>
                            <a href="#"><img loading="lazy" src="{{ asset('Assets/img/Twitter.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 d-flex gap-5 mt-4 mt-lg-0">
                    <div class="link-wrap col-1 col-md-2 d-flex flex-column gap-3">
                        <div class="head">Product</div>
                        <div class="child d-flex flex-column gap-1">
                            <a href="#" class="text-decoration-none text-black"><p class="m-0">Catalog</p></a>
                            <a href="#" class="text-decoration-none text-black"><p class="m-0">Select Product</p></a>
                            <a href="#" class="text-decoration-none text-black"><p class="m-0">Best Product</p></a>
                            <a href="#" class="text-decoration-none text-black"><p class="m-0">Contact</p></a>
                        </div>
                    </div>
                    <div class="link-wrap col-1 col-md-2 d-flex flex-column gap-3">
                        <div class="head">Information</div>
                        <div class="child d-flex flex-column gap-1">
                            <a href="#" class="text-decoration-none text-black"><p class="m-0">Customer</p></a>
                            <a href="#" class="text-decoration-none text-black"><p class="m-0">Social Media</p></a>
                            <a href="#" class="text-decoration-none text-black"><p class="m-0">Best Product</p></a>
                            <a href="#" class="text-decoration-none text-black"><p class="m-0">Contact Us</p></a>
                        </div>
                    </div>
                    <div class="link-wrap col-1 col-md-2 d-flex flex-column gap-3">
                        <div class="head">Company</div>
                        <div class="child d-flex flex-column gap-1">
                            <a href="#" class="text-decoration-none text-black"><p class="m-0">Company Info</p></a>
                            <a href="#" class="text-decoration-none text-black"><p class="m-0">Investor</p></a>
                            <a href="#" class="text-decoration-none text-black"><p class="m-0">Partners</p></a>
                            <a href="{{route('admin.login')}}" class="text-decoration-none text-black"><p class="m-0">Admin</p></a>
                        </div>
                    </div>
                    <div class="link-wrap col-1 col-md-2 d-flex flex-column gap-3">
                        <div class="head">Supports</div>
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
  </div>
  <!-- Bottom End -->
</body>
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  <!-- Bootstrap js -->
<script src="{{asset('Assets/Vendor/bootstrap-5.2/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Main Js -->
<script src="{{asset('Assets/Js/Product detail script/script.js')}}"></script>
</html>
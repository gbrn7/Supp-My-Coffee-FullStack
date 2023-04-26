<!DOCTYPE html>
<html lang="en">
<head-wrap>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account</title>

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
  <link rel="stylesheet" href="{{ asset('Assets/Css/Account Style/main.css')}}" />

</head-wrap>
<body>

    <!-- Navbar Start -->
    <nav class="navbar fixed-top bg-white navbar-expand-lg navbar-light ">
      <div class="container py-1 d-lg-flex align-items-lg-center">
          <a href="#" class="text-decoration-none">
            <img src="{{ asset('Assets/img/Logo.png')}}" class="logo" />
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
          <div class="collapse mt-3 mt-lg-0 navbar-collapse justify-content-between align-items-center toggle" id="navbarNav">
            <div class="left-content ms-lg-3 d-flex justify-content-start">
              <ul class="navbar-nav gap-3 text-lg-start mt-4 mb-4 mb-lg-0 mt-lg-0 d-flex align-items-start align-items-lg-center">
                <li class="nav-item mt-3 mt-lg-0">
                  <div href="#" class="nav-link dropdown ddn-ctg p-0 bg-transparent border-0">
                    <div class="ddn  select d-flex align-items-center gap-2">
                      <span class="selected">Categories</span>
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
                  <a href="#recomendation" class="nav-link p-0">Recomendation</a>
                </li>
                <li class="nav-item mt-3 mt-lg-0">
                  <a href="#whatsnew" class="nav-link p-0">What's New</a>
                </li>
              </ul>
            </div>
            <div class="right-content align-items-start d-flex flex-column flex-lg-row  gap-3  ">
              <form action="#" method="get">
                <div class="input-group d-flex align-items-center">
                  <input type="text" name="Search" class="search form " id="">
                  <button class="border-0" type="submit"><i class='bx bx-search' ></i></button>
                </div>
              </form>
              <a href="#" class="text-decoration-none text-black account d-flex align-items-center gap-2">
                <i class='bx bxs-user'></i>
                <p class="m-0">Account</p>
              </a>
              <div class="dropdown">
                <div class="select">
                  <i class='bx bx-cart crt cart-icon' ></i>
                  <span class="selected">Cart</span>
                  <div class="caret bx bx-chevron-down"></div>
                </div>
                <ul class="menu menu-cart">
                  <form action="#">
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

    <!-- Header Start -->
    <section class="head">
      <div class="container">
        <div class="row row-1 justify-content-center">
          <div class="col-4 d-flex justify-content-center gap-lg-4 gap-2  align-items-center title-wrapper">
              <i class='bx bx-user-circle'></i>
              <p class="title m-0">Account</p>
          </div>
        </div>
        <div class="row row-2 justify-content-center">
          <div class="col-12 col-lg-3 text-center toggle-wrapper position-relative">
            <input type="checkbox" class="checkbox ">
            <label class="switch" for="checkbox">
              <div class="slider-wrapper w-100 d-flex ">
                <div class="slider"></div>
              </div>
                <div class="text-wrapper w-100 d-flex justify-content-between">
                  <p class="m-0 profile col-6">Profile</p>
                  <p class="m-0 history col-6">History</p>
                </div>
            </label>
          </div>
        </div>
      </div>
    </section>
    <!-- Header End -->

    <!-- Profile Start -->
    <section class="profile" id="profile">
      <div class="container profile-wrapper d-flex flex-column gap-4">
        <div class="row row-1 justify-content-center">
          <div class="col-lg-6 col-12">
            <div class="title-wrapper">
              <p class="name m-0 mb-2">Name</p>
            </div>
            <input type="text" disabled value="Isyana Sarasvati" name="name" id="name" class="col-12">
          </div>
        </div>
        <div class="row row-2 justify-content-center">
          <div class="col-lg-6 col-12">
            <div class="title-wrapper">
              <p class="name m-0 mb-2">Email</p>
            </div>
            <input type="text" disabled value="IsyanaSarasvati@gmail.com" name="email" id="email" class="col-12">
          </div>
        </div>
        <div class="row row-3 justify-content-center">
          <div class="col-lg-6 col-12">
            <div class="title-wrapper">
              <p class="name m-0 mb-2">Address</p>
            </div>
            <input type="text" disabled value="Jl Merpati Putih No 7, Jakarta Selatan" name="address" id="address" class="col-12">
          </div>
        </div>
        <div class="row row-4 justify-content-center">
          <div class="col-lg-6 col-12">
            <div class="title-wrapper">
              <p class="name m-0 mb-2">Phone</p>
            </div>
            <input type="text" disabled value="089632547456" name="phone" id="phone" class="col-12">
          </div>
        </div>
        <div class="row row-5 justify-content-center">
          <div class="col-lg-6 col-12">
            <a href="{{route('customer.logout')}}" class="text-decoration-none text-black">
              <div class="row justify-content-end">
                  <div class="btn-wrapper text-center p-2 col-3 ">
                    <p class="name m-0">Logout</p>
                  </div>
                </div>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- Profile End -->

    <!-- History Start -->
    <section class="history d-none" id="history">
      <div class="container history-wrapper">
      <div class="row row-1 p-3 p-md-0">
          <div class="col-md-3 col-6 col-lg-2 justify-content-center text-wrapper d-flex ">
            <p class="t-history-1  t-history bb m-0">History</p>
          </div>
        </div>
      <div class="row row-2 p-3 p-md-0 op-wrapper">
          <div class="col-12 mt-3 d-flex flex-column align-items-center item py-4">
            <div class="col-10  d-flex justify-content-between">
              <p class="title m-0">Product</p>
              <p class="status m-0 col-3">Status</p>
            </div>
            <div class="col-10 mt-3 product-wrapper d-flex justify-content-between">
              <div class="product col-8 col-lg-6 left-content d-flex flex-column gap-2">
                <div class="d-flex gap-4 bg-white p-2 rounded-3 ">
                  <div class="col-2 img-wrapper"><img src="{{ asset('Assets/img/p-1.jpg')}}" class="img-fluid rounded-3"></div>
                  <div class="col-9 d-flex justify-content-between flex-column">
                    <div class="col-12 title">Kopi Robusta Gayo Monero Robusta Coffee 250g - Biji Kopi</div>
                    <div class="col-7 col-lg-5 title">2 x Rp.45.000</div>
                  </div>
                </div>
                <div class="d-flex gap-4 bg-white p-2 rounded-3 ">
                  <div class="col-2 img-wrapper"><img src="{{ asset('Assets/img/p-1.jpg')}}" class="img-fluid rounded-3"></div>
                  <div class="col-9 d-flex justify-content-between flex-column">
                    <div class="col-12 title">Kopi Robusta Gayo Monero Robusta Coffee 250g - Biji Kopi</div>
                    <div class="col-7 col-lg-5 title">2 x Rp.45.000</div>
                  </div>
                </div>
                <div class="d-flex gap-4 bg-white p-2 rounded-3 ">
                  <div class="col-2 img-wrapper"><img src="{{ asset('Assets/img/p-1.jpg')}}" class="img-fluid rounded-3"></div>
                  <div class="col-9 d-flex justify-content-between flex-column">
                    <div class="col-12 title">Kopi Robusta Gayo Monero Robusta Coffee 250g - Biji Kopi</div>
                    <div class="col-7 col-lg-5 title">2 x Rp.45.000</div>
                  </div>
                </div>
              </div>
              <div class="col-3 right-content d-flex flex-column justify-content-between">
                <div class="bg-dark status-field  text-white btn-1 bg-dark text-center py-2 rounded-3">On Process</div>
              </div>
          </div>
        </div>
          <div class="col-12 mt-3 d-flex flex-column align-items-center item py-4">
            <div class="col-10  d-flex justify-content-between">
              <p class="title m-0">Product</p>
              <p class="status m-0 col-3">Status</p>
            </div>
            <div class="col-10 mt-3 product-wrapper d-flex justify-content-between">
              <div class="product col-8 col-lg-6 left-content d-flex flex-column gap-2">
                <div class="d-flex gap-4 bg-white p-2 rounded-3 ">
                  <div class="col-2 img-wrapper"><img src="{{ asset('Assets/img/p-1.jpg')}}" class="img-fluid rounded-3"></div>
                  <div class="col-9 d-flex justify-content-between flex-column">
                    <div class="col-12 title">Kopi Robusta Gayo Monero Robusta Coffee 250g - Biji Kopi</div>
                    <div class="col-7 col-lg-5 title">2 x Rp.45.000</div>
                  </div>
                </div>
                <div class="d-flex gap-4 bg-white p-2 rounded-3 ">
                  <div class="col-2 img-wrapper"><img src="{{ asset('Assets/img/p-1.jpg')}}" class="img-fluid rounded-3"></div>
                  <div class="col-9 d-flex justify-content-between flex-column">
                    <div class="col-12 title">Kopi Robusta Gayo Monero Robusta Coffee 250g - Biji Kopi</div>
                    <div class="col-7 col-lg-5 title">2 x Rp.45.000</div>
                  </div>
                </div>
              </div>
              <div class="col-3 right-content d-flex flex-column justify-content-between">
                <div class="bg-dark status-field  text-white btn-1 bg-dark text-center py-2 rounded-3">085602589632</div>
              </div>
          </div>
        </div>
      </div>
      </div>
    </section>
    <!-- Hisroty End -->

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
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  <!-- Bootstrap js -->
  <script src="{{ asset('Assets/Vendor/bootstrap-5.2/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Main Js -->
  <script src="{{ asset('Assets/Js/Account Script/script.js')}}"></script>



</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Landing Page | Supp My Coffee</title>

    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('Assets/img/Logo.png')}}" type="image/x-icon" />

    <!-- CSS Bootrap-->
    <link
      rel="stylesheet"
      href="{{ asset('Assets/Vendor/bootstrap-5.2/css/bootstrap.min.css')}}"
    />

    <!-- Link BoxIcon -->
    <link
      rel="stylesheet"
      href="{{ asset('Assets/Vendor/boxicons-master/css/boxicons.min.css')}}"
    />

    <!-- Link Remixicon -->
    <link
      rel="stylesheet"
      href="{{ asset('Assets/Vendor/RemixIcon-master/fonts/remixicon.css')}}"
    />

    <!-- Link AOS -->
    <link rel="stylesheet" href="{{ asset('Assets/Vendor/aos-2/dist/aos.css')}}" />

    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css'"
    />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('Assets/Css/Index style/main.css')}}" />
  </head>

  <body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light mt-lg-3">
      <div class="container py-1">
        <img loading="lazy" src="{{ asset('Assets/img/Logo.png')}}" class="logo" />
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse mt-3 navbar-collapse justify-content-center toggle"
          id="navbarNav"
        >
          <ul
            class="navbar-nav text-center text-lg-start mt-4 mb-4 mb-lg-0 mt-lg-0 d-flex align-items-center"
          >
            <li class="nav-item mt-3 mt-lg-0">
              <a class="nav-link nav-link-1 nav-link-active" href="#home"
                >Home</a
              >
            </li>
            <li class="nav-item mt-3 mt-lg-0">
              <a class="nav-link nav-link-2" href="#Howitworks">How It Works</a>
            </li>
            <li class="nav-item mt-3 mt-lg-0">
              <a class="nav-link nav-link-3" href="#BestProduct"
                >Best Product</a
              >
            </li>
            <li class="nav-item mt-3 mt-lg-0">
              <a class="nav-link nav-link-4" href="#Contact">Contact</a>
            </li>
            <li class="nav-item mt-3 d-lg-none mt-lg-0">
              <div class="btn btn-login"><a href="{{route('customer.login')}}" class="text-decoration-none text-white">Login</a></div>
            </li>
          </ul>
        </div>
        <div class="btn btn-login d-none d-lg-block"><a href="{{route('customer.login')}}" class="text-decoration-none text-white">Login</a></div>
      </div>
    </nav>
    <!-- Navbar End -->

    <!-- Home Start -->
    <section class="home" id="home">
      <div class="container home-wrapper">
        <div class="row align-items-center">
          <div
            class="col-12 col-lg-6"
            data-aos="fade-left"
            data-aos-duration="1500"
          >
            <div class="head d-flex flex-column gap-3">
              <h1>Buy <span>Coffee Beans</span> with Omah Bakoel Kopi</h1>
              <div
                class="btn-wrapper d-flex gap-3 justify-content-center justify-content-lg-start"
              >
                <a href="{{route('customer.catalog')}}" class="text-decoration-none text-white"><div class="btn">Get Started</div></a>
                <img loading="lazy" src="{{ asset('Assets/img/Arrow.svg')}}" alt="" srcset="" />
              </div>
              <div class="payment-img d-none d-lg-inline">
                <img loading="lazy" src="{{ asset('Assets/img/Payment Gateway.svg')}}" class="img-fluid" />
              </div>
            </div>
          </div>
          <div
            class="col-12 col-lg-6 mt-5 mt-lg-0 text-center"
            data-aos="fade-right"
            data-aos-duration="1500"
          >
            <img loading="lazy" src="{{ asset('Assets/img/Hero_img_index.png')}}" class="img-fluid" />
          </div>
        </div>
      </div>
    </section>
    <!-- Home End -->

    <!-- How it works Start -->
    <section class="howitworks" id="Howitworks">
      <div class="wave-1 p-0"><img loading="lazy" src="{{ asset('Assets/img/wave-1.svg')}}" class="" /></div>
      <div class="container">
        <div class="row justify-content-md-center">
          <div
            class="col-12 col-lg-3 content"
            data-aos="fade-right"
            data-aos-duration="1000"
          >
            <div class="head">
              <p class="btn m-0">How It Works</p>
              <p class="desc mt-4">Make an Order Very Easily</p>
            </div>
          </div>
          <div
            class="col-12 col-md-9 col-lg-3 content box-wrapper px-3"
            data-aos="fade-up"
            data-aos-duration="1000"
          >
            <div class="box">
              <div class="col-2 col-lg-4 text-center logo-wrapper bg-black">
                <img loading="lazy" src="{{ asset('Assets/img/CoffeeBeans.svg')}}" class="img-fluid" />
              </div>
              <div class="col-12 text">
                <div class="title">Select Product</div>
                <div class="desc mt-3">
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim
                  vitae consequuntur recusandae possimus soluta corporis harum
                </div>
              </div>
            </div>
          </div>
          <div
            class="col-12 col-md-9 col-lg-3 content box-wrapper px-3"
            data-aos="fade-down"
            data-aos-duration="1000"
          >
            <div class="box">
              <div class="col-2 col-lg-4 text-center logo-wrapper bg-black">
                <img loading="lazy" src="{{ asset('Assets/img/Money.svg')}}" class="img-fluid" />
              </div>
              <div class="col-12 text">
                <div class="title">Make Payment</div>
                <div class="desc mt-3">
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim
                  vitae consequuntur recusandae possimus soluta corporis harum
                </div>
              </div>
            </div>
          </div>
          <div
            class="col-12 col-md-9 col-lg-3 content box-wrapper px-3"
            data-aos="fade-up"
            data-aos-duration="1000"
          >
            <div class="box">
              <div class="col-2 col-lg-4 text-center logo-wrapper bg-black">
                <img loading="lazy" src="{{ asset('Assets/img/Packet.svg')}}" class="img-fluid" />
              </div>
              <div class="col-12 text">
                <div class="title">Receive Product</div>
                <div class="desc mt-3">
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim
                  vitae consequuntur recusandae possimus soluta corporis harum
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="wave-2 p-0"><img loading="lazy" src="{{ asset('Assets/img/wave-2.svg')}}" class="" /></div>
    </section>
    <!-- How it works End -->

    <!-- Banner Start -->
    <section
      class="banner"
      id="Banner"
      data-aos="flip-left"
      data-aos-duration="800">
      <div class="container banner-wrapper">
        <div class="row">
          <div class="col-12 banner-wrap">
            <div class="row row-2 justify-content-center">
              <div
                class="col-10 d-flex justify-content-between align-items-center"
              >
                <div class="left-content">
                  <div class="head">
                    Lets <span>Shop</span> In <br />
                    Omah Bakoel Kopi
                  </div>
                  <div class="desc">
                    You can find high quality coffee beans <br />at Omah Bakoul
                    Kopi
                  </div>
                </div>
                <a href="" class="text-decoration-none"
                  ><div class="right-content text-bg-light">Get Started</div></a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Banner End -->

    <!-- Best Product Start -->
    <section class="bestproduct mt-5" id="BestProduct">
      <div class="container bestproduct-wrapper">
        <div
          class="row justify-content-center"
          data-aos="zoom-in"
          data-aos-duration="500"
          data-aos-delay="50"
        >
          <div class="col-6 col-md-3 col-lg-2 text-center head">
            Best Product
          </div>
        </div>
        <div
          class="row row-2 mt-lg-5 mt-2 justify-content-center gap-0 gy-4"
        >
        @if ($products)
          @foreach ($products as $product)
              <div class="col-6 col-lg-3 product p-2">
                <div class="box">
                <a href="{{route('customer.catalog.detail', $product->id)}}" class="text-decoration-none">
                    <div class="product-img">
                    <img loading="lazy" src="{{ asset('storage/thumbnail/'.$product->produk_thumbnail)}}" class="img-fluid">                    </div>
                  </a>
                  <a href="" class="text-decoration-none">
                    <div class="product-desc px-3 py-3">
                      <div class="title">
                      {{$product->nama_produk}}
                      </div>
                      <div class="footer d-flex justify-content-between pt-2">
                        <div class="price">Rp.{{$product->harga}}</div>
                        <div class="trans d-flex align-items-end">{{$product->sales}} Terjual</div>
                      </div>
                    </div>
                  </a>
                </div>
            </div>
          @endforeach
        @else          
        <div class="col-6 col-lg-3 product p-2">
          <div class="box">
            <a href="#" class="text-decoration-none">
              <div class="product-img">
                <img loading="lazy" src="{{ asset('Assets/img/p-1.jpg')}}" class="img-fluid" />
              </div>
            </a>
            <a href="" class="text-decoration-none">
              <div class="product-desc px-3 py-3">
                <div class="title">
                  Kopi Robusta Gayo Monero Robusta Coffee 250g - Biji Kopi
                </div>
                <div class="footer d-flex justify-content-between pt-2">
                  <div class="price">Rp.30.000</div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-6 col-lg-3 product p-2">
          <div class="box">
            <a href="#" class="text-decoration-none">
              <div class="product-img">
                <img loading="lazy" src="{{ asset('Assets/img/p-1.jpg')}}" class="img-fluid" />
              </div>
            </a>
            <a href="" class="text-decoration-none">
              <div class="product-desc px-3 py-3">
                <div class="title">
                  Kopi Robusta Gayo Monero Robusta Coffee 250g - Giling Halus
                </div>
                <div class="footer d-flex justify-content-between pt-2">
                  <div class="price">Rp.45.000</div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-6 col-lg-3 product p-2">
          <div class="box">
            <a href="#" class="text-decoration-none">
              <div class="product-img">
                <img loading="lazy" src="{{ asset('Assets/img/p-2.jpg')}}" class="img-fluid" />
              </div>
            </a>
            <a href="" class="text-decoration-none">
              <div class="product-desc px-3 py-3">
                <div class="title">
                  Kopi Arabika Mandailing Monero Arabica Coffee 200gr - Biji
                  Kopi
                </div>
                <div class="footer d-flex justify-content-between pt-2">
                  <div class="price">Rp.40.000</div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-6 col-lg-3 product p-2">
          <div class="box">
            <a href="#" class="text-decoration-none">
              <div class="product-img">
                <img loading="lazy" src="{{ asset('Assets/img/p-2.jpg')}}" class="img-fluid" />
              </div>
            </a>
            <a href="" class="text-decoration-none">
              <div class="product-desc px-3 py-3">
                <div class="title">
                  Kopi Robusta Gayo Monero Robusta Coffee 250g - Giling Halus
                </div>
                <div class="footer d-flex justify-content-between pt-2">
                  <div class="price">Rp.48.000</div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-6 col-lg-3 product p-2">
          <div class="box">
            <a href="#" class="text-decoration-none">
              <div class="product-img">
                <img loading="lazy" src="{{ asset('Assets/img/p-3.jpg')}}" class="img-fluid" />
              </div>
            </a>
            <a href="" class="text-decoration-none">
              <div class="product-desc px-3 py-3">
                <div class="title">
                  Kopi Arabika Flores Monero Arabica Coffee 200gr - Biji kopi
                </div>
                <div class="footer d-flex justify-content-between pt-2">
                  <div class="price">Rp.48.000</div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-6 col-lg-3 product p-2">
          <div class="box">
            <a href="#" class="text-decoration-none">
              <div class="product-img">
                <img loading="lazy" src="{{ asset('Assets/img/p-3.jpg')}}" class="img-fluid" />
              </div>
            </a>
            <a href="" class="text-decoration-none">
              <div class="product-desc px-3 py-3">
                <div class="title">
                  Kopi Arabika Flores Monero Arabica Coffee 200gr - Giling
                  Halus
                </div>
                <div class="footer d-flex justify-content-between pt-2">
                  <div class="price">Rp.55.000</div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-6 col-lg-3 product p-2">
          <div class="box">
            <a href="#" class="text-decoration-none">
              <div class="product-img">
                <img loading="lazy" src="{{ asset('Assets/img/p-4.jpg')}}" class="img-fluid" />
              </div>
            </a>
            <a href="" class="text-decoration-none">
              <div class="product-desc px-3 py-3">
                <div class="title">
                  Kopi Arabika Lintong Monero Arabica Coffee 200gr - Biji Kopi
                </div>
                <div class="footer d-flex justify-content-between pt-2">
                  <div class="price">Rp.42.000</div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-6 col-lg-3 product p-2">
          <div class="box">
          <a href="#" class="text-decoration-none">
              <div class="product-img">
                <img loading="lazy" src="{{ asset('Assets/img/p-4.jpg')}}" class="img-fluid" />
              </div>
            </a>
            <a href="" class="text-decoration-none">
              <div class="product-desc px-3 py-3">
                <div class="title">
                  Kopi Arabika Lintong Monero Arabica Coffee 200gr - Giling
                  Halus
                </div>
                <div class="footer d-flex justify-content-between pt-2">
                  <div class="price">Rp.45.000</div>
                </div>
              </div>
            </a>
          </div>
        </div>
        @endif
          </div>
      </div>
    </section>
    <!-- Best Product End -->

    <!-- Contact Start -->
    <section class="contact" id="Contact">
      <div class="wave-3">
        <img loading="lazy" src="{{ asset('Assets/img/wave-3.svg')}}" alt="" srcset="" />
      </div>
      <div class="container contact-wrapper">
        <div
          class="row row-1 justify-content-center"
          data-aos="zoom-in"
          data-aos-duration="500"
        >
          <div class="col-6 col-md-3 col-lg-2 text-center head">Contact</div>
        </div>
        <div class="row row-2 text-center justify-content-center">
          <form action="#" method="post">
            <div
              class="input-wrap mt-lg-5 mt-4 d-flex flex-column gap-3"
              data-aos="fade-up"
              data-aos-duration="500"
              data-aos-delay="300"
            >
              <div
                class="col-lg-12"
                data-aos="fade-up"
                data-aos-duration="500"
                data-aos-delay="300"
              >
                <input
                  type="text"
                  class="col-6 input-text name"
                  name=""
                  placeholder="Fullname"
                />
              </div>
              <div
                class="col-lg-12"
                data-aos="fade-up"
                data-aos-duration="600"
                data-aos-delay="300"
              >
                <input
                  type="email"
                  class="col-6 input-text email"
                  name=""
                  placeholder="Email"
                />
              </div>
              <div
                class="col-lg-12"
                data-aos="fade-up"
                data-aos-duration="650"
                data-aos-delay="300"
              >
                <textarea
                  class="col-6"
                  placeholder="Your Massage"
                  cols="30"
                  rows="10"
                ></textarea>
              </div>
            </div>
            <div
              class="col-lg-12 mt-4 btn-wrap"
              data-aos="fade-up"
              data-aos-duration="700"
              data-aos-delay="300"
            >
              <button type="submit" class="col-6 button">SEND</button>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!-- Contact End -->

    <!-- Footer Start -->
    <section class="footer">
      <div class="container footer-wrapper">
        <div class="row row-1 mt-5">
          <div class="col-12 col-lg-6">
            <div class="content d-flex flex-column gap-3">
              <div class="img-wrap col-2">
                <img loading="lazy" class="img-fluid rounded-4" src="{{ asset('Assets/img/Logo.png')}}" />
              </div>
              <div class="text col-7">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim
                vitae consequuntur recusandae possimus soluta corporis
              </div>
              <div class="socmed-wrap col-4">
                <a href="#"><img loading="lazy" src="{{ asset('Assets/img/Instagram.png')}}" alt="" /></a>
                <a href="#"><img loading="lazy" src="{{ asset('Assets/img/Facebook.png')}}" alt="" /></a>
                <a href="#"><img loading="lazy" src="{{ asset('Assets/img/Whatsapp.png')}}" alt="" /></a>
                <a href="#"><img loading="lazy" src="{{ asset('Assets/img/Twitter.png')}}" alt="" /></a>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6 d-flex gap-5 mt-4 mt-lg-0">
            <div class="link-wrap col-1 col-md-2 d-flex flex-column gap-3">
              <div class="head">Product</div>
              <div class="child d-flex flex-column gap-1">
                <a href="#" class="text-decoration-none text-black"
                  ><p class="m-0">Catalog</p></a
                >
                <a href="#" class="text-decoration-none text-black"
                  ><p class="m-0">Select Product</p></a
                >
                <a href="#" class="text-decoration-none text-black"
                  ><p class="m-0">Best Product</p></a
                >
                <a href="#" class="text-decoration-none text-black"
                  ><p class="m-0">Contact</p></a
                >
              </div>
            </div>
            <div class="link-wrap col-1 col-md-2 d-flex flex-column gap-3">
              <div class="head">Information</div>
              <div class="child d-flex flex-column gap-1">
                <a href="#" class="text-decoration-none text-black"
                  ><p class="m-0">Customer</p></a
                >
                <a href="#" class="text-decoration-none text-black"
                  ><p class="m-0">Social Media</p></a
                >
                <a href="#" class="text-decoration-none text-black"
                  ><p class="m-0">Best Product</p></a
                >
                <a href="#" class="text-decoration-none text-black"
                  ><p class="m-0">Contact Us</p></a
                >
              </div>
            </div>
            <div class="link-wrap col-1 col-md-2 d-flex flex-column gap-3">
              <div class="head">Company</div>
              <div class="child d-flex flex-column gap-1">
                <a href="#" class="text-decoration-none text-black"
                  ><p class="m-0">Company Info</p></a
                >
                <a href="#" class="text-decoration-none text-black"
                  ><p class="m-0">Investor</p></a
                >
                <a href="#" class="text-decoration-none text-black"
                  ><p class="m-0">Partners</p></a
                >
                <a href="{{route('admin.login')}}" class="text-decoration-none text-black"><p class="m-0">Admin</p></a>
              </div>
            </div>
            <div class="link-wrap col-1 col-md-2 d-flex flex-column gap-3">
              <div class="head">Supports</div>
              <div class="child d-flex flex-column gap-1">
                <a href="#" class="text-decoration-none text-black"
                  ><p class="m-0">Terms And Conditions</p></a
                >
                <a href="#" class="text-decoration-none text-black"
                  ><p class="m-0">Insurance</p></a
                >
                <a href="#" class="text-decoration-none text-black"
                  ><p class="m-0">Warranty</p></a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Footer End -->
  </body>
  <!-- Bootstrap js -->
  <script src="{{ asset('Assets/Vendor/bootstrap-5.2/js/bootstrap.bundle.min.js')}}"></script>

  <!-- AOS JS -->
  <script src="{{ asset('Assets/Vendor/aos-2/dist/aos.js')}}"></script>

  <!-- Main Js -->
  <script src="{{ asset('Assets/Js/Index script/script.js')}}"></script>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
</html>

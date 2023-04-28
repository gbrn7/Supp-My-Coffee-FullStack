<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Detail</title>
  <!-- Icon -->
  <link rel="shortcut icon" href="{{asset('Assets/img/Logo.png')}}" type="image/x-icon">

  <!-- CSS Bootrap-->
  <link rel="stylesheet" href="{{asset('Assets/Vendor/bootstrap-5.2/css/bootstrap.min.css')}}" />

  <!-- CSS -->
  <link rel="stylesheet" href="{{asset('Assets/Css/Checkout Style/main.css')}}" />
</head>
<body>
    <!-- Navbar Start -->
      <nav class="navbar  bg-white navbar-expand-lg navbar-light ">
        <div class="container py-1 d-lg-flex align-items-lg-center">
          <a href="{{route('customer.catalog')}}" class="text-decoration-none">
            <img src="{{asset('Assets/img/Logo.png')}}" class="logo" />
          </a>            
        
            
      </nav>
    <!-- Navbar End -->

    <div class="bg">
      <!-- CONTENT START -->
      <section class="content">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <img src="{{asset('Assets/img/atasCheckoutPage.svg')}}" alt="logo" class="img-fluid">
            </div>
          </div>
          <form action="{{route('customer.transaction')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="alamat" value="{{$alamat}}">
            <input type="hidden" name="subs" value="{{$subs}}">
            <input type="hidden" name="subsDate" value="{{$subsDate}}">
            <input type="hidden" name="ekpedisiDetail" value="{{$ekpedisiDetail}}">
            <input type="hidden" name="totalTagihan" value="{{$totalTagihan}}">
          <div class="row row-1 justify-content-between p-2 p-lg-0">
            <div class="col-lg-6 col-12 left-content">
              <div class="col-6 text-wrapper">
                Pembelian Produk
              </div>
              <div class="produk-wrap">
                @foreach ($products as $product)
                <div class="col-12 produk d-flex gap-4">
                <input type="hidden" name="p-{{$loop->index}}" value="{{$product->id}}">
                <input type="hidden" name="qty-{{$loop->index}}" value="{{$product->qty}}">
                  <div class="col-2 img-wrapper">
                    <img src="{{ asset('storage/thumbnail/'.$product->produk_thumbnail)}}" alt="logo" class="img-fluid rounded-3">
                  </div>
                  <div class="col-8 ">
                    <p class="title mb-1">
                    {{$product->nama_produk}}
                    </p>
                    <p class="qty mb-0">
                      {{$product->qty}} pcs 
                    </p>
                    <p class="harga mt-3">
                      Rp.{{$product->subTotal}}
                    </p>
                  </div>
                </div>
                @endforeach
              </div>
              
            </div>
            <div class="col-lg-5 right-content mt-4 mt-lg-0 col-12 ">
              <div class="slip p-2 w-100 d-flex flex-column align-items-center">
                <div class="col-3">
                  <img src="{{asset('Assets/img/Logo.png')}}" alt="logo" class="img-fluid rounded-3">
                </div>
                <div class="col-8 text-wrap">
                  Ringkasan Pembelian
                </div>
                <div class="col-12 d-flex justify-content-between align-items-center position-relative">
                  <div class="title-wrapper">
                      <p class="judul">
                        Total Pembelian
                      </p>
                      <p class="detail">
                        Total harga {{$banyakBarang}} barang
                      </p>
                  </div>
                  <div class="price-detail">
                    Rp.{{$totalHarga}}
                  </div>
                  <hr class="position-absolute w-100 bottom-0">
                </div>
                <div class="col-12 d-flex justify-content-between align-items-center position-relative">
                  <div class="title-wrapper">
                      <p class="judul">
                        Total Biaya Kirim
                      </p>
                      
                      <p class="detail">
                        Biaya {{$subs}} kali Pengiriman
                      </p>
                      
                  </div>
                  <div class="price-detail">
                    Rp.{{$biayaPengiriman}}
                  </div>
                  <hr class="position-absolute w-100 bottom-0">
                </div>
                <div class="col-12 d-flex justify-content-between align-items-center position-relative">
                  <div class="title-wrapper">
                      <p class="judul">
                        Biaya Transaksi
                      </p>
                      
                      <p class="detail">
                        Biaya Jasa Aplikasi
                      </p>
                  </div>
                  <div class="price-detail">
                    Rp.{{$biayaTransaksi}}
                  </div>
                  <hr class="position-absolute w-100 bottom-0">
    
                </div>
                <div class="col-12 tagihan-wrap">
                  <p class="tagihan">
                    Total Tagihan
                  </p>
                  <p class="harga-tagihan">
                    Rp.{{$totalTagihan}}
                  </p>
                </div>
                <button type="submit" class="col-8 button-checkout">
                  CHECKOUT
                </button>
              </div>
            </div>
          </div>
        </form>
        </div>
      </section>
      <!-- CONTENT END -->
      <!-- Bottom Start -->
      <div class="bottom">
      <!-- Footer Start -->
      <section class="footer">
          <div class="container footer-wrapper">
              <div class="row row-1 mt-5">
                  <div class="col-12 col-lg-6">
                      <div class="content d-flex flex-column gap-3">
                          <div class="img-wrap col-2"><img class="img-fluid rounded-4" src="{{asset('Assets/img/Logo.png')}}"></div>
                          <div class="text col-7">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim vitae consequuntur recusandae possimus soluta corporis </div>
                          <div class="socmed-wrap col-4">
                              <a href="#"><img src="{{asset('Assets/img/Instagram.png')}}" alt=""></a>
                              <a href="#"><img src="{{asset('Assets/img/Facebook.png')}}" alt=""></a>
                              <a href="#"><img src="{{asset('Assets/img/Whatsapp.png')}}" alt=""></a>
                              <a href="#"><img src="{{asset('Assets/img/Twitter.png')}}" alt=""></a>
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
                              <a href="#" class="text-decoration-none text-black"><p class="m-0">Email</p></a>
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
    </div>
</body>
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  <!-- Bootstrap js -->
  <script src="{{asset('Assets/Vendor/bootstrap-5.2/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Main Js -->
  <script src="{{asset('Assets/Js/Product detail script/script.js')}}"></script>
</html>
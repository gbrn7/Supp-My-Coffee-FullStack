<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>

    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('Assets/img/Logo.png') }}" type="image/x-icon">
  
    <!-- CSS Bootrap-->
    <link rel="stylesheet" href="{{ asset('Assets/Vendor/bootstrap-5.2/css/bootstrap.min.css') }}" />
  
    <!-- Link BoxIcon -->
    <link rel="stylesheet" href="{{ asset('Assets/Vendor/boxicons-master/css/boxicons.min.css') }}" />
  
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('Assets/Css/Admin-Dashboard Main style/main.css') }}" />

</head>
<body class="vh-100 dark">

  <!-- Pre Load Start -->
  <div class="loading-wrapper h-100 w-100 position-absolute bg-black d-flex justify-content-center align-items-center top-0 ">
    <div class="jelly-triangle">
      <div class="jelly-triangle__dot"></div>
      <div class="jelly-triangle__traveler"></div>
  </div>
  
  <svg width="0" height="0" class="jelly-maker">
      <defs>
          <filter id="uib-jelly-triangle-ooze">
              <feGaussianBlur in="SourceGraphic" stdDeviation="7.3" result="blur"></feGaussianBlur>
              <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="ooze"></feColorMatrix>
              <feBlend in="SourceGraphic" in2="ooze"></feBlend>
          </filter>
      </defs>
  </svg>
  </div>
  <!-- Pre Load End -->

  <!-- sidebar Start -->
      <nav class="sidebar d-none">
        <header class="d-flex gap-2 align-items-center">
          <div class="image-text">
            <span class="image">
              <img src="{{ asset('Assets/img/Logo.png') }}" alt="" srcset="">
            </span>
          </div>
    
          <div class="text header-text">
            <p class="name m-0">Omah Bakoel Kopi</p>
            <p class="name-system m-0">Supp My Coffee</p>
          </div>
    
          <i class='bx bx-chevron-right toggle'></i>
        </header>
    
        <div class="menu-bar h-100 d-flex justify-content-between flex-column">
          <div class="menu d-flex flex-column h-100 justify-content-between"> 
          <ul class="menu-links d-flex flex-column gap-2">
              <li class="nav-link active">
                <a href="{{route('admin.dashboard')}}" class="text-decoration-none text-black">
                  <i class='bx bx-home' ></i>
                  <span class="text nav-text">Dashboard</span>
                </a>
              </li>
              <li class="nav-link ">
                <a href="{{route('admin.produk')}}" class="text-decoration-none text-black">
                  <i class='bx bx-coffee-togo' ></i>
                  <span class="text nav-text">Data Produk</span>
                </a>
              </li>
              <li class="nav-link">
                <a href="#" class="text-decoration-none text-black">
                  <i class='bx bxs-wallet' ></i>
                  <span class="text nav-text">Data Transaksi</span>
                </a>
              </li>
              <li class="nav-link">
                <a href="#" class="text-decoration-none text-black">
                  <i class='bx bx-calendar-event' ></i>
                  <span class="text nav-text">Data Jadwal</span>
                </a>
              </li>
            </ul>l>
            <div class="bottom-content ">
              <ul>
                <li class="nav-link">
                  <a href="#" class="text-decoration-none text-black">
                    <i class='bx bx-log-out'></i>
                    <span class="text nav-text">Logout</span>
                  </a>
                </li>
                <li class="mode">
                  <div class="moon-sun">
                    <i class='bx bx-moon icon moon'></i>
                    <i class='bx bx-sun icon sun'></i>
                  </div>
                  <span class="mode-text text">Dark Mode</span>
    
                  <div class="toggle-switch">
                    <span class="switch dark"></span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
  <!-- sidebar End -->

  <!-- Header Bg Start -->
  <div class="header-bg position-absolute d-none"></div>
  <!-- Header Bg End -->

  <!-- Footer Start -->
  <div class="footer-wrapper fixed-bottom text-secondary d-none">
    <strong>Copyright © 2023 SUPP MY COFFEE</strong> All Right Reserved
  </div>
  <!-- Footer End -->


  <!-- Content Start-->
  <section class="content h-100 w-100 d-none main">
    <div class="container-fluid  m-0">
        <div class="row row-1 ">
          <div class="col-12 title">Dashboard</div>
        </div>
        <div class="row row-2 d-flex gap-2  mt-2">
            <div class="card card-1 col-10 col-lg-3 p-1 rounded-3">
                <div class="head p-2 d-flex align-items-center gap-2 letter"><i class='text-danger bx bx-money-withdraw p-2 rounded-circle' ></i> <span>Total Revenue</span></div>
                <div class="content-text px-2 mt-3"><p 
                data-purecounter-start="0"
                data-purecounter-end="24340870"
                data-purecounter-duration="1"
                data-purecounter-currency="Rp."
                class="text m-0 purecounter">0</p></div>
            </div>
            <div class="card card-2 col-10 col-lg-3 p-1 rounded-3">
                <div class="head p-2 d-flex align-items-center gap-2 letter"><i class='bx bxs-package p-2 rounded-circle text-success' ></i> <span>Total Order</span></div>
                <div class="content-text px-2 mt-3 "><p 
                data-purecounter-start="0"
                data-purecounter-end="4506"
                data-purecounter-duration="1"
                class="text m-0 purecounter">0</p></div>
            </div>
            <div class="card card-3 col-10 col-lg-3 p-1 rounded-3">
                <div class="head p-2 d-flex align-items-center gap-2 letter"><i class='text-primary bx bx-shopping-bag p-2 rounded-circle' ></i> <span>New Order</span></div>
                <div class="content-text px-2 mt-3 "><p 
                data-purecounter-start="0"
                data-purecounter-end="58"
                data-purecounter-duration="1."
                class="text m-0 purecounter">0</p></div>
            </div>

        </div>
        <div class="row  row-3 mt-2 gap-3">
        <div class="col-11 col-lg-5 bg-white table-wrapper mt-2  p-2 border-dark rounded-3">
        <p class="m-0 pb-1  border-bottom border-dark">Top Produk</p>
        <table id="" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>01</td>
                <td>Kopi arabika Gayo Monero Robusta Coffee 250g - Biji Kopi</td>
                <td>Draft</td>
            </tr>
            <tr>
                <td>02</td>
                <td>Kopi Robusta Gayo Monero Robusta Coffee 250g - Biji Kopi</td>
                <td>Draft</td>
            </tr>
            <tr>
                <td>03</td>
                <td>Kopi Robusta Gayo Monero Robusta Coffee 250g - Biji Kopi</td>
                <td>Draft</td>
            </tr>
            <tr>
                <td>04</td>
                <td>Kopi Robusta Gayo Monero Robusta Coffee 250g - Biji Kopi</td>
                <td>Draft</td>
            </tr>
            <tr>
                <td>05</td>
                <td>Kopi Robusta Gayo Monero Robusta Coffee 250g - Biji Kopi</td>
                <td>Draft</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Status</th>
            </tr>
        </tfoot>
        </table>
            </div>
        <div class="col-11 col-lg-4 bg-white mt-2 table-wrapper  p-2 border-dark rounded-3">
              <p class="m-0 pb-1 border-bottom border-dark">Top Transaksi</p>
              <table id="" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID User</th>
                        <th>Total</th>
                        <th>Status Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td>03</td>
                        <td>Rp.400000</td>
                        <td>Success</td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>03</td>
                        <td>Rp.300000</td>
                        <td>Success</td>
                    </tr>
                    <tr>
                        <td>01</td>
                        <td>04</td>
                        <td>Rp.500000</td>
                        <td>Success</td>
                    </tr>
                    <tr>
                        <td>01</td>
                        <td>03</td>
                        <td>Rp.400000</td>
                        <td>Success</td>
                    </tr>
                    <tr>
                        <td>01</td>
                        <td>03</td>
                        <td>Rp.400000</td>
                        <td>Success</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>ID User</th>
                        <th>Total</th>
                        <th>Status Pembayaran</th>
                    </tr>
                </tfoot>
            </table>
            </div>
        </div>
        <div class="row  row-4 mt-2 pb-4 gap-3">
          <div class="col-10 bg-white table-wrapper mt-2  p-2 border-dark rounded-3">
            <p class="m-0 pb-1 border-bottom border-dark">Top Schedule</p>
            <table id="" class="table table-striped  mb-5" style="width:100%">
              <thead>
                  <tr>
                      <th >ID Transaksi</th>
                      <th>Nama Customer</th>
                      <th>Alamat</th>
                      <th>Jadwal Pengiriman</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                    <td>03</td >
                    <td>Fajar</td >
                    <td>Jl Merpati No.4</td >
                    <td>15 April 2023</td >
                  </tr>
                  <tr>
                    <td>03</td >
                    <td>Fajar</td >
                    <td>Jl Merpati No.4</td >
                    <td>15 April 2023</td >
                  </tr>
                  <tr>
                    <td>03</td >
                    <td>Fajar</td >
                    <td>Jl Merpati No.4</td >
                    <td>15 April 2023</td >
                  </tr>
                  <tr>
                    <td>03</td >
                    <td>Fajar</td >
                    <td>Jl Merpati No.4</td >
                    <td>15 April 2023</td >
                  </tr>
                  <tr>
                    <td>03</td >
                    <td>Fajar</td >
                    <td>Jl Merpati No.4</td >
                    <td>15 April 2023</td >
                  </tr>

              </tbody>
              <tfoot>
                  <tr>
                    <th>ID Transaksi</th>
                    <th>Nama Customer</th>
                    <th>Alamat</th>
                    <th>Jadwal Pengiriman</th>
                  </tr>
              </tfoot>
          </table>
          </div>
        </div>
  </section>
  <!-- Content End -->

</body>

  <!-- Bootstrap js -->
  <script src="{{ asset('Assets/Vendor/bootstrap-5.2/js/bootstrap.bundle.min.js') }}"></script>

  <!-- jquery Table -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

  <!-- Pure Counter JS -->
  <script src="{{ asset('Assets/Vendor/purecounterjs-main/dist/purecounter_vanilla.js') }}"></script>

  <!-- Main Js -->
  <script src="{{ asset('Assets/Js/Admin-Dashboard script/script.js') }}"></script>

</html>
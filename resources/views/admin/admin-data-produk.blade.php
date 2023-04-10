<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | Data Produk</title>

    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('Assets/img/Logo.png') }}" type="image/x-icon">
  
    <!-- CSS Bootrap-->
    <link rel="stylesheet" href="{{ asset('Assets/Vendor/bootstrap-5.2/css/bootstrap.min.css') }}" />
  
    <!-- Link BoxIcon -->
    <link rel="stylesheet" href="{{ asset('Assets/Vendor/boxicons-master/css/boxicons.min.css') }}" />
  
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('Assets/Css/Admin-Dashboard style/main.css') }}" />

</head>
<body class="dark">

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
  <nav class="sidebar">
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
          <li class="nav-link">
            <a href="{{route('admin.dashboard')}}" class="text-decoration-none text-black">
              <i class='bx bx-home' ></i>
              <span class="text nav-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-link active">
            <a href="{{route('admin.produk')}}" class="text-decoration-none text-black">
              <i class='bx bx-coffee-togo' ></i>
              <span class="text nav-text">Data Produk</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="{{route('admin.transaksi')}}" class="text-decoration-none text-black">
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
        </ul>
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
  <section class="content d-none">
    <p class="text-black title">Data Produk</p>
    <div class="btn-wrapper mt-2 mb-4">
        <div class="btn btn-success"><a href="{{route('admin.produk.create')}}" class="text-decoration-none text-white">Tambah Produk</a></div>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <div class="Produk mt-2 mb-2 col-10">
    <table id="example" class="table table-striped mt-3" style="width:100%">
        <thead>
            <tr>
                <th>ID Produk</th>
                <th>Foto</th>
                <th>Nama Produk</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($products as  $product)
                 <tr>
                    <td>{{ $product->id}}</td>
                    <td><img src="{{ asset('storage/thumbnail/'.$product->produk_thumbnail)}}" class="img-produk"></td>
                    <td>{{ $product->nama_produk}}</td>
                    <td class="text-capitalize">{{ $product->status}}</td>
                    <td class="">
                    <div class="btn-wrapper d-flex gap-2">
                        <a href="{{route('admin.produk.edit',  $product->id)}}" class="btn btn-secondary text-white"><i class='bx bx-edit'></i></a>
                        <form action="{{route('admin.produk.destroy', $product->id)}}" method="post">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="">
                            <button type="submit" class="btn btn-danger">
                                <i class='bx bx-trash text-white' ></i>
                            </button>
                        </form>
                    </div>
                </td>
                 </tr>
             @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID Produk</th>
                <th>Foto</th>
                <th>Nama Produk</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
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
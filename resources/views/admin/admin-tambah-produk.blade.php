<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | Tambah Data Produk</title>

  <!-- Icon -->
  <link rel="shortcut icon" href="{{ asset('Assets/img/Logo.png') }}" type="image/x-icon">

  <!-- CSS Bootrap-->
  <link rel="stylesheet" href="{{ asset('Assets/Vendor/bootstrap-5.2/css/bootstrap.min.css') }}" />

  <!-- Link BoxIcon -->
  <link rel="stylesheet" href="{{ asset('Assets/Vendor/boxicons-master/css/boxicons.min.css') }}" />

  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('Assets/Css/Admin-Tambah Produk style/main.css') }}" />

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

  <!-- sidebar start -->
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
          <li class="nav-link ">
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
            <a href="{{route('admin.jadwal')}}" class="text-decoration-none text-black">
              <i class='bx bx-calendar-event' ></i>
              <span class="text nav-text">Data Jadwal</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="{{route('admin.visualisasiData')}}" class="text-decoration-none text-black">
              <i class='bx bx-bar-chart-alt'></i>
              <span class="text nav-text">Visualisasi Data</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="{{route('admin.dataAdmin')}}" class="text-decoration-none text-black">
              <i class='bx bxs-user'></i>
              <span class="text nav-text">Data Admin</span>
            </a>
          </li>
        </ul>
        <div class="bottom-content ">
          <ul>
            <li class="nav-link">
            <a href="{{route('admin.logout')}}" class="text-decoration-none text-black">
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
    <p class="text-black title mb-2">Data Produk</p>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10">

        <!-- alert here -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
        </div>
        @endif

          <div class="card card-primary">
            <div class="card-header ">
              <h5 class="card-title m-0">Tambah Data Produk</h5>
            </div>
            <form  method="POST" action="{{route('admin.produk.store')}}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group mb-3">
                  <label for="nama" class="mb-1">Nama</label>
                  <input class="form-control" type="text" name="nama_produk" id="nama" placeholder="Kopi Robusta 250 gr giling halus" value="{{old('nama_produk')}}">
                </div>
                <div class="form-file">
                  <div class="mb-3">
                    <label for="formFile" class="form-label card-title">Foto Produk</label>
                    <input class="form-control" type="file"  name="produk_thumbnail" id="formFile">
                  </div>
                </div>
                <div class="form-group mb-3">
                  <label for="deskripsi" class="mb-1">Deskripsi</label>
                  <textarea class="form-control" type="text" name="desc" id="deskripsi"  placeholder="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio, blanditiis. Perspiciatis non molestias, ducimus consequuntur nostrum ratione amet nemo quae.">{{old('desc')}}</textarea>
                </div>
                <div class="form-group mb-3">
                  <label for="berat" class="mb-1">Berat (gr)</label>
                  <input class="form-control" type="text" name="berat" id="berat" value="{{old('berat')}}" placeholder="250">
                </div>
                <div class="form-group mb-3">
                  <label for="Harga" class="mb-1">Harga (Rp.)</label>
                  <input class="form-control" type="text" name="harga" id="harga" placeholder="40000" value="{{old('harga')}}">
                </div>
                <div class="form-group mb-3">
                  <label for="Status" class="mb-1">Status</label>
                  <select class="form-select status text-secondary" aria-label="Default select example"  name="status">
                    <option value="publish" class="text-secondary status-state"  {{old('status') === '1' ? "selected" : ""}}>Publish</option>
                    <option value="draft" class="text-secondary status-state"  {{old('status') === '0' ? "selected" : ""}} >Draft</option>
                  </select>
                </div>

              </div>
              <div class="card-footer mb-2">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
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


  <!-- Main Js -->
  <script src="{{ asset('Assets/Js/Admin-Dashboard script/script.js') }}"></script>

</html>
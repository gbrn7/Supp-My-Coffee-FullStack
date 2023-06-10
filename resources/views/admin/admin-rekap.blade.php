<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | Rekap Harian</title>

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
  @include('sweetalert::alert')
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
          <li class="nav-link ">
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
          @if (auth()->user()->role == 'superAdmin')
          <li class="nav-link">
            <a href="{{route('admin.dataAdmin')}}" class="text-decoration-none text-black">
              <i class='bx bxs-user'></i>
              <span class="text nav-text">Data Admin</span>
            </a>
          </li>
          @endif
          <li class="nav-link">
            <a href="{{route('admin.laporanPenjualan')}}" class="text-decoration-none text-black">
              <i class='bx bxs-file'></i>
              <span class="text nav-text">Laporan Penjualan</span>
            </a>
          </li>
          <li class="nav-link active">
            <a href="{{route('admin.rekap')}}" class="text-decoration-none text-black">
              <i class='bx bxs-report'></i>
              <span class="text nav-text">Rekap Harian</span>
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
  <div class="footer-wrapper fixed-bottom text-secondary">
    <strong>Copyright © {{ date('Y') }} SUPP MY COFFEE</strong> All Right Reserved
  </div>
  <!-- Footer End -->


  <!-- Content Start-->
  <section class="content">
    <div class="card col-10 bg-transparent">
      <p class="text-black title card-header">Rekap Harian</p>
      <div class="Produk col-12 mt-2 mb-2 card-body ">
        <form action="{{route('admin.rekap.filter')}}" method="post">
          @csrf
            <div class="row head">
              <div class="d-flex flex-column flex-lg-row  justify-content-start gap-2 align-items-end col-12">
                <div class="form-group col-lg-2 col-12">
                  <label for="exampleFormControlInput1" class="form-label label-rentang">Tanggal</label>
                  <input type="date" class="form-control" name="tglAkhir" id="exampleFormControlInput1" placeholder="name@example.com" value="{{$tglAkhir}}">
                </div>
                <div class="col-lg-2 col-12 mt-4 mt-lg-0">
                  <button type="submit" class="col-12 btn btn-success">Terapkan</button>
                </div>              
              </div>
            </div>
        </form>

        @if(session()->has('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        <hr class="my-3">
        <div class="row row-2">
        <table id="jTable" class="table table-striped mt-4" style="width: 100%">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nama Cust</th>
                  <th>List Produk</th>
                  <th>Alamat</th>
                  <th>Ekspedisi</th>
                  <th>Jadwal Pengiriman</th>
                  <th>Tanggal Dikirim</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($schedules as $schedule)
                <tr>
                  <td>{{$schedule->id}}</td>
                  <td>{{$schedule->nama}}</td>
                  <td>
                      @foreach ($schedule->details as $detail)
                        {{$detail->nama_produk}} : {{$detail->qty}} Pcs <br><br>
                      @endforeach
                  </td>
                  <td>{{$schedule->alamat}}</td>
                  <td class="text-capitalize">{{$schedule->ekspedisi}}</td>
                  <td>{{$schedule->tanggal_pengiriman}}</td>
                  <td>{{$schedule->updated_at}}</td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Nama Cust</th>
                  <th>List Produk</th>
                  <th>Alamat</th>
                  <th>Ekspedisi</th>
                  <th>Jadwal Pengiriman</th>
                  <th>Tanggal Dikirim</th>
                </tr>
              </tfoot>
            </table>
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
  <script src="{{ asset('Assets/Js/Admin-dataJadwal script/script.js') }}"></script>


</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Finish Payment | Supp My Coffee</title>
  
    <link rel="stylesheet" href="{{ asset('Assets/Css/Finish Payment/main.css') }}" />

    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('Assets/img/Logo.png') }}" type="image/x-icon">

    <!-- CSS Bootrap-->
    <link rel="stylesheet" href="{{ asset('Assets/Vendor/bootstrap-5.2/css/bootstrap.min.css') }}" />

</head>
<body>
  <div class="finish-payment d-flex flex-column justify-content-end">
    <!-- main start -->
      <section class="main">
        <div class="container-fluid ">
          <div class="row justify-content-center align-items-center">
            <div class="col-10 col-md-6 d-flex gap-3 flex-column align-items-center justify-content-center">
              <div class="col-lg-3 col-5 "><img src="{{ asset('Assets/img/Logo.png')}}" class="img-fluid rounded-5"></div>
              <div class="col-12 text-center text-wrapper">Thank You for<br>Your Order</div>
              <div class="col-5 col-lg-2 p-2 btn-wrapper text-center bg-white rounded-3"><a href="{{route('customer.account')}}" class="text-decoration-none text-black">Back To History</a></div>
            </div>
          </div>
        </div>
      </section>
    <!-- main end -->
      <!-- Footer Start -->
      <section class="footer">
          <div class="container footer-wrapper">
              <div class="row row-1 mt-5">
                  <div class="col-12 col-lg-6">
                      <div class="content d-flex flex-column gap-3">
                          <div class="img-wrap col-2"><img class="img-fluid rounded-4" src="{{ asset('Assets/img/Logo.png')}}"></div>
                          <div class="text text-white col-7">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim vitae consequuntur recusandae possimus soluta corporis </div>
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
                          <div class="head">Product</div>
                          <div class="child d-flex flex-column gap-1">
                              <a href="#" class="text-decoration-none text-white"><p class="m-0">Catalog</p></a>
                              <a href="#" class="text-decoration-none text-white"><p class="m-0">Select Product</p></a>
                              <a href="#" class="text-decoration-none text-white"><p class="m-0">Best Product</p></a>
                              <a href="#" class="text-decoration-none text-white"><p class="m-0">Contact</p></a>
                          </div>
                      </div>
                      <div class="link-wrap col-1 col-md-2 d-flex flex-column gap-3">
                          <div class="head">Information</div>
                          <div class="child d-flex flex-column gap-1">
                              <a href="#" class="text-decoration-none text-white"><p class="m-0">Customer</p></a>
                              <a href="#" class="text-decoration-none text-white"><p class="m-0">Social Media</p></a>
                              <a href="#" class="text-decoration-none text-white"><p class="m-0">Best Product</p></a>
                              <a href="#" class="text-decoration-none text-white"><p class="m-0">Contact Us</p></a>
                          </div>
                      </div>
                      <div class="link-wrap col-1 col-md-2 d-flex flex-column gap-3">
                          <div class="head">Company</div>
                          <div class="child d-flex flex-column gap-1">
                              <a href="#" class="text-decoration-none text-white"><p class="m-0">Company Info</p></a>
                              <a href="#" class="text-decoration-none text-white"><p class="m-0">Investor</p></a>
                              <a href="#" class="text-decoration-none text-white"><p class="m-0">Partners</p></a>
                              <a href="{{route('admin.login')}}" class="text-decoration-none text-white"><p class="m-0">Admin</p></a>
                          </div>
                      </div>
                      <div class="link-wrap col-1 col-md-2 d-flex flex-column gap-3">
                          <div class="head">Supports</div>
                          <div class="child d-flex flex-column gap-1">
                              <a href="#" class="text-decoration-none text-white"><p class="m-0">Terms And Conditions</p></a>
                              <a href="#" class="text-decoration-none text-white"><p class="m-0">Insurance</p></a>
                              <a href="#" class="text-decoration-none text-white"><p class="m-0">Warranty</p></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- Footer End -->
  </div>
</body>
<!-- Bootstrap js -->
<script src="{{ asset('Assets/Vendor/bootstrap-5.2/js/bootstrap.bundle.min.js')}}"></script>
</html>
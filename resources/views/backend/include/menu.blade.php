<aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
    <!-- Logo -->
    <div class="logo-sn ms-d-block-lg">
      <a class="pl-0 ml-0 text-center" href="{{ route('admin.dashboard') }}">
        <img src="{{asset('backend/logo1.jpg')}}" alt="logo">
      </a>
    </div>
    <!-- Navigation -->
    <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
      <!-- Dashboard -->
      <li class="menu-item">
      <a href="{{route('admin.dashboard')}}" class=""  > <span><i class="material-icons fs-16">dashboard</i>Dashboard </span></a>
      </li>
      <!-- /Dashboard -->
      <!-- Banner -->
      <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#banner" aria-expanded="false" aria-controls="customer"> <span><i class="fa fa-plus-square fs-16"></i>Banner</span>
        </a>
        <ul id="banner" class="collapse" aria-labelledby="customer" data-parent="#side-nav-accordion">
          <li> 
            <a href="{{route('banner')}}">Create Banner</a> 
          </li>
          <li> 
            <a href="{{route('manage.banner')}}">Manage Banner</a> 
          </li>
        </ul>
      </li>
      <!-- Banner  end -->
       <!-- Category-->
       <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#Category" aria-expanded="false" aria-controls="customer"> <span><i class="fa fa-plus-square fs-16"></i>Category </span>
        </a>
        <ul id="Category" class="collapse" aria-labelledby="Category" data-parent="#side-nav-accordion">
          <li> 
            <a href="{{route('category')}}">Add Category</a> 
          </li>
          <li> 
            <a href="{{route('manage.category')}}">Manage Category</a> 
          </li>
        </ul>
      </li>
      <!-- Category  end -->
       <!-- Delivery-->
       <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#Deliveryman" aria-expanded="false" aria-controls="customer"> <span><i class="fa fa-plus-square fs-16"></i>Delivery Boy</span>
        </a>
        <ul id="Deliveryman" class="collapse" aria-labelledby="Deliveryman" data-parent="#side-nav-accordion">
          <li> 
            <a href="{{route('delivery')}}">Create Account Deliveryman</a> 
          </li>
          <li> 
            <a href="{{route('manage.delivery')}}">Manage Delivery Man</a> 
          </li>
        </ul>
      </li>
      <!-- Delivery  end -->

       <!-- Coupon Code-->
       <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#Coupon" aria-expanded="false" aria-controls="customer"> <span><i class="fa fa-plus-square fs-16"></i>Coupon Code</span>
        </a>
        <ul id="Coupon" class="collapse" aria-labelledby="Coupon" data-parent="#side-nav-accordion">
          <li> 
            <a href="{{route('coupon')}}">Create Coupon</a> 
          </li>
          <li> 
            <a href="{{route('manage.coupon')}}">Manage Coupon</a> 
          </li>
        </ul>
      </li>
      <!-- Coupon Code  end -->

        <!-- Product -->
        <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#Product" aria-expanded="false" aria-controls="customer"> <span><i class="fa fa-plus-square fs-16"></i>Manage Day Care</span>
        </a>
        <ul id="Product" class="collapse" aria-labelledby="Product" data-parent="#side-nav-accordion">
          <li> 
            <a href="{{route('product')}}">Create Day Care</a> 
          </li>
          <li> 
            <a href="{{route('manage.product')}}">Manage Day Care</a> 
          </li>
        </ul>
      </li>

        <!-- Setting -->
        <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#report" aria-expanded="false" aria-controls="seeting"> <span><i class="fa fa-plus-square fs-16"></i>Manage Report</span>
        </a>
        <ul id="report" class="collapse" aria-labelledby="customer" data-parent="#side-nav-accordion">
          <li> 
            <a href="{{route('manage.report')}}">Manage report</a> 
          </li>
         
        </ul>
      </li>
      <!-- Setting  end -->
      <!-- Product  end -->

       <!-- Setting -->
       <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#seeting" aria-expanded="false" aria-controls="seeting"> <span><i class="fa fa-plus-square fs-16"></i>Website Setting</span>
        </a>
        <ul id="seeting" class="collapse" aria-labelledby="customer" data-parent="#side-nav-accordion">
          <li> 
            <a href="{{route('seeting')}}">Update Website info</a> 
          </li>
         
        </ul>
      </li>
      <!-- Setting  end -->
    </ul>
  </aside>
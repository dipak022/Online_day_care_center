<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from slidesigma.com/themes/html/costic/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Feb 2020 13:03:18 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title')</title>
  <!-- Iconic Fonts -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{asset('backend/')}}/vendors/iconic-fonts/font-awesome/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('backend/')}}/vendors/iconic-fonts/flat-icons/flaticon.css">
  <link rel="stylesheet" href="{{asset('backend/')}}/vendors/iconic-fonts/cryptocoins/cryptocoins.css">
  <link rel="stylesheet" href="{{asset('backend/')}}/vendors/iconic-fonts/cryptocoins/cryptocoins-colors.css">
  <!-- Bootstrap core CSS -->
  <link href="{{asset('backend/')}}/assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- jQuery UI -->
  <link href="{{asset('backend/')}}/assets/css/jquery-ui.min.css" rel="stylesheet">
  <!-- Page Specific CSS (Slick Slider.css) -->
  <link href="{{asset('backend/')}}/assets/css/slick.css" rel="stylesheet">
  <link href="{{asset('backend/')}}/assets/css/datatables.min.css" rel="stylesheet">
  <!-- Costic styles -->
  <link href="{{asset('backend/')}}/assets/css/style.css" rel="stylesheet">
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
  <!-- Favicon -->
  <link rel="icon" type="{{asset('backend/')}}/image/png" sizes="32x32" href="favicon.ico">
</head>




<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">
  <!-- Preloader -->
  <div id="preloader-wrap">
    <div class="spinner spinner-8">
      <div class="ms-circle1 ms-child"></div>
      <div class="ms-circle2 ms-child"></div>
      <div class="ms-circle3 ms-child"></div>
      <div class="ms-circle4 ms-child"></div>
      <div class="ms-circle5 ms-child"></div>
      <div class="ms-circle6 ms-child"></div>
      <div class="ms-circle7 ms-child"></div>
      <div class="ms-circle8 ms-child"></div>
      <div class="ms-circle9 ms-child"></div>
      <div class="ms-circle10 ms-child"></div>
      <div class="ms-circle11 ms-child"></div>
      <div class="ms-circle12 ms-child"></div>
    </div>
  </div>
  <!-- Overlays -->
  <div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
  <div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>
  <!-- Sidebar Navigation Left -->
   @include('backend.include.menu')
  <!-- Sidebar Right -->

  <!-- Main Content -->
  <main class="body-content">
    <!-- Navigation Bar -->
    @include('backend.include.topbar')
    @yield('content')
    
  </main>
  <!-- MODALS -->
  <!-- Quick bar -->
  
 
  <!-- Notes Modal -->
  <div class="modal fade" id="notes-modal" tabindex="-1" role="dialog" aria-labelledby="notes-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-secondary">
          <h5 class="modal-title has-icon text-white" id="NoteModal">New Note</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form>
          <div class="modal-body">
            <div class="ms-form-group">
              <label>Note Title</label>
              <input type="text" class="form-control" name="note-title" value="">
            </div>
            <div class="ms-form-group">
              <label>Note Description</label>
              <textarea class="form-control" name="note-description"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-secondary shadow-none" data-dismiss="modal">Add Note</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- SCRIPTS -->
  <!-- Global Required Scripts Start -->
  <script src="{{asset('backend/')}}/assets/js/jquery-3.3.1.min.js"></script>
  <script src="{{asset('backend/')}}/assets/js/popper.min.js"></script>
  <script src="{{asset('backend/')}}/assets/js/bootstrap.min.js"></script>
  <script src="{{asset('backend/')}}/assets/js/perfect-scrollbar.js">
  </script>
  <script src="{{asset('backend/')}}/assets/js/jquery-ui.min.js">
  </script>
  <!-- Global Required Scripts End -->
  <!-- Page Specific Scripts Start -->

  <script src="{{asset('backend/')}}/assets/js/Chart.bundle.min.js">
  </script>
  <script src="{{asset('backend/')}}/assets/js/widgets.js"> </script>
  <script src="{{asset('backend/')}}/assets/js/clients.js"> </script>
  <script src="{{asset('backend/')}}/assets/js/Chart.Financial.js"> </script>
  <script src="{{asset('backend/')}}/assets/js/d3.v3.min.js">
  </script>
  <script src="{{asset('backend/')}}/assets/js/topojson.v1.min.js">
  </script>
  <script src="{{asset('backend/')}}/assets/js/datatables.min.js">
  </script>
  <script src="{{asset('backend/')}}/assets/js/data-tables.js">
  </script>
  <!-- Page Specific Scripts Finish -->
  <!-- Costic core JavaScript -->
  <script src="{{asset('backend/')}}/assets/js/framework.js"></script>
  <!-- Settings -->
  <script src="{{asset('backend/')}}/assets/js/settings.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script>
            @if(Session::has('message'))
                  var type="{{Session::get('alert-type','info')}}"
      
            
                  switch(type){
                        case 'info':
                           toastr.info("{{ Session::get('message') }}");
                           break;
                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;
                  case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;
                    case 'error':
                          toastr.error("{{ Session::get('message') }}");
                          break;
                  }
            @endif
      </script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>      
</body>


<!-- Mirrored from slidesigma.com/themes/html/costic/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Feb 2020 13:05:48 GMT -->
</html>

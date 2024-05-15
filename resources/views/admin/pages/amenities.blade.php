<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Venpic Agencies</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  </head>



  
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
            @include('admin.sidebar')
      <!-- partial -->
            @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">  
              @if (session()->has('message'))

              <div class="alert alert-success">

                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{ session()->get('message') }}

              </div>
              
              @endif





               {{-- Add amenities name --}}
                
               <div class="preview-list" style="width:300px; transform:translateX(380px);">
                <div class="preview-item-content">
                  <label style="padding: 8px; transform:translateX(80px); ">Amenities</label>
                </div>
                <div class="dropdown-divider"></div>
                <form action="{{ url('add_amenity') }}" method="POST">
                  @csrf
                  <div class="preview-item-content">
                    <label style="padding: 8px;" for="amenity_name">Amenity Name:</label>
                    <input style="background: transparent; border:none; outline:none; color:#fff; padding:8px;" type="text"  name="amenity_name" id="amenity_name" required placeholder="Write amenity name...">
                  </div>

                  <div class="dropdown-divider"></div>

                  <button type="submit"  style="background: transparent; border:none; outline:none; color:rgb(38, 235, 38); transform:translateX(80px);" class="p-3 mb-0 text-center">Add Amenity</button>
                  
                  <div class="dropdown-divider"></div>
                </form>

              </div>

              {{-- Show amenities --}}
      
              <div class="table-responsive" style="margin-top: 75px;">
              <table class="table">
                <thead>
                  <tr>
            
                    <th>id </th>
                    <th>Amenities</th>
                    <th> Delete </th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($amenities as $amenity )
                    <tr>

                      <td>{{ $amenity->id }} </td>
                      
                        <td>{{ $amenity->name }}</td>
                      
                      

                      <td> 
              
                          <button style="background: transparent;  border:none; outline:none;"><a style="text-decoration: none; color:#FF545E; " href="{{ url('delete_amenity',$amenity->id) }}"><i class="bi bi-trash3"></i></a></button> 

                      </td>
                    </tr>  
                    @endforeach
                  
                </tbody>
              </table>
              <div class="dropdown-divider"></div>
            </div>    








    <!-- container-scroller -->






    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->

    <script>
      var logoutTimer;

        function startLogoutTimer() {
          var timeoutDuration = 30 * 60 * 1000; // Set timeout

          logoutTimer = setTimeout(function() {
            // Perform AJAX logout request or redirect to the logout endpoint
            window.location.href = '/admlogout';
          }, timeoutDuration);
        }

        function resetLogoutTimer() {
          clearTimeout(logoutTimer);
          startLogoutTimer();
        }

        // Calls the resetLogoutTimer() function whenever the user performs any activity, such as clicking a button or making an AJAX request.
        document.addEventListener('click', function() {
          if (document.visibilityState === "visible") {
            resetLogoutTimer();
          }
        });

        // Starts the logout timer initially when the page loads
        if (document.visibilityState === "visible") {
          startLogoutTimer();
        }

        // Listens for changes in the visibility state
        document.addEventListener("visibilitychange", function() {
          if (document.visibilityState === "visible") {
            // Page is now active
            startLogoutTimer();
          } else {
            // Page is not active
            clearTimeout(logoutTimer);
          }
        });

  </script>



    <script src="{{ asset('admin/assets/logout.js') }}"></script>

  </body>
</html>
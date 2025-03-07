<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Venpic Agencies</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="/admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="/admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/admin/assets/images/favicon.png" />
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
                    @php
                        $messageType = session()->get('message_type', 'info'); // Default to 'info' if no type is set
                    @endphp

                    @if ($messageType === 'success')
                        <div class="alert alert-success">
                        @elseif ($messageType === 'warning')
                            <div class="alert alert-warning">
                            @elseif ($messageType === 'error')
                                <div class="alert alert-danger">
                                @else
                                    <div class="alert alert-info"> {{-- A default alert type in case no message_type is set --}}
                    @endif

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{ session()->get('message') }}

            </div>
            @endif


            <div class="table-responsive" style="margin-top: 75px;">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Dob</th>
                            <th>ID Number</th>
                            <th>Phone</th>
                            <th>Move in date</th>
                            <th>Rental Duration</th>
                            <th>Lease Expiry</th>
                            <th>Status</th>
                            <th>Location</th>
                            <th>Category</th>
                            <th>Landlord</th>
                            <th>Landlord Phone</th>

                        </tr>
                    </thead>
                    @foreach ($tenants as $tenant)
                        <tbody>
                            <tr>
                                <td>
                                    <span>{{ $tenant->name }}</span>
                                </td>

                                <td>
                                    <span>{{ $tenant->email }}</span>
                                </td>

                                <td>
                                    <span>{{ $tenant->dob }}</span>
                                </td>

                                <td>
                                    <span>{{ $tenant->id_number }}</span>
                                </td>

                                <td>
                                    <span>{{ $tenant->phone }}</span>
                                </td>

                                <td>
                                    <span>{{ $tenant->move_in_date }}</span>
                                </td>

                                <td>
                                    <span>{{ $tenant->rental_duration }}</span>
                                </td>

                                <td>
                                    <span>{{ $tenant->lease_expiry }}</span>
                                </td>
                                <td>
                                    <span>{{ $tenant->tenancy_status }}</span>
                                </td>
                                <td>
                                    <span>{{ $tenant->home->region }}, {{ $tenant->home->county }}</span>
                                </td>
                                <td>
                                    <span>{{ $tenant->home->category_name }}</span>
                                </td>
                                <td>
                                    <span>{{ $tenant->home->landlord_name }}</span>
                                </td>

                                <td>
                                    <span>{{ $tenant->home->phone_number }}</span>
                                </td>

                            </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="dropdown-divider"></div>


                <!-- container-scroller -->
            </div>
        </div>
    </div>

    <!-- plugins:js -->
    <script src="/admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="/admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="/admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="/admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/admin/assets/js/off-canvas.js"></script>
    <script src="/admin/assets/js/hoverable-collapse.js"></script>
    <script src="/admin/assets/js/misc.js"></script>
    <script src="/admin/assets/js/settings.js"></script>
    <script src="/admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="/admin/assets/js/dashboard.js"></script>
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



    <script src="{{ asset('/admin/assets/logout.js') }}"></script>

</body>

</html>

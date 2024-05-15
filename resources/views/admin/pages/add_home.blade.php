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

                <div class="row ">
                    <div class="col-12 grid-margin">
                        <div class="card" style="width: 100%; max-width:70%; transform:translateX(200px);">
                            <div class="card-body">
                                <h4 class="card-title" style="text-align: center;">Add Home</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>

                                                <th> </th>
                                                <th> </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action="{{ url('add_home') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <tr>

                                                    <td style="font-weight:700"><label for="house_name"></label> House
                                                        Name :</td>
                                                    <td><input type="text" name="house_name" id="house_name" required
                                                            placeholder="Write house name..."
                                                            style="background: transparent; border:none; outline:none; color:#fff; padding:8px;">
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td style="font-weight:700"><label for="category_name"></label>
                                                        Category :</td>
                                                    <td>
                                                        <select name="category_name"
                                                            style="background-color:transparent; border:none; outline:none; color:#fff; padding:16px;"
                                                            required>
                                                            <option value="" selected=""> Select Category
                                                            </option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}"
                                                                    style="color: black;">
                                                                    {{ $category->category_name }}</option>
                                                            @endforeach
                                                        </select>

                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td style="font-weight:700"><label for="amenities"></label>
                                                        Amenities :</td>

                                                    <td>
                                                        <div class="list-wrapper">
                                                            <ul
                                                                class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
                                                                <li>
                                                                    <div class="form-check form-check-primary">

                                                                        @foreach ($amenities as $Amenity)
                                                                            <label class="form-check-label"
                                                                                for="amenities"> </label>
                                                                            <input type="checkbox" name="amenities[]"
                                                                                multiple value="{{ $Amenity->id }}">
                                                                            {{ $Amenity->name }}
                                                                        @endforeach
                                                                    </div>

                                                                </li>

                                                            </ul>
                                                        </div>

                                                    </td>
                                                </tr>

                                                <tr>

                                                    <td style="font-weight:700"><label for="thumbnail"></label>
                                                        Thumbnail :</td>
                                                    <td><input style="padding: 8px" type="file" name="thumbnail"
                                                            required=""></td>

                                                </tr>
                                                <tr>

                                                    <td style="font-weight:700"><label for="images"></label> Images
                                                        :</td>
                                                    <td><input type="file" name="images[]" id="images" multiple
                                                            required style="padding:8px;">
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td style="font-weight:700"><label for="video"></label> Video :
                                                    </td>
                                                    <td><input type="file" name="video" accept="video/*" required
                                                            style="padding:8px;">
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td style="font-weight:700"><label for="short_desc"></label> Short
                                                        Description :</td>
                                                    <td>
                                                        <div class="home-textarea">
                                                            <textarea name="short_desc" id="short_desc" required placeholder="Short description..."
                                                                style="background: transparent; border:none; outline:none; color:#fff; padding:8px;">
                                                        </textarea>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td style="font-weight:700"><label
                                                            for="description"></label>Detailed Description :</td>
                                                    <td>
                                                        <div class="home-textarea">
                                                            <textarea name="description" id="description" required placeholder="Detailed description..."
                                                                style="background: transparent; border:none; outline:none; color:#fff; padding:8px;">
                                                        </textarea>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td style="font-weight:700"><label for="inventory"></label>
                                                        Available Rent Units :</td>
                                                    <td><input type="number" name="inventory" id="inventory"
                                                            required placeholder="Rental units number..."
                                                            style="background: transparent; border:none; outline:none; color:#fff; padding:8px;">
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td style="font-weight:700"><label for="rent_price"></label> Price
                                                        :</td>
                                                    <td><input type="number" name="rent_price" id="rent_price"
                                                            required placeholder="Rent price..."
                                                            style="background: transparent; border:none; outline:none; color:#fff; padding:8px;">
                                                    </td>

                                                </tr>
                                                {{-- <tr>

                                                    <td style="font-weight:700"><label for="discount"></label>
                                                        Discounted Price :</td>
                                                    <td><input type="number" name="discount" id="discount"
                                                            placeholder="Discount offered ..."
                                                            style="background: transparent; border:none; outline:none; color:#fff; padding:8px;">
                                                    </td>

                                                </tr> --}}
                                                <tr>
                                                    <td style="font-weight:700"><label for="county"></label> County
                                                        :</td>
                                                    <td>
                                                        <select name="county"
                                                            style="background-color:transparent; border:none; outline:none; color:#fff; padding:16px;"
                                                            required>
                                                            <option value="" selected=""> Select County
                                                            </option>
                                                            @foreach ($counties as $county)
                                                                <option value="{{ $county->id }}"
                                                                    style="color: black;"> {{ $county->name }}</option>
                                                            @endforeach
                                                        </select>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:700"><label for="region"></label> Region
                                                        :</td>
                                                    <td>
                                                        <select name="region"
                                                            style="background-color:transparent; border:none; outline:none; color:#fff; padding:16px;"
                                                            required>
                                                            <option value="" selected=""> Select Region
                                                            </option>
                                                            @foreach ($regions as $region)
                                                                <option value="{{ $region->id }}"
                                                                    style="color: black;"> {{ $region->name }}</option>
                                                            @endforeach
                                                        </select>

                                                    </td>
                                                </tr>

                                                <tr>

                                                    <td style="font-weight:700"><label for="landlord_name"></label>
                                                        Landlord :</td>
                                                    <td><input type="text" name="landlord_name" id="landlord_name"
                                                            required placeholder="Landlord's name..."
                                                            style="background: transparent; border:none; outline:none; color:#fff; padding:8px;">
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td style="font-weight:700"><label for="phone_number"></label>
                                                        Telephone Number :</td>
                                                    <td><input type="number" name="phone_number" id="phone_number"
                                                            required placeholder="Landlord's Number..."
                                                            style="background: transparent; border:none; outline:none; color:#fff; padding:8px;">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td> <button type="submit" class="badge badge-outline-success"
                                                            style="background: transparent;"> Add Home</button></td>
                                                </tr>
                                            </form>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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

                <script>
                    const textarea = document.querySelector("textarea");
                    textarea.addEventListener("keyup", e => {
                        textarea.style.height = "63px";
                        let scHeight = e.target.scrollHeight;
                        textarea.style.height = '${scHeight}px';
                    });
                </script>



                <script src="{{ asset('admin/assets/logout.js') }}"></script>

</body>

</html>

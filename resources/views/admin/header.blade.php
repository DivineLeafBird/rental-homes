<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="/admin/assets/images/logo-mini.svg"
                    alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            {{-- <ul class="navbar-nav w-100">
                <li class="nav-item w-100">
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                        <input type="text" class="form-control" placeholder="Search home" style="color: #fff">
                    </form>
                </li>
            </ul> --}}
            <ul class="navbar-nav navbar-nav-right">

                <li class="nav-item dropdown d-none d-lg-block">
                    <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown"
                        data-toggle="dropdown" aria-expanded="false" href="#">+ Add New County</a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                        aria-labelledby="createbuttonDropdown">
                        <form action="{{ url('/add_county') }}" method="POST">
                            @csrf
                            <div class="preview-item-content">
                                <label style="padding: 8px;" for="county">County:</label>
                                <input
                                    style="background: transparent; border:none; outline:none; color:#fff; padding:8px;"
                                    type="text" name="county_name" id="county_name" required>
                            </div>
                            <div class="dropdown-divider"></div>

                            <div class="preview-item-content">
                                <label style="padding: 8px;" for="Latitude">Latitude:</label>
                                <input
                                    style="background: transparent; border:none; outline:none; color:#fff; padding:8px;"
                                    type="text" name="county_latitude" id="county_latitude" required>
                            </div>

                            <div class="dropdown-divider"></div>

                            <div class="preview-item-content">
                                <label style="padding: 8px;" for="Longitude">Longitude:</label>
                                <input
                                    style="background: transparent; border:none; outline:none; color:#fff; padding:8px;"
                                    type="text" name="county_longitude" id="county_longitude" required>
                            </div>

                            <div class="dropdown-divider"></div>

                            <button
                                style="background: transparent; border:none; outline:none; color:rgb(38, 235, 38); transform:translateX(40px);"
                                type="submit" class="p-3 mb-0 text-center"> Add County</button>
                        </form>
                    </div>
                </li>

                {{--       region       --}}

                <li class="nav-item dropdown d-none d-lg-block">
                    <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown"
                        data-toggle="dropdown" aria-expanded="false" href="#">+ Add New Region</a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                        aria-labelledby="createbuttonDropdown">
                        <form action="{{ url('/add_region') }}" method="POST">
                            @csrf
                            <div class="preview-item-content">
                                <label style="padding: 8px;" for="county">County:</label>
                                <select name="county"
                                    style="background: transparent; border:none; outline:none; color:#fff; padding:16px;"
                                    required>
                                    @foreach ($counties as $county)
                                        <option value="{{ $county->id }}" style="color: black;"> {{ $county->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="dropdown-divider"></div>

                            <div class="preview-item-content">
                                <label style="padding: 8px;" for="region">Region:</label>
                                <input
                                    style="background: transparent; border:none; outline:none; color:#fff; padding:8px;"
                                    type="text" name="region_name" id="region_name" required>
                            </div>
                            <div class="dropdown-divider"></div>

                            <div class="preview-item-content">
                                <label style="padding: 8px;" for="Latitude">Latitude:</label>
                                <input
                                    style="background: transparent; border:none; outline:none; color:#fff; padding:8px;"
                                    type="text" name="region_latitude" id="region_latitude" required>
                            </div>

                            <div class="dropdown-divider"></div>

                            <div class="preview-item-content">
                                <label style="padding: 8px;" for="Longitude">Longitude:</label>
                                <input
                                    style="background: transparent; border:none; outline:none; color:#fff; padding:8px;"
                                    type="text" name="region_longitude" id="region_longitude" required>
                            </div>

                            <div class="dropdown-divider"></div>

                            <button type="submit"
                                style="background: transparent; border:none; outline:none; color:rgb(38, 235, 38); transform:translateX(40px);"
                                class="p-3 mb-0 text-center"> Add Region</button>
                        </form>
                    </div>
                </li>




                <li class="nav-item dropdown">
                    <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                        <div class="navbar-profile">
                            <img class="img-xs rounded-circle" src="/admin/assets/images/faces/face15.jpg"
                                alt="">
                            <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ auth()->user()->name }}</p>
                            <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                        aria-labelledby="profileDropdown">
                        <h6 class="p-3 mb-0">Profile</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-settings text-success"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1">Settings</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item" href="{{ url('admlogout') }}">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-logout text-danger"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1">Log out</p>
                            </div>
                        </a>

                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
                <span class="mdi mdi-format-line-spacing"></span>
            </button>
        </div>
    </nav>

<header>
    <div class="top-nav">

        <nav>
            <!-- mobile -->

            <div class="hamburger">
                <span style="font-size:30px;cursor:pointer" onclick="openNav()"> <i class="fa fa-bars"></i></span>
            </div>

            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <form action="#"style="margin-top: 40px;"> <input type="text" placeholder="Search..."><button
                        style="background-color:transparent; border: none; " type="submit"><i
                            class="bi bi-search sidenav-icon"></i></button> </form>

                @if (Route::has('login'))
                    @auth
                        <div class="mobile-prof">
                            <span><img src="images/pers1.png" alt=""><br> {{ auth()->user()->name }}</span>

                        </div>

                        <div class="total-coins">
                            <span>500 Coins</span>
                        </div>

                        <a href=""><span><i class="bi bi-bell-fill profile-icons"></i> Notifications</span></a>
                        <a href=""><span><i class="bi bi-heart profile-icons"></i> Favorites</span></a>
                        <a href=""><span><i class="bi bi-list-ul profile-icons"></i> Appointments</span></a>
                        <a href=""><span><i class="bi bi-person-badge-fill profile-icons"></i> Membership</span></a>
                        <a href=""><span><i class="bi bi-chat-square-text-fill profile-icons"></i>
                                Messages</span></a>
                        <a href=""><span><i class="bi bi-graph-up profile-icons"></i> Activity</span></a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Sign up</a>
                    @endauth
                @endif
                <hr>
                <a href="/">Home</a>
                <a href="{{ url('category') }}">Category</a>
                <a href="{{ url('blog') }}">Blog</a>
                <a href="{{ url('community') }}">Community</a>
                <a href="{{ url('about') }}">About</a>
                <a href="{{ url('contact') }}">Contact</a>

                <hr>

                @if (Route::has('login'))
                    @auth

                        <a href=""><span><i class="bi bi-people-fill profile-icons"></i> Referrals</span></a>
                        <a href=""><span><i class="bi bi-gear-fill profile-icons"></i> Settings</span></a>
                        <a href=""><span><i class="bi bi-info-circle profile-icons"></i> Get Help</span></a>
                        <hr>
                        <a href="{{ url('/logout') }}"><span><i class="bi bi-box-arrow-in-right profile-icons"></i>
                                Logout</span></a>

                    @endauth
                @endif

            </div>



            <!-- desktop -->
            <ul>
                <li class="logo"><a href="/"><img src="/images/logo.svg" alt="logo"></a></li>
                <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
                <li class="{{ Request::is('category') ? 'active' : '' }}"><a href="{{ url('category') }}">Category</a>
                </li>
                <li class="{{ Request::is('blog') ? 'active' : '' }}"><a href="{{ url('blog') }}">Blog</a></li>
                <li class="{{ Request::is('community') ? 'active' : '' }}"><a
                        href="{{ url('community') }}">Community</a></li>
                <li class="{{ Request::is('about') ? 'active' : '' }}"><a href="{{ url('about') }}">About</a></li>
                <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{ url('contact') }}">Contact</a>
                </li>
            </ul>

            <div class="nav-right">
                <div class="search-container">
                    <form action="{{ route('search') }}" method="GET">
                        <input type="text" placeholder="Search..." name="query">
                        <button type="submit"><i class="bi bi-search btn icons"></i></button>
                    </form>
                </div>
                @if (Route::has('login'))
                    @auth

                        <div class="notification">
                            <a href="{{ route('received_messages') }}"><span class="btn icons"> <i
                                        class="bi bi-bell-fill"></i></span></a>
                            {{-- <span id="noti-num"> <i class="bi bi-1-circle-fill"></i></span> --}}

                            {{-- <div id="notificationDropdown" class="dropdown-content-noti">
                                <a href="#"> New Arrivals</a>
                                <hr>
                                <a href="#">Coupons</a>
                            </div> --}}

                        </div>

                        <div class="total-coins">
                            <span>500 Coins</span>
                        </div>


                        <div class="profile">
                            <img onclick="profiledrop()" src="/images/pers1.png" alt="">

                            <div id="profileDropdown" class="dropdown-content">
                                <div class="profile-container">
                                    <div class="profile-left">
                                        <div class="rewards">
                                            <h5>Coins</h5>
                                            <p><i class="bi bi-cash-coin profile-icons "> 500 coins</i> </p>



                                        </div>

                                        <div class="socials">
                                            <h5>Connect With Us</h5>

                                            <a href="{{ url('blog') }}"><span><i
                                                        class="bi bi-pie-chart-fill profile-icons"></i>
                                                    Blog</span></a>
                                            <a href=""><span><i class="bi bi-facebook profile-icons"></i>
                                                    Facebook</span></a>
                                            <a href=""><span><i class="bi bi-instagram profile-icons"></i>
                                                    Instagram</span></a>
                                            <a href=""> <span><i class="bi bi-twitter profile-icons"></i>
                                                    Twitter</span></a>

                                        </div>

                                    </div>
                                    <div class="profile-right">
                                        <h5>Your Account</h5>
                                        <h6>{{ auth()->user()->name }}</h6>

                                        <a href=""><span><i class="bi bi-graph-up profile-icons"></i>
                                                Activity</span></a>
                                        <a href="{{ route('application_status') }}"><span><i
                                                    class="bi bi-heart profile-icons"></i>
                                                Applications</span></a>
                                        <a href="{{ route('appointment_status') }}"><span><i
                                                    class="bi bi-list-ul profile-icons"></i>
                                                Appointments</span></a>
                                        <a href="{{ route('membership') }}"><span><i
                                                    class="bi bi-person-badge-fill profile-icons"></i>
                                                Membership</span></a>
                                        <a href="{{ route('received_messages') }}"><span><i
                                                    class="bi bi-chat-square-text-fill profile-icons"></i>
                                                Messages</span></a>
                                        <a href=""><span><i class="bi bi-people-fill profile-icons"></i>
                                                Referrals</span></a>
                                        <a href=""><span><i class="bi bi-gear-fill profile-icons"></i>
                                                Settings</span></a>
                                        <a href="{{ url('contact') }}"><span><i
                                                    class="bi bi-info-circle profile-icons"></i> Get
                                                Help</span></a>


                                    </div>
                                </div>

                                <hr>

                                <div class="profile-logout">
                                    <a href="{{ url('/logout') }}"><i class="bi bi-box-arrow-in-right"
                                            style="color:#2c64f5; padding-right: 8px;"></i> Logout</a>
                                </div>

                            </div>

                        </div>
                    @else
                        <a class="btn login"href="{{ route('login') }}">Login</a>
                        <a class="btn register" href="{{ route('register') }}">Register</a>

                    @endauth
                @endif
            </div>








        </nav>
        <!-- End of nav-menu -->

    </div>
</header>

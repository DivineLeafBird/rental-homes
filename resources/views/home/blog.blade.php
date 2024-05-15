<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venpic Agencies</title>
    <link rel="stylesheet" href="home/styles.css">
    <link rel="stylesheet" href="home/blog.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,
    wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto+Condensed:ital,wght@0,300;0,400;
    0,700;1,300;1,400;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
</head>
<body>
    <!-- Header start -->
        @include('home.header')
    <!-- End of Header Section -->

    {{-- Blog Section --}}

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <article class="post-grid mb-5 ">
                                <a class="post-thumb mb-4 d-block" href="{{ url('blogstory') }}">
                                    <img src="images/news/news-1.jpg" alt="" class="img-fluid w-100">
                                </a>

                                <div class="post-content-grid">
                                    <div class="label-date">
                                        <span class="day">15</span>
                                        <span class="month text-uppercase">apr</span>
                                    </div>
                                    <span
                                        class="cat-name text-color font-extra font-sm text-uppercase letter-spacing">Travel</span>
                                    <h5 class="post-title mt-1"><a href="{{ url('blogstory') }}">The best soft chocolate chip
                                            cookies</a></h5>
                                    <p>Lorem ipsum dolor sitamet consectetu ocilng elit. Donec eros aseb dui, suscipit
                                        ex uti commodo dignis justo acas turpis egestas. Nullam et cursus</p>
                                </div>
                            </article>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <article class="post-grid mb-5">
                                <a class="post-thumb mb-4 d-block" href="{{ url('blogstory') }}">
                                    <img src="images/news/news-2.jpg" alt="" class="img-fluid w-100">
                                </a>
                                <div class="post-content-grid">
                                    <div class="label-date">
                                        <span class="day">02</span>
                                        <span class="month text-uppercase">Jan</span>
                                    </div>
                                    <span
                                        class="cat-name text-color font-sm font-extra text-uppercase letter-spacing">lifestyle</span>
                                    <h5 class="post-title mt-1"><a href="{{ url('blogstory') }}">A Simple Way to Feel Like
                                            Home</a></h5>
                                    <p>Lorem ipsum dolor sitamet consectetu ocilng elit. Donec eros aseb dui, suscipit
                                        ex uti commodo dignis justo acas turpis egestas. Nullam et cursus</p>

                                </div>

                            </article>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <article class="post-grid mb-5">
                                <a class="post-thumb mb-4 d-block" href="{{ url('blogstory') }}">
                                    <img src="images/news/news-3.jpg" alt="" class="img-fluid w-100">
                                </a>
                                <div class="post-content-grid">
                                    <div class="label-date">
                                        <span class="day">20</span>
                                        <span class="month text-uppercase">sep</span>
                                    </div>
                                    <span
                                        class=" cat-name text-color font-sm font-extra text-uppercase letter-spacing">weekends</span>
                                    <h5 class="post-title mt-1"><a href="{{ url('blogstory') }}">5 tips to plan your
                                            weekends</a></h5>
                                    <p>Lorem ipsum dolor sitamet consectetu ocilng elit. Donec eros aseb dui, suscipit
                                        ex uti commodo dignis justo acas turpis egestas. Nullam et cursus</p>
                                </div>

                            </article>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <article class="post-grid mb-5">
                                <a class="post-thumb mb-4 d-block" href="{{ url('blogstory') }}">
                                    <img src="images/news/news-4.jpg" alt="" class="img-fluid w-100">
                                </a>
                                <div class="post-content-grid">
                                    <div class="label-date">
                                        <span class="day">05</span>
                                        <span class="month text-uppercase">may</span>
                                    </div>
                                    <span
                                        class="cat-name text-color font-sm font-extra text-uppercase letter-spacing">Lifestyle</span>
                                    <h5 class="post-title mt-1"><a href="{{ url('blogstory') }}">The best to-do list to boost
                                            your productivity</a></h5>
                                    <p>Lorem ipsum dolor sitamet consectetu ocilng elit. Donec eros aseb dui, suscipit
                                        ex uti commodo dignis justo acas turpis egestas. Nullam et cursus</p>
                                </div>

                            </article>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <article class="post-grid mb-5">
                                <a class="post-thumb mb-4 d-block" href="{{ url('blogstory') }}">
                                    <img src="images/news/news-5.jpg" alt="" class="img-fluid w-100">
                                </a>
                                <div class="post-content-grid">
                                    <div class="label-date">
                                        <span class="day">30</span>
                                        <span class="month text-uppercase">mar</span>
                                    </div>
                                    <span
                                        class="cat-name text-color font-sm font-extra text-uppercase letter-spacing">Travel</span>
                                    <h5 class="post-title mt-1"><a href="{{ url('blogstory') }}">What kind of travel you
                                            are?</a></h5>
                                    <p>Lorem ipsum dolor sitamet consectetu ocilng elit. Donec eros aseb dui, suscipit
                                        ex uti commodo dignis justo acas turpis egestas. Nullam et cursus</p>
                                </div>

                            </article>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <article class="post-grid mb-5">
                                <a class="post-thumb mb-4 d-block" href="{{ url('blogstory') }}">
                                    <img src="images/news/news-6.jpg" alt="" class="img-fluid w-100">
                                </a>

                                <div class="post-content-grid">
                                    <div class="label-date">
                                        <span class="day">24</span>
                                        <span class="month text-uppercase">jun</span>
                                    </div>
                                    <span
                                        class="cat-name text-color font-sm font-extra text-uppercase letter-spacing">Explore</span>
                                    <h5 class="post-title mt-1"><a href="{{ url('blogstory') }}">Explore the whole world </a>
                                    </h5>
                                    <p>Lorem ipsum dolor sitamet consectetu ocilng elit. Donec eros aseb dui, suscipit
                                        ex uti commodo dignis justo acas turpis egestas. Nullam et cursus</p>

                                </div>

                            </article>
                        </div>
                    </div>
                </div>

                {{-- <div class="m-auto">
                    <div class="pagination mt-5 pt-4">
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="#" class="active">1</a></li>
                            <li class="list-inline-item"><a href="#">2</a></li>
                            <li class="list-inline-item"><a href="#">3</a></li>
                            <li class="list-inline-item"><a href="#">4</a></li>
                            <li class="list-inline-item"><a href="#">5</a></li>
                            <li class="list-inline-item"><a href="#">>></a></li>
                                      
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>










        <hr style="opacity:0.1;">

    <!-- Footer start -->

        @include('home.footer')

    <!-- Footer End -->
    <script>
        var logoutTimer;

          function startLogoutTimer() {
            var timeoutDuration = 30 * 60 * 1000; // Set timeout

            logoutTimer = setTimeout(function() {
              // Perform AJAX logout request or redirect to the logout endpoint
              window.location.href = '/logout';
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

    <script src="home/main.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html> 
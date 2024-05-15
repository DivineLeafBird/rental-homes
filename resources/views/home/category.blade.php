<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venpic Agencies</title>
    <link rel="stylesheet" href="/home/styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,
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

    @if (session()->has('message'))
        <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            {{ session()->get('message') }}

        </div>
    @endif



    <section class="category-search">

        <div class="container-search">
            <form action="{{ route('search') }}" class="search-bar" method="GET" onsubmit="showSearchResults(event)">
                <input type="text" placeholder="Search home or a place" name="query">
                <button type="submit" id="searchSubmit"><i class="bi bi-search "></i></button>
            </form>

        </div>

        @php
            $categories = ['single-room', 'bed-sitter', '1-bedroom', '2-bedroom', '3-bedroom', '4-bedroom'];

            $currentCategory = request()->segment(2); // Extract the category from the URL

            function isActiveCategory($category)
            {
                return $category === request()->segment(2);
            }
        @endphp

        <a style="text-decoration: none" href="{{ url('category') }}">
            <div class="category-options">
                <button class="category-opts-btn {{ empty($currentCategory) ? ' active' : '' }}">
                    All
                </button>
        </a>
        @foreach ($categories as $category)
            <a style="text-decoration: none" href="{{ route('filter', ['category' => $category]) }}">
                <button class="category-opts-btn{{ isActiveCategory($category) ? ' active' : '' }}">
                    {{ ucfirst(str_replace('-', ' ', $category)) }}
                </button>
            </a>
        @endforeach

        </div>
        <div class="filter-container">
            <div class="search-info">
                {{-- <p id="searchfor" style="display: none;">Search Resuts For: <span id="searchTerm"></span></p> --}}

            </div>
            {{-- <div class="filter">

                <form action="">
                    <i class="bi bi-funnel-fill filter-icon"></i>
                    <label for="sort">Sort By:</label>
                    <select id="sort" name="sort">
                        <option value="Price">Price</option>
                        <option value="Distance">Distance</option>
                        <option value="Security">Security</option>
                        <option value="Luxury">Luxury</option>
                    </select>

                </form>
                <div>
                    <span onclick="filterhide()" id="filter-1"><button><i
                                class="bi bi-arrow-down-square-fill filter-icon"></i></button> Lowest</span>
                    <span onclick="filterhide1()" id="filter-2" style="display:none"> <button> <i
                                class="bi bi-arrow-up-square-fill filter-icon"></i></button> Highest</span>

                </div>
            </div> --}}
        </div>

    </section>

    {{-- search results --}}
    <section class="results">
        @php
            $homesWithInventory = $homes->filter(function ($home) {
                return $home->inventory > 0;
            });
        @endphp
        <p style="font-size: 13px"> Showing items: {{ $homesWithInventory->count() }}</p>

        <div class="results-container">

            @foreach ($homes as $home)
                @if ($home->inventory > 0)
                    <div class="result-card">
                        <a style="text-decoration: none" href="{{ route('homeDetails', $home) }}">
                            <img src="/thumbnails/{{ $home->thumbnail }}" alt=""> </a>
                        <div>
                            <p>{{ $home->short_desc }}</p>
                        </div>
                        <div>
                            <span style="font-size: 16px;color:rgba(92, 86, 86, 0.815);"><i
                                    class="bi bi-geo-alt icons"></i>
                                {{ $home->region }},{{ $home->county }}</span>
                        </div>
                        <div>
                            <span class="bi bi-star-fill filter-icons icons "></span>
                            <span class="bi bi-star-fill filter-icons icons "></span>
                            <span class="bi bi-star-fill filter-icons icons"></span>
                            <span class="bi bi-star-half filter-icons icons"></span>
                            <span class="bi bi-star     filter-icons  icons"></span>
                            <span style="font-size: 12px;"> 200 Reviews</span>
                        </div>
                        <div>
                            <span style="font-size: 16px;color:#2c64f5;">{{ $home->category_name }}</span>
                        </div>
                        <div>
                            <span style="font-size: 16px;color:#2c64f5;">Availability {{ $home->inventory }} </span>
                        </div>
                        <p>
                            @if ($home->discount != null)
                                <span style="color:rgb(253, 29, 29); text-decoration:line-through;"><strong>KES
                                        {{ $home->discount }}</strong></span>
                            @endif

                            <span style="color:green;"><strong>KES {{ $home->rent_price }}</strong></span>
                            <span style="color:#2c64f5;"><strong>/month</strong></span>
                        </p>

                    </div>
                @endif
            @endforeach


        </div>

        {{-- <div class="category-pagination">
            <button id="active">1</button>
            <button>2</button>
            <button>3</button>
            <button>4</button>
            <button>5</button>
            <button>6</button>
            <button>7</button>
            <button>8</button>
            <button>9</button>
            <button>>></button>

        </div> --}}


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

    {{-- <script>
        function showSearchResults(event) {
            event.preventDefault(); // Prevent the form from submitting normally

            const query = document.querySelector('input[name="query"]').value.trim();
            const searchFor = document.getElementById('searchfor');
            const searchTerm = document.getElementById('searchTerm');

            if (query) {
                searchFor.style.display = 'block'; // Show the search results paragraph
                searchTerm.textContent = '"' + query + '"'; // Show the search term

                // Here, you can make an AJAX call to fetch and display the search results dynamically
                // Or perform any other logic to display the results
            } else {
                searchFor.style.display = 'none'; // Hide the search results if the search query is empty
            }
        }
    </script> --}}


    <script src="/home/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>

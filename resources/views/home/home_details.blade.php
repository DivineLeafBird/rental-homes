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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>



</head>

<body>
    <!-- Header start -->
    @include('home.header')
    <!-- End of Header Section -->
    <section>
        <div class="slider-container">

            <div class="slider">
                @foreach ($images as $image)
                    <img src="/homeimages/{{ $image->original_name }}" alt="slider-image">
                @endforeach


                <div class="pagination">
                    <?php
                    foreach ($images as $index => $image) {
                        echo '<span class="dot"></span>';
                    }
                    ?>

                </div>
            </div>
        </div>


        <div class="home-details-container">
            <div class="details-desc">
                <span><strong>Description:</strong></span>
            </div>
            <div class="rating" style="padding-top: 9px">
                <span class="bi bi-star-fill icons"></span>
                <span class="bi bi-star-fill icons"></span>
                <span class="bi bi-star-fill icons"></span>
                <span class="bi bi-star-half icons"></span>
                <span class="bi bi-star      icons"></span>
                <span class="icons"><strong>(3.5)</strong></span>

                <div>
                    <p style="font-size: 12px; text-align: center;">(1247) reviews</p>
                </div>

            </div>

        </div>

        <div class="description-home">
            <p>{{ $data->description }}</p>
        </div>

        <div class="home-details-container">
            <div class="details-desc">
                <span><strong>Details:</strong></span>
            </div>

            <div class="details-desc" style="padding-right: 20%">
                <span><strong>Amenities</strong></span>
            </div>

        </div>

        <div class="details-contain">
            <div class="details-list">
                <ul>
                    <li><strong>Location: </strong><span style="padding-left: 20px">{{ $data->region }},
                            {{ $data->county }}</span>
                    </li>
                    <li><strong>Category: </strong><span style="padding-left: 20px">{{ $data->category_name }}</span>
                    </li>
                    <li><strong>Distance: </strong><span style="padding-left: 20px">
                            {{ $data->distance_county_center }} km from town center</span></li>
                    <li><strong>Rent: </strong><span style="color: green; padding-left:52px;"><strong>KES
                                {{ $data->rent_price }}
                            </strong></span>/ <span style="color: blue">
                            month</span>
                    </li>
                </ul>
            </div>

            <div class="amenities-card">
                <div class="amenities-list">
                    <ul>

                        @foreach ($amenities as $amenity)
                            @if (array_key_exists($amenity->amenity_name, $amenityIcons))
                                <li>
                                    <i class="{{ $amenityIcons[$amenity->amenity_name] }} icons"
                                        style="font-size:24px"></i>
                            @endif
                            <span>{{ $amenity->amenity_name }}</span> </li>
                        @endforeach

                    </ul>
                </div>

                <div class="amen-image-container">
                    <img src="/thumbnails/{{ $data->thumbnail }}" alt="Your Image">
                </div>

            </div>
        </div>

        <div class="video-container">
            <h5>Virtual Tour</h5>

            <div class="video-frame">
                <video width="1300" height="500" controls>
                    <source src="/videos/{{ $data->video }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>

        </div>


        <div class="buttons-home-details">
            <button class="blue-btn" style="padding: 10px 20px;"><a
                    href="{{ route('application_form', ['form' => $data->id]) }}"> Rent</a></button>
            <button class="blue-btn" style="padding: 10px 20px;"><a
                    href="{{ route('schedule_home', ['schedule' => $data->id]) }}"> Schedule
                    tour</a></button>
            <button class="blue-btn" style="padding: 10px 20px;"><a href="{{ route('contact') }}"> Call
                    Agency</a></button>


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

    <script src="/home/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>

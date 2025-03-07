<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venpic Agencies</title>
    <link rel="stylesheet" href="home/styles.css">

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

    <section class="msg-sect">
        <div class="about-section">

            <div>
                <h1>Who We Are</h1>

                <p>Welcome to Venpic Agencies, where we redefine the rental housing experience. Our commitment is to
                    create a seamless, efficient, and satisfying journey for tenants.
                </p>

                <p>At Venpic, we are a dedicated team passionate about reshaping the rental housing market. Our core
                    values revolve around transparency, trust, and convenience. We believe in providing a harmonious
                    platform for tenants.</p>
                <p>We specialize in connecting tenants with their ideal homes while
                    showcasing properties effectively. Our platform offers an extensive range of rental options
                    and tools designed to simplify the entire rental process.</p>
                <p>Understanding the challenges faced by tenants, we've developed an intuitive
                    platform that offers advanced search filters, real-time property listings, and interactive features.
                    Our aim is to bridge the gap between these stakeholders, ensuring a seamless and efficient rental
                    experience for all.</p>
                <hr>
            </div>

            <div>
                <h1>How to Reach Us</h1>

                <p><a href="mailto:kassimyahy93@gmail.com"><strong>Email:</strong>kassimyahya93@gmail.com </a><br>
                    <strong>Address:</strong>Venpic Agencies Ltd, <br>
                    Po.Box 63-80108 <br>
                    Mombasa, Kenya. <br>

                    Opposite Uhuru na Kazi,<br>
                    along Digo-Road. <br>
                </p>

                <hr>
            </div>

            <div>
                <h1>MEET THE DEVELOPER</h1>

                <div class="card">
                    <div class="card-details">
                        <img class="card-img" src="images/qaseem.jpg" alt="">

                        <div class="place-rating">
                            <p style="padding-left: 25px; padding-top: 3px; "> <i class="bi bi-github icons"
                                    style="font-size: 16px"></i><a style="font-size: 12px; padding-left:5px"
                                    href="https://github.com/DivineLeafBird">github.com/DivineLeafBird</a>
                            </p>
                        </div>

                        <div class="place-rating">
                            <p style="padding-left: 25px; padding-top: 3px; "> <i class="bi bi-linkedin icons"
                                    style="font-size: 16px"></i><a style="font-size: 12px; padding-left:5px"
                                    href="https://www.linkedin.com/in/kassim-yahya-ali-b35274184/">Kassim-Yahya-Ali</a>
                            </p>
                        </div>

                        <div class="place-rating">
                            <p style="padding-left: 25px; padding-top: 3px; "> <i class="bi bi-envelope-at-fill icons"
                                    style="font-size: 16px"></i><a style="font-size: 12px; padding-left:5px"
                                    href="mailto:kassimyahya93@gmail.com">kassimyahya93@gmail.com</a>
                            </p>
                        </div>

                        <div class="place-rating">
                            <p style="padding-left: 25px; padding-top: 3px; "> <i class="bi bi-instagram icons"
                                    style="font-size: 16px"></i><a style="font-size: 12px; padding-left:5px"
                                    href="https://instagram.com/qaseemali.ke">qaseemali.ke</a>
                            </p>
                        </div>



                    </div>

                </div>

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

    <script src="home/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>

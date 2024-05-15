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

    <section>


        <div class="table-responsive" style="margin-top: 75px;">

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
        <h4 style="text-align: center; margin-bottom:20px;">Applications</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Home Name</th>
                    <th>Location</th>
                    {{-- <th>Thumnail</th> --}}
                    <th>Category</th>
                    <th>Rent Duration</th>
                    <th>Amount Payable</th>
                    <th>Status</th>
                    <th></th>

                </tr>
            </thead>
            @foreach ($applications as $application)
                {{-- @foreach ($homeRecords as $homeRecord) --}}
                <tbody>
                    <tr>
                        <td>
                            <span>{{ $application->home->house_name }}</span>
                        </td>
                        <td>{{ $application->home->region }},{{ $application->home->county }} </td>
                        {{-- <td>
                                    <img style="height: 3%; object-fit:cover; width:100%; border-radius:5px;"
                                        src="/thumbnails/{{ $homeRecord->thumbnail }}">
                                </td> --}}
                        <td>
                            <span>{{ $application->home->category_name }}</span>
                        </td>
                        <td>
                            <span>{{ $application->rental_duration }} </span>
                        </td>
                        <td>
                            <span> {{ $application->total_rent }} </span>
                        </td>
                        <td>
                            <span>{{ $application->application_status }} </span>
                        </td>

                        <td>

                            @if ($application)
                                @if ($application->application_status == 'Approved')
                                    <a href="{{ route('make_payment', ['pay' => $application->id]) }}">
                                        <button class="btn btn-success">Pay</button>
                                    </a>
                                @elseif ($application->application_status == 'Declined')
                                    <a href="{{ route('delete_application', ['delete' => $application->id]) }}">
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to Delete this Rent Application?')">Delete</button>
                                    </a>
                                @endif
                            @endif

                        </td>


                    </tr>
            @endforeach
            </tbody>
        </table>


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

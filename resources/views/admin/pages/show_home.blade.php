<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Venpic</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #111010;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        form input[type="text"],
        form input[type="number"],
        form select,
        form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            transform: translateX(-10px);
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form select {
            height: 40px;
        }

        form input[type="file"] {
            margin-top: 5px;
        }

        form textarea {
            resize: vertical;
            height: 150px;
        }

        form button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #5d3cf1;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        form button:last-child {
            margin-right: 0;
        }

        form button:hover {
            background-color: #462be6;
        }

        .list-wrapper {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .form-check-label {
            display: block;
        }

        .form-check-label input {
            margin-right: 5px;
        }

        .btn.btn-danger {
            color: #fff;
            /* Text color for the button */
            background-color: #d9534f;
            /* Background color for the button */
            border-color: #d9534f;
            /* Border color for the button */
            /* Padding inside the button */
            /* Font size of the button text */
            /* Border radius for rounded corners */
            cursor: pointer;
            /* Cursor style on hover */
        }

        .btn.btn-danger:hover {
            background-color: #c9302c;
            /* Background color on hover */
            border-color: #ac2925;
            /* Border color on hover */
        }

        textarea {
            width: 100%;
            /* Make it take up the entire width of the container */
            min-height: 40px;
            /* Set a minimum height */
            border: 1px solid #ccc;
            /* Add a border for visual distinction */
            resize: none;
            /* Prevent manual resizing by the user */
            overflow: hidden;
            /* Hide overflow content */
        }
    </style>


</head>

<body>

    <form action="{{ route('update_home', ['home' => $home->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="house_name">House Name :</label>
        <input type="text" name="house_name" id="house_name" required value="{{ $home->house_name }}">

        <label for="category_name">Category :</label>
        <select name="category_name" required>
            <option value="{{ $home->category_name }}" selected=""> {{ $home->category_name }}
            </option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->category_name }}</option>
            @endforeach
        </select>

        <label for="amenities">Amenities :</label>
        <div class="list-wrapper">
            <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
                <li>
                    <div class="form-check form-check-primary">
                        @foreach ($amenities as $Amenity)
                            <label class="form-check-label" for="amenities"> </label>
                            <input type="checkbox" name="amenities[]" value="{{ $Amenity->id }}"
                                {{ in_array($Amenity->id, $selectedAmenities) ? 'checked' : '' }}>
                            {{ $Amenity->name }}
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>



        <label for="thumbnail">Thumbnail :</label>

        <img style="height: 15%; object-fit:cover; width:100%; border-radius:5px;"
            src="/thumbnails/{{ $home->thumbnail }}" alt="">
        <input type="file" name="thumbnail" style="padding-bottom: 35px">

        <label for="images"> Images : </label>
        <input type="file" name="images[]" id="images" multiple style="padding-bottom: 35px">

        <label for="video">Video :</label>
        <video width="600" height="240" controls>
            <source src="/videos/{{ $home->video }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <br>
        <input type="file" name="video" accept="video/*" style="padding-bottom: 35px">

        <label for="short_desc">Short :</label>
        <div>
            <div>
                <textarea name="description" id="short_desc" required>{{ $home->short_desc }}</textarea>
            </div>
            <script>
                // Get the textarea element
                const textarea = document.getElementById('short_desc');

                // Add an event listener for input changes
                textarea.addEventListener('input', function() {
                    this.style.height = 'auto'; // Reset the height to auto
                    this.style.height = (this.scrollHeight + 2) + 'px'; // Set the new height based on the content
                });
            </script>


        </div>

        <label for="description">Detailed Description :</label>
        <div>
            <div>
                <textarea name="description" id="description" required>{{ $home->description }}</textarea>
            </div>

            <script>
                // Get the textarea element
                const textarea = document.getElementById('description');

                // Add an event listener for input changes
                textarea.addEventListener('input', function() {
                    this.style.height = 'auto'; // Reset the height to auto
                    this.style.height = (this.scrollHeight + 2) + 'px'; // Set the new height based on the content
                });
            </script>

        </div>

        <label for="inventory"> Available Rent Units :</label>
        <input type="number" name="inventory" id="inventory" required value="{{ $home->inventory }}">

        <label for="rent_price"> Price :</label>
        <input type="number" name="rent_price" id="rent_price" required value="{{ $home->rent_price }}">

        <label for="county">County :</label>
        <select name="county">
            <option value="{{ $home->county }}"> {{ $home->county }} </option>
            @foreach ($counties as $county)
                <option value="{{ $county->id }}"> {{ $county->name }}</option>
            @endforeach
        </select>

        <label for="region">Region :</label>
        <select name="region">
            <option value="{{ $home->region }}"> {{ $home->region }}</option>
            @foreach ($regions as $region)
                <option value="{{ $region->id }}" style="color: black;"> {{ $region->name }}</option>
            @endforeach
        </select>

        <label for="landlord_name">Landlord :</label>
        <input type="text" name="landlord_name" id="landlord_name" required value="{{ $home->landlord_name }}">

        <label for="phone_number">Telephone Number :</label>
        <input type="number" name="phone_number" id="phone_number" required value="{{ $home->phone_number }}">

        <button type="submit" class="badge badge-outline-success"
            onclick="return confirm('Are you sure you want to Update this Home?')">Update</button>
    </form>



</body>

</html>

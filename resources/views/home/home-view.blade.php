    <section class="home-view">
        @if ($randomHome)


            @if ($randomHome->inventory > 0)

                <div class="home-view-img-container">
                    <img id="img-home-1" src="/thumbnails/{{ $randomHome->thumbnail }}" alt="">
                    <div class="slider" style="height: 680px">
                        @foreach ($images as $image)
                            <img id="img-home-2" src="/homeimages/{{ $image->original_name }}" alt="slider-image">
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

                <div class="home-view-heading">
                    <h2>{{ $randomHome->house_name }}, {{ $randomHome->county }}</h2>
                    <div class="home-view-rating">
                        <span class="bi bi-star-fill icons"></span>
                        <span class="bi bi-star-fill icons"></span>
                        <span class="bi bi-star-fill icons"></span>
                        <span class="bi bi-star-half icons"></span>
                        <span class="bi bi-star      icons"></span>
                        <span class="icons"><strong>(3.5)</strong></span>

                        <div>
                            <p style="font-size: 12px;">(1247) reviews</p>
                        </div>
                    </div>
                </div>
                <p>{{ $randomHome->short_desc }}</p>
                <div class="home-view-amenities">
                    <h3>Amenities</h3>
                    <div class="price">
                        <p> <span style="color:green;"><strong>KES {{ $randomHome->rent_price }}</strong></span> <span
                                style="color:#2c64f5;"><strong>/month</strong></span></p>
                    </div>
                </div>
                <div class="amenties-container-button">
                    <div class="amenities-container">
                        <div class="amenities">

                            @foreach ($amenitiesrand as $amenity)
                                @if (array_key_exists($amenity->amenity_name, $amenityIcons))
                                    <div class="amenities-rating">

                                        <p> <i class="{{ $amenityIcons[$amenity->amenity_name] }} icons"
                                                style="font-size: 18px"></i>
                                            {{ $amenity->amenity_name }}</p>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                    <div class="buttons-container">
                        <button class="blue-btn"><a href="{{ route('homeDetails', $home = $randomHome->id) }}">Virtual
                                tour</a></button>
                        <button class="blue-btn"><a
                                href="{{ route('schedule_home', ['schedule' => $randomHome->id]) }}">
                                Schedule tour</a></button>
                        <button class="blue-btn"><a href="{{ route('contact') }}"><i
                                    class="bi bi-telephone-fill tele"></i>
                                Call
                                Agency</a></button>
                        <button class="blue-btn"><a
                                href="{{ route('application_form', ['form' => $randomHome->id]) }}">
                                Rent</a></button>

                    </div>


                </div>

            @endif
        @endif
    </section>

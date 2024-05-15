<section class="top-selection">
    <h5 class="h-top"><strong> Top Selection of the Week</strong></h5>

    <div class="card-container">
        @foreach ($homes as $home)
            @if ($home->inventory > 0)
                <div class="card">
                    <div class="card-details">
                        <a href="{{ route('homeDetails', $home) }}"><img class="card-img"
                                src="/thumbnails/{{ $home->thumbnail }}" alt=""></a>

                        <div class="place-rating">
                            <strong style="padding-left: 65px;"> {{ $home->house_name }}
                            </strong><span style="float:right;"></span>
                            {{-- <div class="rating">
                                <span class="bi bi-star-fill icons"></span>
                                <span class="bi bi-star-fill icons"></span>
                                <span class="bi bi-star-fill icons"></span>
                                <span class="bi bi-star-half icons"></span>
                                <span class="bi bi-star      icons"></span>
                                <span class="icons"><strong>(3.5)</strong></span>

                                <div>
                                    <p style="font-size: 12px; text-align: center;">(1247) reviews</p>
                                </div>
                            </div> --}}
                        </div>

                        <div class="place-rating">
                            <p style="padding-left: 25px; padding-top: 20px; "><i class="bi bi-geo-alt icons"></i> <i
                                    style="color: gray;">{{ $home->region }},{{ $home->county }}</i><br>
                                {{ $home->distance_county_center }} km from Town center</p><span
                                style="float:right;"></span>
                        </div>

                        <div class="place-rating">
                            <p style="padding-left: 25px; padding-top: 3px; "><i class="bi bi-house-door icons"></i>
                                {{ $home->category_name }}</p><span style="float:right;"></span>
                        </div>

                        @if (isset($amenities[$home->id]))
                            @foreach ($amenities[$home->id] as $amenity)
                                @if (array_key_exists($amenity->amenity_name, $amenityIcons))
                                    <div class="place-rating">
                                        <p style="padding-left: 25px; padding-top: 3px; "><i
                                                class="{{ $amenityIcons[$amenity->amenity_name] }} icons"></i>
                                            {{ $amenity->amenity_name }}</p><span style="float:right;"></span>
                                    </div>
                                @endif
                            @endforeach
                        @endif



                        <div class="price">
                            <p> <span style="color:green;"><strong>KES {{ $home->rent_price }}</strong></span> <span
                                    style="color:#2c64f5;"><strong>/month</strong></span></p>
                        </div>

                        <div class="btn">
                            <button class="card-btn"> <i class="bi bi-telephone-fill tele"></i> <a
                                    href="{{ route('contact') }}">Call
                                    Agency</a></button>
                            <button id="view-btn" class="card-btn" style="margin-left: 20px;"><a
                                    href="{{ route('homeDetails', $home) }}">
                                    View</a></button>
                        </div>

                    </div>
                </div>
            @endif
        @endforeach




        <div class="more">

            <a href="{{ url('category') }}"> <button class="light-btn">See More</button></a>
        </div>





    </div>

</section>

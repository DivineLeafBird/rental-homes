<div class="slider-container">

    <div class="slider">
        @foreach ($slideshows as $slider)
            <img src="/slider/{{ $slider->image }}" alt="slider-image">
        @endforeach


        <div class="pagination">
            <?php
            foreach ($slideshows as $index => $slideshows) {
                echo '<span class="dot"></span>';
            }
            ?>
        </div>
    </div>
</div>

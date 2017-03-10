<div class="slider-and-category-saidebar  menu-category">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <!-- SLIDER-AREA-START -->
                        <div class="slider-wrap">
                            <div class="owl_coverage">
                                <?php $slider = isset($slider) ? $slider: []; ?>
                                @foreach( $slider as $row )
                                <div class="item_owl_coverage">
                                    <a href="{{ $row['url'] }}"><img src="{{ $row['image'] }}" width="100%"></a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- SLIDER-AREA-END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
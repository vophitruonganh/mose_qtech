<div class="footer-top-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12 col-lg-8 col-md-8">
                <div class="about_us">
                    <img src="{{ $about['image'] }}" alt="GỬI MAIL NHẬN TIN" />
                    <h2><span>{{ $about['heading'] }}</span></h2>
                    <p>{{ $about['content'] }}</p>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12 col-lg-4 col-md-4 about_us">
                <h2><span>{{ $social['heading'] }}</span></h2>
                <div class="social-media">
                    <ul>
                        <?php unset($social['heading']); ?>
                        @foreach( $social as $row )
                        <li>
                            <a class="color-tooltip {{ $row['class1'] }}" target="_blank" href="{{ $row['url'] }}" data-toggle="tooltip" title="{{ $row['title'] }}">
                            <i class="fa {{ $row['class2'] }}"></i>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start Footer Section -->
<footer class="td_footer td_style_1 td_color_1 d-none">
    <div class="container">
        <div class="td_footer_row">
            <div class="td_footer_col">
                <div class="td_footer_widget">
                    <div class="td_footer_text_widget td_fs_18">
                        <img src="{{ asset($general_setting->footer_logo) }}" alt="Logo">
                        <p>{{ $footer->about_us }}</p>
                    </div>
                    <ul class="td_footer_address_widget td_medium td_mp_0">
                        <li><i class="fa-solid fa-phone-volume"></i><a
                                href="tel:{{ $footer->phone }}">{{ $footer->phone }}</a></li>
                        <li><i class="fa-solid fa-location-dot"></i>{{ $footer->address }}</li>
                    </ul>
                </div>
            </div>
            <div class="td_footer_col">
                <div class="td_footer_widget">
                    <h2 class="td_footer_widget_title td_fs_32 td_white_color td_medium td_mb_30">
                        {{ __('translate.Navigate') }}</h2>
                    <ul class="td_footer_widget_menu">
                        <li><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                        <li><a href="{{ route('about-us') }}">{{ __('translate.About') }}</a></li>
                        <li><a href="{{ route('contact-us') }}">{{ __('translate.Contact') }}</a></li>
                        <li><a href="{{ route('faq') }}">{{ __('translate.FAQ') }}</a></li>
                        <li><a href="{{ route('terms-conditions') }}">{{ __('translate.Terms & Conditions') }}</a>
                        </li>
                        <li><a href="{{ route('privacy-policy') }}">{{ __('translate.Privacy Policy') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="td_footer_col">
                <div class="td_footer_widget">
                    <h2 class="td_footer_widget_title td_fs_32 td_white_color td_medium td_mb_30">
                        {{ __('translate.Categories') }}</h2>
                    <ul class="td_footer_widget_menu">
                        @foreach ($menu_categories->take(6) as $menu_category)
                            <li>
                                <a
                                    href="{{ route('courses', ['category' => $menu_category->slug]) }}">{{ $menu_category?->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="td_footer_col">
                <div class="td_footer_widget">
                    <h2 class="td_footer_widget_title td_fs_32 td_white_color td_medium td_mb_30">
                        {{ __('translate.Subscribe Now') }}</h2>
                    <div class="td_newsletter td_style_1">
                        <p class="td_mb_20 td_opacity_7">
                            {{ __('translate.Far far away, behind the word mountains, far from the Consonantia.') }}
                        </p>
                        <form action="{{ route('store-newsletter') }}" method="POST" class="td_newsletter_form">
                            @csrf
                            <input type="email" class="td_newsletter_input"
                                placeholder="{{ __('translate.Email address') }}" name="email">
                            <button type="submit" class="td_btn td_style_1 td_radius_30 td_medium">
                                <span class="td_btn_in td_white_color td_accent_bg">
                                    <span>{{ __('translate.Subscribe') }}</span>
                                </span>
                            </button>
                        </form>
                    </div>
                    <div class="td_footer_social_btns td_fs_20">
                        <a target="_blank" href="{{ $footer->facebook }}" class="td_center">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a target="_blank" href="{{ $footer->twitter }}" class="td_center">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                        <a target="_blank" href="{{ $footer->instagram }}" class="td_center">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a target="_blank" href="{{ $footer->linkedin }}" class="td_center">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="td_footer_bottom td_fs_18">
        <div class="container">
            <div class="td_footer_bottom_in">
                <p class="td_copyright mb-0">{{ $footer->copyright }}</p>
                <ul class="td_footer_widget_menu">
                    <li><a href="{{ route('terms-conditions') }}"> {{ __('translate.Terms & Conditions') }}</a></li>
                    <li><a href="{{ route('privacy-policy') }}">{{ __('translate.Privacy & Policy') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<footer>
    <div class="tg-footer-area tg-footer-space include-bg" data-background="{{ asset('frontend/assets/img/shape/home-1-footer-bg.jpeg') }}">
        <div class="container">
            <div class="tg-footer-top mb-40">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="tg-footer-widget mb-40">
                            <div class="tg-footer-logo mb-20">
                                <a href="index.html"><img src="assets/img/logo/logo-white.png" alt=""></a>
                            </div>
                            <p class="mb-20">Pharetra maecenas felis vestibulum convallis mollis nullam congue sit.d
                                rivers of Finland Quebec.</p>
                            <div class="tg-footer-form mb-30">
                                <form action="#">
                                    <input type="email" placeholder="Enter your mail">
                                    <button class="tg-footer-form-btn" type="submit">
                                        <svg width="22" height="17" viewBox="0 0 22 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.52514 8.47486H20.4749M20.4749 8.47486L13.5 1.5M20.4749 8.47486L13.5 15.4497"
                                                stroke="white" stroke-width="1.77778" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <div class="tg-footer-social">
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="tg-footer-widget tg-footer-link ml-80 mb-40">
                            <h3 class="tg-footer-widget-title mb-25">Quick Links</h3>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Tour Guide</a></li>
                                <li><a href="contact.html"> Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="tg-footer-widget tg-footer-info mb-40">
                            <h3 class="tg-footer-widget-title mb-25">Information</h3>
                            <ul>
                                <li>
                                    <a class="d-flex"
                                        href="https://www.google.com/maps/@41.6758525,-86.2531698,18.17z">
                                        <span class="mr-15">
                                            <svg width="20" height="24" viewBox="0 0 20 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.0013 10.0608C19.0013 16.8486 10.3346 22.6668 10.3346 22.6668C10.3346 22.6668 1.66797 16.8486 1.66797 10.0608C1.66797 7.74615 2.58106 5.52634 4.20638 3.88965C5.83169 2.25297 8.03609 1.3335 10.3346 1.3335C12.6332 1.3335 14.8376 2.25297 16.4629 3.88965C18.0882 5.52634 19.0013 7.74615 19.0013 10.0608Z"
                                                    stroke="white" stroke-width="1.73333" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M10.3346 12.9699C11.9301 12.9699 13.2235 11.6674 13.2235 10.0608C13.2235 8.45412 11.9301 7.15168 10.3346 7.15168C8.73915 7.15168 7.44575 8.45412 7.44575 10.0608C7.44575 11.6674 8.73915 12.9699 10.3346 12.9699Z"
                                                    stroke="white" stroke-width="1.73333" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        58 Street Commercial Road<br> Fratton, Australia
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex" href="tel:+1238889999">
                                        <span class="mr-15">
                                            <i class="fa-sharp text-white fa-solid fa-phone"></i>
                                        </span>
                                        +123 888 9999
                                    </a>
                                </li>
                                <li class="d-flex">
                                    <span class="mr-15">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.9987 5.60006V12.0001L16.2654 14.1334M22.6654 12.0002C22.6654 17.8912 17.8897 22.6668 11.9987 22.6668C6.10766 22.6668 1.33203 17.8912 1.33203 12.0002C1.33203 6.10912 6.10766 1.3335 11.9987 1.3335C17.8897 1.3335 22.6654 6.10912 22.6654 12.0002Z"
                                                stroke="white" stroke-width="1.6" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <p class="mb-0">
                                        Mon – Sat: 8 am – 5 pm,<br>
                                        Sunday: <span class="text-white d-inline-block">CLOSED</span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="tg-footer-widget tg-footer-link mb-40">
                            <h3 class="tg-footer-widget-title mb-25">Utility Pages</h3>
                            <ul>
                                <li><a href="#">Style Guide</a></li>
                                <li><a href="#">Password Protected</a></li>
                                <li><a href="#">404 Error</a></li>
                                <li><a href="#">Changelog</a></li>
                                <li><a href="#">License</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tg-footer-copyright text-center">
            <span>
                Copyright <a href="#">©Tourex</a> | All Right Reserved
            </span>
        </div>
    </div>
</footer>
<!-- End Footer Section -->

    <!-- header-search -->
    <div class="search__popup">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search__wrapper">
                        <div class="search__close">
                            <button type="button" class="search-close-btn">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="search__form">
                            <form action="#">
                                <div class="search__input">
                                    <input class="search-input-field" type="text" placeholder="Type keywords here">
                                    <span class="search-focus-border"></span>
                                    <button>
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.55 18.1C14.272 18.1 18.1 14.272 18.1 9.55C18.1 4.82797 14.272 1 9.55 1C4.82797 1 1 4.82797 1 9.55C1 14.272 4.82797 18.1 9.55 18.1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M19.0002 19.0002L17.2002 17.2002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="search-popup-overlay"></div>
    <!-- header-search-end -->

    <!-- header-area -->
    <header class="tg-header-height">
        <div class="tg-header__area">
            <div class="tg-header-top tg-header-top-space tg-primary-bg d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        @if ($footer->address)
                        <div class="col-lg-6">
                            <div class="tg-header-top-info d-flex align-items-center">
                                <a href="{{ $footer->address_url }}"><i class="mr-5 fa-regular fa-location-dot"></i> {{ $footer->address }}</a>
                                <span class="tg-header-dvdr mr-10 ml-10"></span>
                                <a href="mailto:#"><i class="mr-5 fa-regular fa-envelope"></i> #</a>
                            </div>
                        </div>
                        @endif
                        <div class="col-lg-6">
                            <div class="tg-header-top-info d-flex align-items-center justify-content-end">
                                @if ($footer->phone)
                                <a href="tel:{{ $footer->phone }}"><i class="fa-sharp fa-regular fa-phone"></i> {{ $footer->phone }}</a>
                                @endif
                                <span class="tg-header-dvdr mr-10 ml-10"></span>
                                <a href="{{ route('login') }}"><i class="fa-regular fa-user"></i> {{ __('translate.Login') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tg-header-4-bootom tg-header-lg-space" id="header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-5">
                            <div class="tgmenu__wrap d-flex align-items-center">
                                <div class="logo flex-auto">
                                    <a href="{{ route('home') }}"><img src="{{ asset($general_setting->logo) }}" alt="Logo"></a>
                                </div>
                                <nav class="tgmenu__nav  ml-90 d-none d-xl-block">
                                    <div class="tgmenu__navbar-wrap tgmenu__main-menu tgmenu__navbar-wrap-4 d-none d-xl-flex">
                                        @include('components.common_navitems')
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-4 col-7">
                            <div class="tg-menu-right-action tg-menu-right-action-3 tg-menu-4-right-action d-flex align-items-center justify-content-end">
                                <button class="search-button search-open-btn">
                                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.3047 16.8044L13.8294 13.3291M15.9857 8.14485C15.9857 12.1989 12.6992 15.4854 8.64519 15.4854C4.59114 15.4854 1.30469 12.1989 1.30469 8.14485C1.30469 4.09081 4.59114 0.804352 8.64519 0.804352C12.6992 0.804352 15.9857 4.09081 15.9857 8.14485Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <div class="tg-header-cart p-relative d-none d-xl-block">
                                    <button class="cart-button">
                                        <span>
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.62814 18.0594C8.62871 18.2932 8.55818 18.5219 8.42546 18.7166C8.29274 18.9113 8.10378 19.0634 7.88244 19.1535C7.6611 19.2437 7.41732 19.2679 7.18187 19.2231C6.94642 19.1783 6.72987 19.0665 6.55957 18.9019C6.38927 18.7373 6.27285 18.5271 6.22502 18.2981C6.17719 18.069 6.20009 17.8312 6.29083 17.6148C6.38157 17.3984 6.53608 17.2131 6.73485 17.0822C6.93361 16.9513 7.16772 16.8807 7.40761 16.8794H7.4173C7.73843 16.8794 8.04642 17.0038 8.27349 17.225C8.50057 17.4463 8.62814 17.7465 8.62814 18.0594ZM15.1667 16.8794H15.157C14.835 16.8807 14.5267 17.0064 14.2997 17.2289C14.0727 17.4515 13.9455 17.7527 13.9462 18.0665C13.9468 18.3803 14.0752 18.681 14.3031 18.9026C14.531 19.1243 14.8398 19.2488 15.1618 19.2488C15.4838 19.2488 15.7927 19.1243 16.0206 18.9026C16.2485 18.681 16.3769 18.3803 16.3775 18.0665C16.3782 17.7527 16.251 17.4515 16.024 17.2289C15.797 17.0064 15.4887 16.8807 15.1667 16.8794ZM19.7049 6.25219L18.7227 12.0727C18.6983 12.4981 18.5846 12.914 18.3888 13.2948C18.1929 13.6757 17.9189 14.0133 17.5838 14.2868C17.2487 14.5604 16.8596 14.7641 16.4405 14.8853C16.0214 15.0065 15.5813 15.0426 15.1473 14.9915H7.14026C6.49994 14.9888 5.88183 14.7625 5.39819 14.3535C4.91455 13.9446 4.59745 13.3802 4.5045 12.7628L3.03889 2.78875C2.99657 2.50865 2.85278 2.25255 2.63354 2.06677C2.4143 1.881 2.13407 1.77781 1.84355 1.77587H1.58588C1.3932 1.77587 1.20841 1.70128 1.07216 1.56851C0.935917 1.43573 0.859375 1.25566 0.859375 1.06789C0.859375 0.880121 0.935917 0.700043 1.07216 0.567271C1.20841 0.434499 1.3932 0.359909 1.58588 0.359909H1.84355C2.48387 0.362561 3.10198 0.588918 3.58562 0.997869C4.06926 1.40682 4.38635 1.97124 4.47931 2.58863L4.56843 3.19183H17.0847C17.4749 3.19178 17.8603 3.27527 18.2138 3.4364C18.5672 3.59754 18.8801 3.83237 19.1301 4.12431C19.3802 4.41625 19.5613 4.75815 19.6608 5.12585C19.7603 5.49355 19.7747 5.87806 19.7049 6.25219ZM18.0136 5.03258C17.9002 4.89971 17.7582 4.79277 17.5977 4.71936C17.4371 4.64595 17.262 4.60786 17.0847 4.60779H4.77572L5.93813 12.5626C5.98063 12.8439 6.1254 13.1009 6.34605 13.2868C6.56671 13.4727 6.84856 13.5752 7.14026 13.5755H15.1473C16.6972 13.5755 17.0711 13.0091 17.291 11.832L18.2732 6.01053C18.3067 5.83896 18.3008 5.66228 18.2559 5.49319C18.2111 5.3241 18.1283 5.16679 18.0136 5.03258ZM13.6943 8.38368H9.81961C9.62693 8.38368 9.44214 8.45827 9.30589 8.59104C9.16965 8.72381 9.0931 8.90389 9.0931 9.09166C9.0931 9.27943 9.16965 9.4595 9.30589 9.59228C9.44214 9.72505 9.62693 9.79964 9.81961 9.79964H13.6943C13.887 9.79964 14.0718 9.72505 14.208 9.59228C14.3443 9.4595 14.4208 9.27943 14.4208 9.09166C14.4208 8.90389 14.3443 8.72381 14.208 8.59104C14.0718 8.45827 13.887 8.38368 13.6943 8.38368Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <span class="tg-header-cart-count">0</span>
                                    </button>
                                    <div class="minicart">
                                        <div class="cart-content-wrap d-flex align-items-center justify-content-between">
                                            <div class="cart-img-info d-flex align-items-center">
                                                <div class="cart-thumb">
                                                    <a href="shop.html"> <img src="assets/img/shop/sm-product-1.jpg" alt=""></a>
                                                </div>
                                                <div class="cart-content">
                                                    <h5 class="cart-title"><a href="shop.html">Camera nstax</a></h5>
                                                    <span> $ 120 <del>$220</del></span>
                                                </div>
                                            </div>
                                            <div class="cart-del-icon">
                                                <span><i class="fa-light fa-trash-can"></i></span>
                                            </div>
                                        </div>
                                        <div class="cart-content-wrap d-flex justify-content-between align-items-center">
                                            <div class="cart-img-info  d-flex align-items-center">
                                                <div class="cart-thumb">
                                                    <a href="shop.html"> <img src="assets/img/shop/sm-product-2.jpg" alt=""></a>
                                                </div>
                                                <div class="cart-content">
                                                    <h5 class="cart-title"><a href="shop.html">Halo Smartwatch</a></h5>
                                                    <span> $230 <del>$399 </del></span>
                                                </div>
                                            </div>
                                            <div class="cart-del-icon">
                                                <span><i class="fa-light fa-trash-can"></i></span>
                                            </div>
                                        </div>
                                        <div class="cart-total-price d-flex align-items-center justify-content-between">
                                            <span>Total:</span>
                                            <span>$100.0</span>
                                        </div>
                                        <div class="minicart-btn">
                                            <a class="cart-btn mb-10" href="cart.html"><span>Shopping Cart</span></a>
                                            <a class="cart-btn cart-btn-black" href="checkout.html"><span>Checkout</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tg-header-menu-bar lh-1 p-relative ml-10">
                                    <button class="tgmenu-offcanvas-open-btn menu-tigger d-none d-xl-block">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                    <button class="tgmenu-offcanvas-open-btn mobile-nav-toggler d-block d-xl-none">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Mobile Menu  -->
    @include('components.common_mobile_menu')
    <!-- End Mobile Menu -->

    <!-- offCanvas-menu -->
    @include('components.common_offcanvas')
    <!-- offCanvas-menu-end -->

    </header>
    <!-- header-area-end -->

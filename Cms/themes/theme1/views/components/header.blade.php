<header class="td_site_header td_style_1 td_type_2 td_sticky_header td_medium td_heading_color d-none">
    <div class="td_top_header td_top_header_two  td_heading_bg td_white_color">
        <div class="container">
            <div class="td_top_header_in">
                <div class="td_top_header_left">
                    <ul class="td_header_contact_list td_mp_0 td_normal">
                        <li>
                            @include('svg.search_phone')
                            <span>
                                {{ __('translate.Call') }}: <a href="tel:{{ $footer->phone }}">{{ $footer->phone }}</a>
                            </span>
                        </li>
                        <li>

                            @include('svg.search_email')
                            <span>
                                {{ __('translate.Email') }}: <a
                                    href="mailto:{{ $footer->email }}">{{ $footer->email }}</a>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="td_top_header_right">
                    <div class="td_hero_icon_btns position-relative">
                        <div class="top_bar-curr-lang-wrapper">
                            <div class="curr-wrapper">
                                <span>
                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="10.5" cy="10.5" r="8.75" stroke="white"
                                            stroke-width="1.5" />
                                        <path
                                            d="M12.25 8.75C12.25 7.7835 11.4665 7 10.5 7C9.5335 7 8.75 7.7835 8.75 8.75C8.75 9.7165 9.5335 10.5 10.5 10.5"
                                            stroke="white" stroke-width="1.5" stroke-linecap="round" />
                                        <path
                                            d="M10.5 10.5C11.4665 10.5 12.25 11.2835 12.25 12.25C12.25 13.2165 11.4665 14 10.5 14C9.5335 14 8.75 13.2165 8.75 12.25"
                                            stroke="white" stroke-width="1.5" stroke-linecap="round" />
                                        <path d="M10.5 5.6875V7" stroke="white" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M10.5 14V15.3125" stroke="white" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                </span>
                                <select class="curr-select currency_code" name="currency_code">
                                    @foreach ($currency_list as $currency_item)
                                        <option
                                            {{ Session::get('currency_code') == $currency_item->currency_code ? 'selected' : '' }}
                                            value="{{ $currency_item->currency_code }}">
                                            {{ $currency_item->currency_name }}</option>
                                    @endforeach
                                </select>
                                <span>
                                    <svg width="12" height="6" viewBox="0 0 12 6" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.48168 0.257257L1.15195 0.633128C1.0082 0.507022 0.880234 0.47264 0.6972 0.522982C0.591592 0.552689 0.533228 0.620723 0.511034 0.682062C0.489915 0.740432 0.498794 0.79213 0.537367 0.837247L0.537391 0.837227L0.540943 0.841477C0.554654 0.857879 0.574305 0.877369 0.617194 0.917969C1.18107 1.41263 1.74445 1.90717 2.30763 2.40154C3.43758 3.39343 4.56675 4.38463 5.6976 5.37472L5.69797 5.37504C5.85925 5.51653 6.03253 5.53326 6.19983 5.44822L6.20061 5.44782C6.22486 5.43555 6.25952 5.41023 6.32959 5.34876C6.74121 4.98767 7.1527 4.62651 7.5642 4.26535C8.79869 3.18185 10.0332 2.09833 11.2713 1.01657C11.4176 0.888233 11.4756 0.817164 11.5 0.763333L11.5 0.763256L11.5 0.76286L11.5 0.762465L11.5 0.762069L11.5 0.761673L11.5 0.761277L11.5 0.760881L11.5 0.760485L11.5 0.760089L11.5 0.759694L11.5 0.759298L11.5 0.758901L11.5 0.758505L11.5 0.758109L11.5 0.757713L11.5 0.757317L11.5 0.756921L11.5 0.756525L11.5 0.756129L11.5 0.755732L11.5 0.755336L11.5 0.75494L11.5 0.754544L11.5 0.754147L11.5 0.753751L11.5 0.753355L11.5 0.752958L11.5 0.752562L11.5 0.752165L11.5 0.751769L11.5 0.751372L11.5 0.750976L11.5 0.750579L11.5 0.750182L11.5 0.749786L11.5 0.749389L11.5 0.748992L11.5 0.748596L11.5 0.748199L11.5 0.747802L11.5 0.747405L11.5 0.747008L11.5 0.746612L11.5 0.746215L11.5 0.745818L11.5 0.745421L11.5 0.745024L11.5 0.744627L11.5 0.74423L11.5 0.743832L11.5 0.743435L11.5 0.743038L11.5 0.742641L11.5 0.742244L11.5 0.741847L11.5 0.741449L11.5 0.741052L11.5 0.740655L11.5 0.740257L11.5 0.73986L11.5 0.739462L11.5 0.739065L11.5 0.738667L11.5 0.73827L11.5 0.737872L11.5 0.737475L11.5 0.737077L11.5 0.736679L11.5 0.736282L11.5 0.735884L11.5 0.735486L11.5 0.735088L11.5 0.73469L11.5 0.734292L11.5 0.733895L11.5 0.733497L11.5 0.733099L11.5 0.732701L11.5 0.732303L11.5 0.731904L11.5 0.731506L11.5 0.731108L11.5 0.73071L11.5 0.730312L11.5 0.729913L11.5 0.729515L11.5 0.729117L11.5 0.728718L11.5 0.72832L11.5 0.727922L11.5 0.727523L11.5 0.727125L11.5 0.726726L11.5 0.726327L11.5 0.725929L11.5 0.72553L11.5 0.725131L11.5 0.724733L11.5 0.724334L11.5 0.723935L11.5 0.723536L11.5 0.723137L11.5 0.722738L11.5 0.722339L11.5 0.72194L11.5 0.721541L11.5 0.721142L11.5 0.720743L11.5 0.720344L11.5 0.719945L11.5 0.719546L11.5 0.719146L11.5 0.718747L11.5 0.718348L11.5 0.717948L11.5 0.717549L11.5 0.717149L11.5 0.71675L11.5 0.71635L11.5 0.715951L11.5 0.715551L11.5 0.715151L11.5 0.714752L11.5 0.714352L11.5 0.713952L11.5 0.713552L11.5 0.713152L11.5 0.712752L11.5 0.712686C11.4728 0.641646 11.4398 0.601009 11.3933 0.567314C11.2606 0.477334 11.0599 0.479312 10.9385 0.562808C10.892 0.596539 10.8496 0.629622 10.8124 0.662319L6.43668 4.50087L6.12015 4.14005L6.43668 4.50087C6.45898 4.4813 6.35887 4.58257 6.24201 4.65946L5.82635 4.93294L5.55084 4.51862C5.54079 4.50351 5.53244 4.48968 5.52579 4.47815C5.52369 4.47451 5.52169 4.47098 5.51982 4.46763C4.80043 3.83518 4.08022 3.20338 3.35977 2.57138L3.35929 2.57096C2.62327 1.92529 1.887 1.2794 1.15153 0.632758L1.48168 0.257257ZM1.48168 0.257257C1.22214 0.0295716 0.922659 -0.0579998 0.563286 0.0412478C0.040864 0.1872 -0.172097 0.776848 0.157328 1.16216L1.48168 0.257257Z"
                                            fill="#161B3D" stroke="white" />
                                    </svg>

                                </span>
                            </div>
                            <div class="separator">|</div>
                            <div class="lang-wrapper">
                                <span>
                                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <ellipse cx="9.5" cy="9.5" rx="3.5" ry="8.75"
                                            stroke="white" stroke-width="1.5" />
                                        <path
                                            d="M18.2466 9.25547C16.6696 10.5514 13.3455 11.4444 9.5 11.4444C5.65447 11.4444 2.33041 10.5514 0.753351 9.25547M18.2466 9.25547C18.1172 4.53604 14.2507 0.75 9.5 0.75C4.74928 0.75 0.882847 4.53604 0.753351 9.25547M18.2466 9.25547C18.2489 9.33671 18.25 9.41822 18.25 9.5C18.25 14.3325 14.3325 18.25 9.5 18.25C4.66751 18.25 0.75 14.3325 0.75 9.5C0.75 9.41822 0.751122 9.33671 0.753351 9.25547"
                                            stroke="white" stroke-width="1.5" />
                                    </svg>
                                </span>
                                <select class="lang-select language_code" name="lang_code">
                                    @foreach ($language_list as $language_item)
                                        <option
                                            {{ Session::get('front_lang') == $language_item->lang_code ? 'selected' : '' }}
                                            value="{{ $language_item->lang_code }}">{{ $language_item->lang_name }}
                                        </option>
                                    @endforeach

                                </select>
                                <span>
                                    <svg width="12" height="6" viewBox="0 0 12 6" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.48168 0.257257L1.15195 0.633128C1.0082 0.507022 0.880234 0.47264 0.6972 0.522982C0.591592 0.552689 0.533228 0.620723 0.511034 0.682062C0.489915 0.740432 0.498794 0.79213 0.537367 0.837247L0.537391 0.837227L0.540943 0.841477C0.554654 0.857879 0.574305 0.877369 0.617194 0.917969C1.18107 1.41263 1.74445 1.90717 2.30763 2.40154C3.43758 3.39343 4.56675 4.38463 5.6976 5.37472L5.69797 5.37504C5.85925 5.51653 6.03253 5.53326 6.19983 5.44822L6.20061 5.44782C6.22486 5.43555 6.25952 5.41023 6.32959 5.34876C6.74121 4.98767 7.1527 4.62651 7.5642 4.26535C8.79869 3.18185 10.0332 2.09833 11.2713 1.01657C11.4176 0.888233 11.4756 0.817164 11.5 0.763333L11.5 0.763256L11.5 0.76286L11.5 0.762465L11.5 0.762069L11.5 0.761673L11.5 0.761277L11.5 0.760881L11.5 0.760485L11.5 0.760089L11.5 0.759694L11.5 0.759298L11.5 0.758901L11.5 0.758505L11.5 0.758109L11.5 0.757713L11.5 0.757317L11.5 0.756921L11.5 0.756525L11.5 0.756129L11.5 0.755732L11.5 0.755336L11.5 0.75494L11.5 0.754544L11.5 0.754147L11.5 0.753751L11.5 0.753355L11.5 0.752958L11.5 0.752562L11.5 0.752165L11.5 0.751769L11.5 0.751372L11.5 0.750976L11.5 0.750579L11.5 0.750182L11.5 0.749786L11.5 0.749389L11.5 0.748992L11.5 0.748596L11.5 0.748199L11.5 0.747802L11.5 0.747405L11.5 0.747008L11.5 0.746612L11.5 0.746215L11.5 0.745818L11.5 0.745421L11.5 0.745024L11.5 0.744627L11.5 0.74423L11.5 0.743832L11.5 0.743435L11.5 0.743038L11.5 0.742641L11.5 0.742244L11.5 0.741847L11.5 0.741449L11.5 0.741052L11.5 0.740655L11.5 0.740257L11.5 0.73986L11.5 0.739462L11.5 0.739065L11.5 0.738667L11.5 0.73827L11.5 0.737872L11.5 0.737475L11.5 0.737077L11.5 0.736679L11.5 0.736282L11.5 0.735884L11.5 0.735486L11.5 0.735088L11.5 0.73469L11.5 0.734292L11.5 0.733895L11.5 0.733497L11.5 0.733099L11.5 0.732701L11.5 0.732303L11.5 0.731904L11.5 0.731506L11.5 0.731108L11.5 0.73071L11.5 0.730312L11.5 0.729913L11.5 0.729515L11.5 0.729117L11.5 0.728718L11.5 0.72832L11.5 0.727922L11.5 0.727523L11.5 0.727125L11.5 0.726726L11.5 0.726327L11.5 0.725929L11.5 0.72553L11.5 0.725131L11.5 0.724733L11.5 0.724334L11.5 0.723935L11.5 0.723536L11.5 0.723137L11.5 0.722738L11.5 0.722339L11.5 0.72194L11.5 0.721541L11.5 0.721142L11.5 0.720743L11.5 0.720344L11.5 0.719945L11.5 0.719546L11.5 0.719146L11.5 0.718747L11.5 0.718348L11.5 0.717948L11.5 0.717549L11.5 0.717149L11.5 0.71675L11.5 0.71635L11.5 0.715951L11.5 0.715551L11.5 0.715151L11.5 0.714752L11.5 0.714352L11.5 0.713952L11.5 0.713552L11.5 0.713152L11.5 0.712752L11.5 0.712686C11.4728 0.641646 11.4398 0.601009 11.3933 0.567314C11.2606 0.477334 11.0599 0.479312 10.9385 0.562808C10.892 0.596539 10.8496 0.629622 10.8124 0.662319L6.43668 4.50087L6.12015 4.14005L6.43668 4.50087C6.45898 4.4813 6.35887 4.58257 6.24201 4.65946L5.82635 4.93294L5.55084 4.51862C5.54079 4.50351 5.53244 4.48968 5.52579 4.47815C5.52369 4.47451 5.52169 4.47098 5.51982 4.46763C4.80043 3.83518 4.08022 3.20338 3.35977 2.57138L3.35929 2.57096C2.62327 1.92529 1.887 1.2794 1.15153 0.632758L1.48168 0.257257ZM1.48168 0.257257C1.22214 0.0295716 0.922659 -0.0579998 0.563286 0.0412478C0.040864 0.1872 -0.172097 0.776848 0.157328 1.16216L1.48168 0.257257Z"
                                            fill="#161B3D" stroke="white" />
                                    </svg>

                                </span>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="position-relative">
                                <div class="edc-searchbar-clickaway td_search_tobble_btn"></div>
                                <button class="td_circle_btn td_center td_search_tobble_btn" type="button">
                                    <span class="d-inline-flex">
                                        @include('svg.search_menu')
                                    </span>
                                </button>
                                <div class="td_header_search_wrap">
                                    <form action="{{ route('courses') }}" class="td_header_search">
                                        <input type="text" class="td_header_search_input" name="search"
                                            placeholder="{{ __('translate.Search Course') }}">
                                        <button class="td_header_search_btn td_center" type="submit">
                                            <span class="d-inline-flex">
                                                @include('svg.search_menu')
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <a class="td_circle_btn td_center" href="{{ route('user.wishlist.index') }}">
                                <span class="d-inline-flex">
                                    @include('svg.menu_heart')
                                </span>
                                <span class="td_circle_btn_label "
                                    id="total_wishlist">{{ count($wishlist_array) ?? 0 }}</span>
                            </a>
                            <a class="td_circle_btn td_center" href="{{ route('carts') }}">
                                <span class="d-inline-flex">
                                    @include('svg.menu_cart')
                                </span>
                                @php
                                    $carts = session()->get('cart', []);
                                @endphp
                                <span class="td_circle_btn_label " id="total_cart">{{ count($carts) }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="td_main_header">
        <div class="container">
            <div class="td_main_header_in">
                <div class="td_main_header_left">
                    <a class="td_site_branding" href="{{ route('home') }}">
                        <img src="{{ asset($general_setting->logo) }}" alt="Logo">
                    </a>
                </div>

                <div class="td_main_header_center">
                    <nav class="td_nav">
                        <div class="td_nav_list_wrap">
                            <div class="td_nav_list_wrap_in">
                                <ul class="td_nav_list">
                                    @if ($general_setting->selected_theme == 'all_theme')
                                        <li class="menu-item-has-children">
                                            <a href="{{ route('home') }}">{{ __('translate.Home') }}</a>
                                            <ul>

                                                <li>
                                                    <a
                                                        href="{{ route('home', ['theme' => 'one']) }}"><span>{{ __('translate.Online Educations') }}</span></a>
                                                </li>

                                                <li>
                                                    <a
                                                        href="{{ route('home', ['theme' => 'two']) }}"><span>{{ __('translate.Education') }}</span></a>
                                                </li>

                                                <li>
                                                    <a
                                                        href="{{ route('home', ['theme' => 'three']) }}"><span>{{ __('translate.KinderGarden') }}</span></a>
                                                </li>

                                                <li>
                                                    <a
                                                        href="{{ route('home', ['theme' => 'four']) }}"><span>{{ __('translate.University') }}</span></a>
                                                </li>

                                            </ul>
                                        </li>
                                    @else
                                        <li><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                                    @endif


                                    @if ($general_setting->course_theme == 'with_sidebar')
                                        <li>
                                            <a
                                                href="{{ route('courses', ['page_view' => 'sidebar_grid_view']) }}">{{ __('translate.Courses') }}</a>
                                        </li>
                                    @elseif ($general_setting->course_theme == 'without_sidebar')
                                        <li>
                                            <a
                                                href="{{ route('courses', ['page_view' => 'grid']) }}">{{ __('translate.Courses') }}</a>
                                        </li>
                                    @else
                                        <li class="menu-item-has-children">
                                            <a href="{{ route('courses') }}">{{ __('translate.Courses') }}</a>
                                            <ul>
                                                <li>
                                                    <a
                                                        href="{{ route('courses', ['page_view' => 'grid']) }}">{{ __('translate.Courses Grid View') }}</a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ route('courses', ['page_view' => 'list']) }}">{{ __('translate.Courses List View') }}</a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ route('courses', ['page_view' => 'sidebar_grid_view']) }}">{{ __('translate.Courses Grid With Sidebar') }}</a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif

                                    <li><a href="{{ route('instructors') }}">{{ __('translate.Instructors') }}</a>
                                    </li>


                                    @if ($general_setting->blog_theme == 'with_sidebar')
                                        <li>
                                            <a
                                                href="{{ route('blogs', ['page_view' => 'blogs_with_sidebar']) }}">{{ __('translate.Blogs') }}</a>
                                        </li>
                                    @elseif ($general_setting->blog_theme == 'without_sidebar')
                                        <li><a href="{{ route('blogs') }}">{{ __('translate.Blogs') }}</a></li>
                                    @else
                                        <li class="menu-item-has-children">
                                            <a href="javascript:;">{{ __('translate.Blogs') }}</a>
                                            <ul>
                                                <li><a href="{{ route('blogs') }}">{{ __('translate.Blogs') }}</a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ route('blogs', ['page_view' => 'blogs_with_sidebar']) }}">{{ __('translate.Blog With Sidebar') }}</a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif

                                    <li class="menu-item-has-children">
                                        <a href="javascript:;">{{ __('translate.Pages') }}</a>
                                        <ul>
                                            <li><a href="{{ route('about-us') }}">{{ __('translate.About Us') }}</a>
                                            </li>
                                            <li>
                                                <a
                                                    href="{{ route('privacy-policy') }}">{{ __('translate.Privacy Policy') }}</a>
                                            </li>
                                            <li>
                                                <a
                                                    href="{{ route('terms-conditions') }}">{{ __('translate.Terms & Conditions') }}</a>
                                            </li>
                                            <li><a href="{{ route('faq') }}">{{ __('translate.FAQ') }}</a></li>
                                            @foreach ($custom_pages as $custom_page)
                                                <li>
                                                    <a
                                                        href="{{ route('custom-page', $custom_page->slug) }}">{{ $custom_page->page_name }}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </li>


                                    <li><a href="{{ route('contact-us') }}">{{ __('translate.Contact Us') }}</a></li>


                                </ul>
                            </div>
                            <div class="top_bar-curr-lang-wrapper mt-4">
                                <div class="curr-wrapper">
                                    <span>
                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="10.5" cy="10.5" r="8.75" stroke="#000"
                                                stroke-width="1.5" />
                                            <path
                                                d="M12.25 8.75C12.25 7.7835 11.4665 7 10.5 7C9.5335 7 8.75 7.7835 8.75 8.75C8.75 9.7165 9.5335 10.5 10.5 10.5"
                                                stroke="#000" stroke-width="1.5" stroke-linecap="round" />
                                            <path
                                                d="M10.5 10.5C11.4665 10.5 12.25 11.2835 12.25 12.25C12.25 13.2165 11.4665 14 10.5 14C9.5335 14 8.75 13.2165 8.75 12.25"
                                                stroke="#000" stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M10.5 5.6875V7" stroke="#000" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M10.5 14V15.3125" stroke="#000" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </span>
                                    <select class="curr-select currency_code" name="currency_code">
                                        @foreach ($currency_list as $currency_item)
                                            <option
                                                {{ Session::get('currency_code') == $currency_item->currency_code ? 'selected' : '' }}
                                                value="{{ $currency_item->currency_code }}">
                                                {{ $currency_item->currency_name }}</option>
                                        @endforeach
                                    </select>
                                    <span>
                                        <svg width="12" height="6" viewBox="0 0 12 6" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.48168 0.257257L1.15195 0.633128C1.0082 0.507022 0.880234 0.47264 0.6972 0.522982C0.591592 0.552689 0.533228 0.620723 0.511034 0.682062C0.489915 0.740432 0.498794 0.79213 0.537367 0.837247L0.537391 0.837227L0.540943 0.841477C0.554654 0.857879 0.574305 0.877369 0.617194 0.917969C1.18107 1.41263 1.74445 1.90717 2.30763 2.40154C3.43758 3.39343 4.56675 4.38463 5.6976 5.37472L5.69797 5.37504C5.85925 5.51653 6.03253 5.53326 6.19983 5.44822L6.20061 5.44782C6.22486 5.43555 6.25952 5.41023 6.32959 5.34876C6.74121 4.98767 7.1527 4.62651 7.5642 4.26535C8.79869 3.18185 10.0332 2.09833 11.2713 1.01657C11.4176 0.888233 11.4756 0.817164 11.5 0.763333L11.5 0.763256L11.5 0.76286L11.5 0.762465L11.5 0.762069L11.5 0.761673L11.5 0.761277L11.5 0.760881L11.5 0.760485L11.5 0.760089L11.5 0.759694L11.5 0.759298L11.5 0.758901L11.5 0.758505L11.5 0.758109L11.5 0.757713L11.5 0.757317L11.5 0.756921L11.5 0.756525L11.5 0.756129L11.5 0.755732L11.5 0.755336L11.5 0.75494L11.5 0.754544L11.5 0.754147L11.5 0.753751L11.5 0.753355L11.5 0.752958L11.5 0.752562L11.5 0.752165L11.5 0.751769L11.5 0.751372L11.5 0.750976L11.5 0.750579L11.5 0.750182L11.5 0.749786L11.5 0.749389L11.5 0.748992L11.5 0.748596L11.5 0.748199L11.5 0.747802L11.5 0.747405L11.5 0.747008L11.5 0.746612L11.5 0.746215L11.5 0.745818L11.5 0.745421L11.5 0.745024L11.5 0.744627L11.5 0.74423L11.5 0.743832L11.5 0.743435L11.5 0.743038L11.5 0.742641L11.5 0.742244L11.5 0.741847L11.5 0.741449L11.5 0.741052L11.5 0.740655L11.5 0.740257L11.5 0.73986L11.5 0.739462L11.5 0.739065L11.5 0.738667L11.5 0.73827L11.5 0.737872L11.5 0.737475L11.5 0.737077L11.5 0.736679L11.5 0.736282L11.5 0.735884L11.5 0.735486L11.5 0.735088L11.5 0.73469L11.5 0.734292L11.5 0.733895L11.5 0.733497L11.5 0.733099L11.5 0.732701L11.5 0.732303L11.5 0.731904L11.5 0.731506L11.5 0.731108L11.5 0.73071L11.5 0.730312L11.5 0.729913L11.5 0.729515L11.5 0.729117L11.5 0.728718L11.5 0.72832L11.5 0.727922L11.5 0.727523L11.5 0.727125L11.5 0.726726L11.5 0.726327L11.5 0.725929L11.5 0.72553L11.5 0.725131L11.5 0.724733L11.5 0.724334L11.5 0.723935L11.5 0.723536L11.5 0.723137L11.5 0.722738L11.5 0.722339L11.5 0.72194L11.5 0.721541L11.5 0.721142L11.5 0.720743L11.5 0.720344L11.5 0.719945L11.5 0.719546L11.5 0.719146L11.5 0.718747L11.5 0.718348L11.5 0.717948L11.5 0.717549L11.5 0.717149L11.5 0.71675L11.5 0.71635L11.5 0.715951L11.5 0.715551L11.5 0.715151L11.5 0.714752L11.5 0.714352L11.5 0.713952L11.5 0.713552L11.5 0.713152L11.5 0.712752L11.5 0.712686C11.4728 0.641646 11.4398 0.601009 11.3933 0.567314C11.2606 0.477334 11.0599 0.479312 10.9385 0.562808C10.892 0.596539 10.8496 0.629622 10.8124 0.662319L6.43668 4.50087L6.12015 4.14005L6.43668 4.50087C6.45898 4.4813 6.35887 4.58257 6.24201 4.65946L5.82635 4.93294L5.55084 4.51862C5.54079 4.50351 5.53244 4.48968 5.52579 4.47815C5.52369 4.47451 5.52169 4.47098 5.51982 4.46763C4.80043 3.83518 4.08022 3.20338 3.35977 2.57138L3.35929 2.57096C2.62327 1.92529 1.887 1.2794 1.15153 0.632758L1.48168 0.257257ZM1.48168 0.257257C1.22214 0.0295716 0.922659 -0.0579998 0.563286 0.0412478C0.040864 0.1872 -0.172097 0.776848 0.157328 1.16216L1.48168 0.257257Z"
                                                fill="#161B3D" stroke="#000" />
                                        </svg>

                                    </span>
                                </div>
                                <div class="separator">|</div>
                                <div class="lang-wrapper">
                                    <span>
                                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <ellipse cx="9.5" cy="9.5" rx="3.5" ry="8.75"
                                                stroke="#000" stroke-width="1.5" />
                                            <path
                                                d="M18.2466 9.25547C16.6696 10.5514 13.3455 11.4444 9.5 11.4444C5.65447 11.4444 2.33041 10.5514 0.753351 9.25547M18.2466 9.25547C18.1172 4.53604 14.2507 0.75 9.5 0.75C4.74928 0.75 0.882847 4.53604 0.753351 9.25547M18.2466 9.25547C18.2489 9.33671 18.25 9.41822 18.25 9.5C18.25 14.3325 14.3325 18.25 9.5 18.25C4.66751 18.25 0.75 14.3325 0.75 9.5C0.75 9.41822 0.751122 9.33671 0.753351 9.25547"
                                                stroke="#000" stroke-width="1.5" />
                                        </svg>
                                    </span>
                                    <select class="lang-select language_code" name="lang_code">
                                        @foreach ($language_list as $language_item)
                                            <option
                                                {{ Session::get('front_lang') == $language_item->lang_code ? 'selected' : '' }}
                                                value="{{ $language_item->lang_code }}">
                                                {{ $language_item->lang_name }}</option>
                                        @endforeach

                                    </select>


                                    <span>
                                        <svg width="12" height="6" viewBox="0 0 12 6" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.48168 0.257257L1.15195 0.633128C1.0082 0.507022 0.880234 0.47264 0.6972 0.522982C0.591592 0.552689 0.533228 0.620723 0.511034 0.682062C0.489915 0.740432 0.498794 0.79213 0.537367 0.837247L0.537391 0.837227L0.540943 0.841477C0.554654 0.857879 0.574305 0.877369 0.617194 0.917969C1.18107 1.41263 1.74445 1.90717 2.30763 2.40154C3.43758 3.39343 4.56675 4.38463 5.6976 5.37472L5.69797 5.37504C5.85925 5.51653 6.03253 5.53326 6.19983 5.44822L6.20061 5.44782C6.22486 5.43555 6.25952 5.41023 6.32959 5.34876C6.74121 4.98767 7.1527 4.62651 7.5642 4.26535C8.79869 3.18185 10.0332 2.09833 11.2713 1.01657C11.4176 0.888233 11.4756 0.817164 11.5 0.763333L11.5 0.763256L11.5 0.76286L11.5 0.762465L11.5 0.762069L11.5 0.761673L11.5 0.761277L11.5 0.760881L11.5 0.760485L11.5 0.760089L11.5 0.759694L11.5 0.759298L11.5 0.758901L11.5 0.758505L11.5 0.758109L11.5 0.757713L11.5 0.757317L11.5 0.756921L11.5 0.756525L11.5 0.756129L11.5 0.755732L11.5 0.755336L11.5 0.75494L11.5 0.754544L11.5 0.754147L11.5 0.753751L11.5 0.753355L11.5 0.752958L11.5 0.752562L11.5 0.752165L11.5 0.751769L11.5 0.751372L11.5 0.750976L11.5 0.750579L11.5 0.750182L11.5 0.749786L11.5 0.749389L11.5 0.748992L11.5 0.748596L11.5 0.748199L11.5 0.747802L11.5 0.747405L11.5 0.747008L11.5 0.746612L11.5 0.746215L11.5 0.745818L11.5 0.745421L11.5 0.745024L11.5 0.744627L11.5 0.74423L11.5 0.743832L11.5 0.743435L11.5 0.743038L11.5 0.742641L11.5 0.742244L11.5 0.741847L11.5 0.741449L11.5 0.741052L11.5 0.740655L11.5 0.740257L11.5 0.73986L11.5 0.739462L11.5 0.739065L11.5 0.738667L11.5 0.73827L11.5 0.737872L11.5 0.737475L11.5 0.737077L11.5 0.736679L11.5 0.736282L11.5 0.735884L11.5 0.735486L11.5 0.735088L11.5 0.73469L11.5 0.734292L11.5 0.733895L11.5 0.733497L11.5 0.733099L11.5 0.732701L11.5 0.732303L11.5 0.731904L11.5 0.731506L11.5 0.731108L11.5 0.73071L11.5 0.730312L11.5 0.729913L11.5 0.729515L11.5 0.729117L11.5 0.728718L11.5 0.72832L11.5 0.727922L11.5 0.727523L11.5 0.727125L11.5 0.726726L11.5 0.726327L11.5 0.725929L11.5 0.72553L11.5 0.725131L11.5 0.724733L11.5 0.724334L11.5 0.723935L11.5 0.723536L11.5 0.723137L11.5 0.722738L11.5 0.722339L11.5 0.72194L11.5 0.721541L11.5 0.721142L11.5 0.720743L11.5 0.720344L11.5 0.719945L11.5 0.719546L11.5 0.719146L11.5 0.718747L11.5 0.718348L11.5 0.717948L11.5 0.717549L11.5 0.717149L11.5 0.71675L11.5 0.71635L11.5 0.715951L11.5 0.715551L11.5 0.715151L11.5 0.714752L11.5 0.714352L11.5 0.713952L11.5 0.713552L11.5 0.713152L11.5 0.712752L11.5 0.712686C11.4728 0.641646 11.4398 0.601009 11.3933 0.567314C11.2606 0.477334 11.0599 0.479312 10.9385 0.562808C10.892 0.596539 10.8496 0.629622 10.8124 0.662319L6.43668 4.50087L6.12015 4.14005L6.43668 4.50087C6.45898 4.4813 6.35887 4.58257 6.24201 4.65946L5.82635 4.93294L5.55084 4.51862C5.54079 4.50351 5.53244 4.48968 5.52579 4.47815C5.52369 4.47451 5.52169 4.47098 5.51982 4.46763C4.80043 3.83518 4.08022 3.20338 3.35977 2.57138L3.35929 2.57096C2.62327 1.92529 1.887 1.2794 1.15153 0.632758L1.48168 0.257257ZM1.48168 0.257257C1.22214 0.0295716 0.922659 -0.0579998 0.563286 0.0412478C0.040864 0.1872 -0.172097 0.776848 0.157328 1.16216L1.48168 0.257257Z"
                                                fill="#000" stroke="#000" />
                                        </svg>

                                    </span>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>

                <div class="td_main_header_right">
                    <div class="td_header_btns">
                        @guest('web')
                            <a href="{{ route('user.login') }}"
                                class="td_btn td_style_1 td_type_1 td_radius_30 td_medium td_with_shadow">
                                <span class="td_btn_in td_accent_color td_white_bg">
                                    <span>{{ __('translate.Sign in') }}</span>
                                    <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </a>
                            <a href="{{ route('user.register') }}"
                                class="td_btn td_style_1 td_radius_30 td_medium td_with_shadow">
                                <span class="td_btn_in td_white_color td_accent_bg">
                                    <span>{{ __('translate.Sign up') }}</span>
                                    <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </a>
                        @else
                            <a href="{{ Auth::guard('web')->user()->is_seller == 1 ? route('agency.dashboard') : route('user.dashboard') }}"
                                class="td_btn td_style_1 td_radius_30 td_medium td_with_shadow">
                                <span class="td_btn_in td_white_color td_accent_bg">
                                    <span>{{ __('translate.Dashboard') }}</span>
                                    <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<header class="tg-header-height">
    <div class="tg-header__area tg-header-lg-space z-index-999 tg-transparent" id="header-sticky">
        <div class="container-fluid container-1860">
            <div class="row align-items-center">
                <div class="col-lg-7 col-5">
                    <div class="tgmenu__wrap d-flex align-items-center">
                        <div class="logo">
                            <a class="logo-1" href="index.html"><img src="assets/img/logo/logo-white.png"
                                    alt="Logo"></a>
                            <a class="logo-2 d-none" href="index.html"><img src="assets/img/logo/logo-green.png"
                                    alt="Logo"></a>
                        </div>
                        <nav class="tgmenu__nav tgmenu-1-space ml-180">
                            <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">

                                {!! wp_nav_menu([
                                    'theme_location' => 'primary_menu',
                                    'menu_class' => 'navigation',
                                    'container' => false,
                                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'menu_id' => 'main-nav',
                                    'before' => '',
                                    'after' => '',
                                    'link_before' => '',
                                    'link_after' => '',
                                ]) !!}

                                <ul class="navigation d-none">
                                    <li class="active menu-item-has-children"><a href="index.html">Home</a>
                                        <ul class="sub-menu">
                                            <li><a href="index.html">Home One</a></li>
                                            <li><a href="index-2.html">Home Two</a></li>
                                            <li class="active"><a href="index-3.html">Home Three</a></li>
                                            <li><a href="index-4.html">Home Four</a></li>
                                            <li><a href="index-5.html">Home Five</a></li>
                                            <li><a href="index-6.html">Home Six</a></li>
                                            <li><a href="index-7.html">Home Saven</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="hotel-grid.html">Features</a>
                                        <ul class="sub-menu">
                                            <li><a href="hotel-grid.html">Hotel Grid</a></li>
                                            <li><a href="tour-grid-1.html">Tour Grid One</a></li>
                                            <li><a href="tour-grid-2.html">Tour Grid Two</a></li>
                                            <li><a href="map-listing.html">Hotel Listing</a></li>
                                            <li><a href="tour-details.html">Tour Details One</a></li>
                                            <li><a href="tour-details-2.html">Tour Details Two</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">Pages</a>
                                        <ul class="sub-menu">
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="team.html">Team</a></li>
                                            <li><a href="team-details.html">Team Details</a></li>
                                            <li><a href="shop.html">Shop</a></li>
                                            <li><a href="shop-details.html">Shop Details</a></li>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="pricing.html">Pricing</a></li>
                                            <li><a href="faq.html">Faq</a></li>
                                            <li><a href="login.html">Log In</a></li>
                                            <li><a href="register.html">Register</a></li>
                                            <li><a href="error.html">Error</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="blog-grid.html">Blogs</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog-grid.html">Blog Grid</a></li>
                                            <li><a href="blog-standard.html">Blog Standard</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-5 col-7">
                    <div class="tg-menu-right-action d-flex align-items-center justify-content-end">
                        <div class="tg-header-contact-info d-flex align-items-center">
                            <span class="tg-header-contact-icon mr-5 d-none d-xl-block">
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M17.5747 15.8619L15.8138 17.6228C15.7656 17.6732 15.7236 17.7026 15.6627 17.7362C13.1757 19.0753 8.40326 16.5734 6.21009 14.2626C6.18698 14.2374 6.16809 14.2185 6.14502 14.1954C3.83427 12.0021 1.33257 7.22927 2.67157 4.7421C2.70515 4.68124 2.73453 4.64134 2.78491 4.5931L4.54573 2.83006C4.67586 2.69992 4.82067 2.64116 5.00114 2.64116H5.01583C5.20471 2.64327 5.35163 2.71044 5.47965 2.84895L7.75047 5.30044C7.98973 5.55651 7.98131 5.95109 7.73368 6.19877L6.26666 7.66589C5.85321 8.08148 5.67271 8.62926 5.75877 9.20856C5.94134 10.428 6.55419 11.574 7.63293 12.7095C7.65603 12.7326 7.67489 12.7536 7.69799 12.7746C8.83342 13.8534 9.97723 14.4663 11.1966 14.6488C11.7779 14.7349 12.3257 14.5544 12.7412 14.1388L14.2062 12.6738C14.4538 12.4261 14.8484 12.4177 15.1065 12.6549L17.5578 14.9259C17.6963 15.0539 17.7614 15.2008 17.7656 15.3897C17.7698 15.5785 17.709 15.7276 17.5747 15.8619ZM18.3428 14.0779L15.8914 11.8069C15.1779 11.1457 14.0781 11.1667 13.3897 11.8552L11.9227 13.3223C11.7695 13.4755 11.5827 13.5364 11.3687 13.5049C10.3907 13.358 9.45254 12.8459 8.49341 11.9349C8.485 11.9287 8.47872 11.9202 8.47031 11.9118C7.56155 10.9547 7.04946 10.0144 6.90257 9.03849C6.87109 8.82439 6.93195 8.6376 7.08518 8.48229L8.5522 7.01728C9.2406 6.32883 9.2616 5.22902 8.59837 4.51331L6.32966 2.06182C5.98758 1.69451 5.54055 1.49304 5.03893 1.48462C4.53735 1.47624 4.08401 1.65672 3.72725 2.01354L1.96638 3.77452C1.83836 3.90256 1.73971 4.0348 1.65368 4.19431C1.24444 4.95199 1.08073 5.8776 1.16679 6.93962C1.24023 7.85682 1.49628 8.86008 1.92863 9.91793C2.70726 11.8279 3.9854 13.742 5.34746 15.035C5.35794 15.0434 5.36425 15.0497 5.37263 15.0581C6.66546 16.4202 8.57737 17.7006 10.4872 18.4792C11.5471 18.9095 12.5482 19.1656 13.4653 19.2411C13.6479 19.2558 13.8263 19.2621 14.0005 19.2621C14.8421 19.2621 15.5829 19.0921 16.2105 18.7542C16.37 18.6681 16.5043 18.5695 16.6323 18.4415L18.3931 16.6784C18.7478 16.3237 18.9304 15.8704 18.922 15.3687C18.9115 14.8649 18.7122 14.42 18.3428 14.0779Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <div class="tg-header-contact-number d-none d-xl-block">
                                <span>Call Us:</span>
                                <a href="tel:+123595966">+123 5959 66</a>
                            </div>
                        </div>
                        <div class="tg-header-cart p-relative ml-20 pl-20 d-none d-xl-block">
                            <span class="tg-header-border"></span>
                            <button class="cart-button">
                                <span>
                                    <svg width="27" height="27" viewBox="0 0 27 27" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_53_138)">
                                            <path
                                                d="M11.1267 24.5359C11.1275 24.8398 11.0358 25.1371 10.8633 25.3903C10.6907 25.6434 10.4451 25.8411 10.1573 25.9583C9.86959 26.0755 9.55267 26.107 9.24659 26.0487C8.94051 25.9905 8.65899 25.8452 8.4376 25.6312C8.21621 25.4171 8.06486 25.144 8.00268 24.8462C7.9405 24.5484 7.97027 24.2393 8.08823 23.958C8.20619 23.6766 8.40706 23.4357 8.66546 23.2655C8.92385 23.0954 9.2282 23.0037 9.54005 23.002H9.55264C9.97012 23.002 10.3705 23.1636 10.6657 23.4512C10.9609 23.7389 11.1267 24.1291 11.1267 24.5359ZM19.6269 23.002H19.6143C19.1957 23.0036 18.7948 23.167 18.4997 23.4563C18.2046 23.7456 18.0393 24.1372 18.0402 24.5451C18.041 24.953 18.2079 25.344 18.5042 25.6321C18.8005 25.9203 19.202 26.0821 19.6206 26.0821C20.0392 26.0821 20.4407 25.9203 20.7369 25.6321C21.0332 25.344 21.2001 24.953 21.2009 24.5451C21.2018 24.1372 21.0365 23.7456 20.7414 23.4563C20.4463 23.167 20.0455 23.0036 19.6269 23.002ZM25.5266 9.18654L24.2497 16.7532C24.2179 17.3062 24.0702 17.8469 23.8155 18.342C23.5609 18.837 23.2047 19.276 22.7691 19.6316C22.3335 19.9872 21.8276 20.252 21.2828 20.4096C20.738 20.5671 20.1658 20.6141 19.6017 20.5476H9.19249C8.36008 20.5442 7.55653 20.2499 6.9278 19.7183C6.29907 19.1866 5.88685 18.4529 5.766 17.6503L3.86072 4.68407C3.80569 4.31993 3.61877 3.987 3.33376 3.7455C3.04874 3.50399 2.68445 3.36984 2.30677 3.36732H1.9718C1.72132 3.36732 1.48109 3.27035 1.30397 3.09775C1.12685 2.92515 1.02734 2.69105 1.02734 2.44695C1.02734 2.20285 1.12685 1.96875 1.30397 1.79614C1.48109 1.62354 1.72132 1.52657 1.9718 1.52657H2.30677C3.13918 1.53002 3.94272 1.82428 4.57146 2.35592C5.20019 2.88756 5.61241 3.62131 5.73326 4.42391L5.84911 5.20807H22.1202C22.6275 5.208 23.1286 5.31654 23.5881 5.52602C24.0476 5.73549 24.4542 6.04078 24.7793 6.4203C25.1044 6.79981 25.3399 7.24429 25.4692 7.7223C25.5986 8.2003 25.6173 8.70017 25.5266 9.18654ZM23.3279 7.60104C23.1805 7.42831 22.9959 7.2893 22.7872 7.19387C22.5785 7.09843 22.3508 7.04891 22.1202 7.04881H6.1186L7.62973 17.3901C7.68498 17.7557 7.87318 18.0898 8.16003 18.3315C8.44688 18.5732 8.81329 18.7064 9.19249 18.7069H19.6017C21.6165 18.7069 22.1026 17.9706 22.3884 16.4403L23.6654 8.87238C23.7089 8.64933 23.7012 8.41965 23.6429 8.19984C23.5845 7.98002 23.477 7.77552 23.3279 7.60104ZM17.7128 11.9575H12.6756C12.4252 11.9575 12.1849 12.0544 12.0078 12.227C11.8307 12.3997 11.7312 12.6338 11.7312 12.8778C11.7312 13.1219 11.8307 13.356 12.0078 13.5287C12.1849 13.7013 12.4252 13.7982 12.6756 13.7982H17.7128C17.9632 13.7982 18.2035 13.7013 18.3806 13.5287C18.5577 13.356 18.6572 13.1219 18.6572 12.8778C18.6572 12.6338 18.5577 12.3997 18.3806 12.227C18.2035 12.0544 17.9632 11.9575 17.7128 11.9575Z"
                                                fill="currentColor" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_53_1238">
                                                <rect width="26" height="26" fill="white"
                                                    transform="translate(0.304688 0.804352)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </span>
                                <span class="tg-header-cart-count">0</span>
                            </button>
                            <div class="minicart">
                                <div class="cart-content-wrap d-flex align-items-center justify-content-between">
                                    <div class="cart-img-info d-flex align-items-center">
                                        <div class="cart-thumb">
                                            <a href="shop.html"> <img src="assets/img/shop/sm-product-1.jpg"
                                                    alt=""></a>
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
                                            <a href="shop.html"> <img src="assets/img/shop/sm-product-2.jpg"
                                                    alt=""></a>
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
                        <div class="tg-header-btn ml-20 d-none d-sm-block">
                            <a class="tg-btn-header" href="login.html">
                                <span>
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.7 17.2C1.5 17.2 1.3 17.1 1.2 17C1.1 16.8 1 16.7 1 16.5C1 15.1 1.4 13.7 2.1 12.4C2.8 11.2 3.9 10.1 5.1 9.4C4.6 8.8 4.2 8 4 7.2C3.9 6.4 3.9 5.5 4.1 4.8C4.3 4 4.8 3.2 5.3 2.6C5.9 2 6.6 1.5 7.3 1.3C7.9 1.1 8.5 1 9.1 1C9.3 1 9.6 1 9.8 1C10.6 1.1 11.4 1.4 12.1 1.9C12.8 2.4 13.3 3 13.7 3.7C14.1 4.4 14.3 5.2 14.3 6.1C14.3 7.3 13.9 8.5 13.1 9.4C13.7 9.8 14.3 10.2 14.9 10.7C15.7 11.5 16.2 12.3 16.7 13.3C17.1 14.3 17.3 15.3 17.3 16.4C17.3 16.6 17.2 16.8 17.1 16.9C17 17 16.8 17.1 16.6 17.1C16.5 17.1 16.4 17.1 16.3 17C16.2 17 16.1 16.9 16.1 16.8C16 16.7 16 16.7 15.9 16.6C15.9 16.5 15.8 16.4 15.8 16.3C15.8 15.4 15.6 14.6 15.3 13.8C15 13 14.5 12.3 13.8 11.7C13.2 11.2 12.6 10.7 11.9 10.4C11.1 10.9 10.2 11.2 9.1 11.2C8.1 11.2 7.1 10.9 6.3 10.4C5.2 10.9 4.2 11.7 3.5 12.8C2.8 13.9 2.4 15.1 2.4 16.4C2.4 16.6 2.3 16.8 2.2 16.9C2.1 17.1 1.9 17.2 1.7 17.2ZM9.1 2.5C8.4 2.5 7.7 2.7 7.1 3.1C6.4 3.5 6 4.1 5.7 4.7C5.4 5.4 5.3 6.1 5.5 6.9C5.6 7.6 6 8.3 6.5 8.8C7 9.3 7.7 9.7 8.4 9.8C8.6 9.8 8.9 9.9 9.1 9.9C9.6 9.9 10.1 9.8 10.5 9.6C11.2 9.3 11.7 8.9 12.2 8.2C12.6 7.6 12.8 6.9 12.8 6.2C12.8 5.2 12.4 4.3 11.7 3.6C11 2.8 10.1 2.5 9.1 2.5Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                Login
                            </a>
                        </div>
                        <div class="tg-header-menu-bar lh-1 p-relative ml-20 pl-20">
                            <span class="tg-header-border d-none d-xl-block"></span>
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

    <!-- Mobile Menu  -->
    <div class="tgmobile__menu">
        <nav class="tgmobile__menu-box">
            <div class="close-btn"><i class="fa-solid fa-xmark"></i></div>
            <div class="nav-logo">
                <a href="index.html"><img src="assets/img/logo/logo-green.png" alt="logo"></a>
            </div>
            <div class="tgmobile__search">
                <form action="#">
                    <input type="text" placeholder="Search here...">
                    <button><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="tgmobile__menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
            <div class="social-links">
                <ul class="list-wrap">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="tgmobile__menu-backdrop"></div>
    <!-- End Mobile Menu -->

    <!-- offCanvas-menu -->
    <div class="offCanvas__info">
        <div class="offCanvas__close-icon menu-close">
            <button><i class="fa-sharp fa-regular fa-xmark"></i></button>
        </div>
        <div class="offCanvas__logo mb-30">
            <a href="index.html"><img src="assets/img/logo/logo-green.png" alt="Logo"></a>
        </div>
        <div class="offCanvas__side-info mb-30">
            <div class="contact-list mb-30">
                <h4>Office Address</h4>
                <p>123/A, Miranda City Likaoli <br> Prikano, Dope</p>
            </div>
            <div class="contact-list mb-30">
                <h4>Phone Number</h4>
                <p>+0989 7876 9865 9</p>
                <p>+(090) 8765 86543 85</p>
            </div>
            <div class="contact-list mb-30">
                <h4>Email Address</h4>
                <p>info@example.com</p>
                <p>example.mail@hum.com</p>
            </div>
        </div>
        <div class="offCanvas__social-icon mt-30">
            <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
            <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
            <a href="javascript:void(0)"><i class="fab fa-google-plus-g"></i></a>
            <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
    <div class="offCanvas__overly"></div>
    <!-- offCanvas-menu-end -->

</header>

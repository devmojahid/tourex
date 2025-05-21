{!! wp_nav_menu([
    'theme_location' => 'primary_menu',
    'menu_class' => 'navigation',
    'container' => false,
    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'menu_id' => 'main-nav',
    'before' => '',
    'after' => '',
    'link_before' => '',
    'link_after' => ''
]) !!}
<ul class="navigation d-none">
    @if ($general_setting->selected_theme == 'all_theme')
        <li class="menu-item-has-children">
            <a href="{{ route('home') }}">{{ __('translate.Home') }}</a>
            <ul class="sub-menu">

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
    <li class="menu-item-has-children">
        <a href="javascript:void(0)">{{ __('translate.Pages') }}</a>
        <ul class="sub-menu">
            <li>
                <a
                    href="{{ route('about-us') }}">{{ __('translate.About Us') }}</a>
            </li>
            <li>
                <a
                    href="{{ route('privacy-policy') }}">{{ __('translate.Privacy Policy') }}</a>
            </li>
            <li>
                <a
                    href="{{ route('terms-conditions') }}">{{ __('translate.Terms & Conditions') }}</a>
            </li>
            <li>
                <a href="{{ route('faq') }}">{{ __('translate.FAQ') }}</a>
            </li>
            @foreach ($custom_pages as $custom_page)
                <li>
                    <a
                        href="{{ route('custom-page', $custom_page->slug) }}">{{ $custom_page->page_name }}</a>
                </li>
            @endforeach
        </ul>
    </li>

    @if ($general_setting->blog_theme == 'with_sidebar')
        <li><a
                href="{{ route('blogs', ['page_view' => 'blogs_with_sidebar']) }}">{{ __('translate.Blogs') }}</a>
        </li>
    @elseif ($general_setting->blog_theme == 'without_sidebar')
        <li><a href="{{ route('blogs') }}">{{ __('translate.Blogs') }}</a></li>
    @else
        <li class="menu-item-has-children">
            <a href="javascript:void(0)">{{ __('translate.Blogs') }}</a>
            <ul class="sub-menu">
                <li><a href="{{ route('blogs') }}">{{ __('translate.Blogs') }}</a>
                </li>
                <li><a
                        href="{{ route('blogs', ['page_view' => 'blogs_with_sidebar']) }}">{{ __('translate.Blog With Sidebar') }}</a>
                </li>
            </ul>
        </li>
    @endif
    <li>
        <a href="{{ route('contact-us') }}">{{ __('translate.Contact Us') }}</a>
    </li>
</ul>

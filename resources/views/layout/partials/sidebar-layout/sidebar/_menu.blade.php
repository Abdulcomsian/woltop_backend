<!--begin::sidebar menu-->
<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
	<!--begin::Menu wrapper-->
	<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
		<!--begin::Menu-->
        <div class="menu menu-column menu-rounded menu-sub-indention px-3 fw-semibold fs-6" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
    <!--begin:Menu item-->
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('dashboard') ? 'here show' : '' }}">
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <span class="menu-icon"><i class="fa-solid fa-house"></i></span>
                <span class="menu-title">Dashboard</span>
            </a>
            <!--end:Menu link-->
        </div>
    </div>
    <!--end:Menu item-->

    <!--begin:Menu item-->
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('order.index') ? 'here show' : '' }}">
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ request()->routeIs('order.index') ? 'active' : '' }}" href="{{ route('order.index') }}">
                <span class="menu-icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </span>
                <span class="menu-title">Orders</span>
            </a>
            <!--end:Menu link-->
        </div>
    </div>
    <!--end:Menu item-->

    <!--begin:Menu item-->
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('parent-category.index') ? 'here show' : '' }}">
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ request()->routeIs('parent-category.index') ? 'active' : '' }}" href="{{ route('parent-category.index') }}">
                <span class="menu-icon"><i class="fa-solid fa-sitemap"></i></span>
                <span class="menu-title">Parent Categories</span>
            </a>
            <!--end:Menu link-->
        </div>
    </div>
    <!--end:Menu item-->

    <!--begin:Menu item-->
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('category.index') ? 'here show' : '' }}">
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ request()->routeIs('category.index') ? 'active' : '' }}" href="{{ route('category.index') }}">
                <span class="menu-icon"><i class="fa-solid fa-tags"></i></span>
                <span class="menu-title">Categories</span>
            </a>
            <!--end:Menu link-->
        </div>
    </div>
    <!--end:Menu item-->

    <!--begin:Menu item-->
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('attribute.*') || request()->routeIs('attributevalue.*') ? 'here show' : '' }}">
        <!--begin:Menu link-->
        <span class="menu-link">
            <span class="menu-icon">
                <i class="fa-brands fa-creative-commons-by"></i>
            </span>
            <span class="menu-title">Manage Attributes</span>
            <span class="menu-arrow"></span> <!-- Arrow for the submenu -->
        </span>
        <!--end:Menu link-->

        <!--begin:Menu sub-->
        <div class="menu-sub menu-sub-accordion">
            <!--begin:Submenu item-->
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('attribute.index') ? 'active' : '' }}" href="{{ route('attribute.index') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Attributes</span>
                </a>
            </div>
            <!--end:Submenu item-->

            <!--begin:Submenu item-->
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('attributevalue.index') ? 'active' : '' }}" href="{{ route('attributevalue.index') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Attribute Values</span>
                </a>
            </div>
            <!--end:Submenu item-->
        </div>
        <!--end:Menu sub-->
    </div>
    <!--end:Menu item-->


    <!--begin:Menu item-->
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('product.index') ? 'here show' : '' }}">
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ request()->routeIs('product.index') ? 'active' : '' }}" href="{{ route('product.index') }}">
                <span class="menu-icon"><i class="fa-solid fa-cube"></i></span>
                <span class="menu-title">Manage Products</span>
            </a>
            <!--end:Menu link-->
        </div>
    </div>
    <!--end:Menu item-->

    <!--begin:Menu item-->
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('delivery.index') ? 'here show' : '' }}">
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ request()->routeIs('delivery.index') ? 'active' : '' }}" href="{{ route('delivery.index') }}">
                <span class="menu-icon"><i class="fas fa-shipping-fast"></i></span>
                <span class="menu-title">Delivery Details</span>
            </a>
            <!--end:Menu link-->
        </div>
    </div>
    <!--end:Menu item-->

    <!--begin:Menu item-->
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('reel.index') ? 'here show' : '' }}">
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ request()->routeIs('reel.index') ? 'active' : '' }}" href="{{ route('reel.index') }}">
                <span class="menu-icon"><i class="fa-solid fa-film"></i></span>
                <span class="menu-title">Manage Reels</span>
            </a>
            <!--end:Menu link-->
        </div>
    </div>
    <!--end:Menu item-->
     <!--begin:Menu item-->
     <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('team.index') ? 'here show' : '' }}">
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ request()->routeIs('team.index') ? 'active' : '' }}" href="{{ route('team.index') }}">
                <span class="menu-icon"><i class="fa-solid fa-people-group"></i></span>
                <span class="menu-title">Manage Teams</span>
            </a>
            <!--end:Menu link-->
        </div>
    </div>
    <!--end:Menu item-->

    <!--begin:Menu item-->
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('blog.index') ? 'here show' : '' }}">
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ request()->routeIs('blog.index') ? 'active' : '' }}" href="{{ route('blog.index') }}">
                <span class="menu-icon"><i class="fa-brands fa-blogger"></i></span>
                <span class="menu-title">Manage Blogs</span>
            </a>
            <!--end:Menu link-->
        </div>
    </div>
    <!--end:Menu item-->

    <!--begin:Menu item-->
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('faq.index') ? 'here show' : '' }}">
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ request()->routeIs('faq.index') ? 'active' : '' }}" href="{{ route('faq.index') }}">
                <span class="menu-icon"><i class="fas fa-question"></i></span>
                <span class="menu-title">Manage FAQs</span>
            </a>
            <!--end:Menu link-->
        </div>
    </div>
    <!--end:Menu item-->

    <!--begin:Menu item-->
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('user.index') ? 'here show' : '' }}">
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ request()->routeIs('user.index') ? 'active' : '' }}" href="{{ route('user.index') }}">
                <span class="menu-icon"><i class="fa-solid fa-users"></i></span>
                <span class="menu-title">Users</span>
            </a>
            <!--end:Menu link-->
        </div>
    </div>
    <!--end:Menu item-->

    {{-- <!--begin:Menu item-->
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('dashboard') ? 'here show' : '' }}">
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <span class="menu-icon"><i class="fa-solid fa-user-circle"></i></span>
                <span class="menu-title">Profile</span>
            </a>
            <!--end:Menu link-->
        </div>
    </div>
    <!--end:Menu item--> --}}
</div>
		<!--end::Menu-->
	</div>
	<!--end::Menu wrapper-->
</div>
<!--end::sidebar menu-->

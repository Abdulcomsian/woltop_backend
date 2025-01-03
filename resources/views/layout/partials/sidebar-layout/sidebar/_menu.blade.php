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
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('product.index') ? 'here show' : '' }}">
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ request()->routeIs('product.index') ? 'active' : '' }}" href="{{ route('product.index') }}">
                <span class="menu-icon"><i class="fa-solid fa-cube"></i></span>
                <span class="menu-title">Products</span>
            </a>
            <!--end:Menu link-->
        </div>
    </div>
    <!--end:Menu item-->

    <!--begin:Menu item-->
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('users') ? 'here show' : '' }}">
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <span class="menu-icon"><i class="fa-solid fa-users"></i></span>
                <span class="menu-title">Users</span>
            </a>
            <!--end:Menu link-->
        </div>
    </div>
    <!--end:Menu item-->

    <!--begin:Menu item-->
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
    <!--end:Menu item-->
</div>
		<!--end::Menu-->
	</div>
	<!--end::Menu wrapper-->
</div>
<!--end::sidebar menu-->

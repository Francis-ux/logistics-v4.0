<div class="sidenav-menu">

    <!-- Brand Logo -->
    <a href="/" class="logo">
        <img src="{{ asset(config('assets.logo')) }}" width="200" alt="logo">
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <button class="button-sm-hover">
        <i class="ti ti-circle align-middle"></i>
    </button>

    <!-- Full Sidebar Menu Close Button -->
    <button class="button-close-fullsidebar">
        <i class="ti ti-x align-middle"></i>
    </button>

    <div data-simplebar>
        <!--- Sidenav Menu -->
        <ul class="side-nav">
            <li class="side-nav-title">Dashboard</li>

            <x-master.sidebar-nav-link href="{{ route('master.dashboard') }}" :active="request()->routeIs('master.dashboard')"
                :icon="'ti ti-layout-dashboard'">Dashboard</x-master.sidebar-nav-link>

            <x-master.sidebar-nav-link href="{{ route('master.admin.index') }}" :active="request()->routeIs('master.admin.*')"
                :icon="'ti ti-users'">Admins</x-master.sidebar-nav-link>
        </ul>
    </div>
</div>

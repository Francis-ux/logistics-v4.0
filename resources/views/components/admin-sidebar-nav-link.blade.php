@props(['active' => false, 'icon' => ''])

<li class="side-nav-item">
    <a {{ $attributes }} class="side-nav-link {{ $active ? 'text-primary-emphasis bg-primary-subtle' : '' }}">
        <span class="menu-icon"><i class="{{ $icon }}"></i></span>
        <span class="menu-text"> {{ $slot }} </span>
    </a>
</li>

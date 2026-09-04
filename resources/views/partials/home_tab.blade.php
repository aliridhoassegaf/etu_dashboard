<div class="ax-tabs__list" style="max-width:320px;">
    <a href="{{ url('website-home') }}"
        class="ax-tabs__tab {{ ($title ?? '') === 'Home' ? 'is-active' : '' }}"
        style="flex:1;justify-content:center;">
        Home
    </a>

    <a href="{{ url('website-home-slider') }}"
        class="ax-tabs__tab {{ ($title ?? '') === 'Home Slider' ? 'is-active' : '' }}"
        style="flex:1;justify-content:center;">
        Home Slider
    </a>
</div>
<aside class="ax-sidebar" role="navigation" aria-label="Primary" x-data="axSidebar()" :data-collapsed="collapsed">
  <!-- ===== BRAND (aligns to header height) ===== -->
  <div class="ax-sidebar__brand">
    <a class="ax-sidebar__logo" href="/" aria-label="Vireo home">
      <span class="ax-sidebar__mark" aria-hidden="true">
        <img src="{{ asset('assets/img') }}/icon-express.png" style="max-width: 40px;">
      </span>
      <span class="ax-sidebar__wordmark">Express Group</span>
    </a>
  </div>

  <!-- ===== MENU FILTER (distinct from ⌘K) ===== -->
  <div class="ax-sidebar__search">
    <svg class="ax-icon ax-sidebar__search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
      stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
      <path d="M3 10a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
      <path d="M21 21l-6 -6" />
    </svg>
    <input type="search" class="ax-sidebar__filter" placeholder="Filter menu…" aria-label="Filter menu"
      @input.debounce.120ms="filter($event.target.value)" @keydown.escape="clearFilter()" x-ref="filter" />
    <button type="button" class="ax-sidebar__filter-clear" x-show="q" @click="clearFilter()" aria-label="Clear filter">
      <svg class="ax-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
        stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
        <path d="M18 6l-12 12" />
        <path d="M6 6l12 12" />
      </svg>
    </button>
  </div>

  <!-- ===== NAV TREE (only scrolling zone) ===== -->
  <nav class="ax-sidebar__nav" role="tree" aria-label="Main menu" @keydown="onTreeKey($event)" x-ref="tree">

    <p class="ax-sidebar__section" role="presentation">Main Menu</p>

    <!-- Single-link leaf (Widgets) -->
    <a class="ax-nav__item" role="treeitem" aria-level="1" href="#" tabindex="-1">
      <span class="ax-nav__bar" aria-hidden="true"></span>
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-chart-histogram">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M3 3v18h18" />
        <path d="M20 18v3" />
        <path d="M16 16v5" />
        <path d="M12 13v8" />
        <path d="M8 16v5" />
        <path d="M3 11c6 0 5 -5 9 -5s3 5 9 5" />
      </svg>
      <span class="ax-nav__label">Overview</span>
    </a>

    @php
        $isDriverActive = request()->is('user', 'user/*');
    @endphp

    <div class="custom-driver-menu" data-driver-menu>

        <button
            type="button"
            class="ax-nav__item ax-nav__item--parent {{ $isDriverActive ? 'ax-nav__item--trail' : '' }}"
            data-driver-toggle
            aria-expanded="{{ $isDriverActive ? 'true' : 'false' }}"
            tabindex="0"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
            >
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M5 7a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"/>
                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"/>
            </svg>

            <span class="ax-nav__label">Drivers</span>

            <svg
                class="ax-nav__caret ax-icon--directional"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.75"
                stroke-linecap="round"
                stroke-linejoin="round"
                width="24"
                height="24"
            >
                <path d="M9 6l6 6l-6 6"/>
            </svg>
        </button>

        {{-- Child --}}
        <div
            class="ax-nav__children custom-driver-panel"
            data-driver-panel
            {{ $isDriverActive ? '' : 'hidden' }}
        >

            <a
                class="ax-nav__item ax-nav__item--child {{ $isDriverActive ? 'ax-nav__item--active is-active' : '' }}"
                role="treeitem"
                aria-level="2"
                href="{{ url('user') }}"
                tabindex="{{ $isDriverActive ? '0' : '-1' }}"
                {{ $isDriverActive ? 'aria-current="page"' : '' }}
            >
                <span class="ax-nav__bar" aria-hidden="true"></span>
                <span class="ax-nav__label">Leads</span>
            </a>

        </div>

    </div>

    @php
        $isVehicleActive = request()->is('vehicle', 'vehicle/*');
        $isVehicleModelActive = request()->is('vehicle-model', 'vehicle-model/*');
        $isVehicleBrandActive = request()->is('vehicle-brand', 'vehicle-brand/*');
        $isVehicleSupplierActive = request()->is('vehicle-supplier', 'vehicle-supplier/*');

        $isVehicleMenuOpen =
            $isVehicleActive ||
            $isVehicleModelActive ||
            $isVehicleBrandActive ||
            $isVehicleSupplierActive;
    @endphp

    <div class="custom-driver-menu" data-driver-menu>

        <button
            type="button"
            class="ax-nav__item ax-nav__item--parent {{ $isVehicleMenuOpen ? 'ax-nav__item--trail' : '' }}"
            data-driver-toggle
            aria-expanded="{{ $isVehicleMenuOpen ? 'true' : 'false' }}"
            tabindex="0"
        >
            <svg xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-car">

                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 17a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                <path d="M15 17a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                <path d="M5 17h-2v-6l2 -5h9l4 5h1a2 2 0 0 1 2 2v4h-2m-4 0h-6m-6 -6h15m-6 0v-5" />
            </svg>

            <span class="ax-nav__label">Vehicles</span>

            <svg
                class="ax-nav__caret ax-icon--directional"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.75"
                stroke-linecap="round"
                stroke-linejoin="round"
                width="24"
                height="24"
            >
                <path d="M9 6l6 6l-6 6"/>
            </svg>
        </button>


        {{-- Child --}}
        <div
            class="ax-nav__children custom-driver-panel"
            data-driver-panel
            {{ $isVehicleMenuOpen ? '' : 'hidden' }}
        >

            {{-- Vehicles --}}
            <a
                class="ax-nav__item ax-nav__item--child {{ $isVehicleActive ? 'ax-nav__item--active is-active' : '' }}"
                role="treeitem"
                aria-level="2"
                href="{{ url('vehicle') }}"
                tabindex="{{ $isVehicleActive ? '0' : '-1' }}"
                {{ $isVehicleActive ? 'aria-current="page"' : '' }}
            >
                <span class="ax-nav__bar" aria-hidden="true"></span>
                <span class="ax-nav__label">Vehicles</span>
            </a>


            {{-- Vehicle Models --}}
            <a
                class="ax-nav__item ax-nav__item--child {{ $isVehicleModelActive ? 'ax-nav__item--active is-active' : '' }}"
                role="treeitem"
                aria-level="2"
                href="{{ url('vehicle-model') }}"
                tabindex="{{ $isVehicleModelActive ? '0' : '-1' }}"
                {{ $isVehicleModelActive ? 'aria-current="page"' : '' }}
            >
                <span class="ax-nav__bar" aria-hidden="true"></span>
                <span class="ax-nav__label">Vehicle Models</span>
            </a>


            {{-- Vehicle Brands --}}
            <a
                class="ax-nav__item ax-nav__item--child {{ $isVehicleBrandActive ? 'ax-nav__item--active is-active' : '' }}"
                role="treeitem"
                aria-level="2"
                href="{{ url('vehicle-brand') }}"
                tabindex="{{ $isVehicleBrandActive ? '0' : '-1' }}"
                {{ $isVehicleBrandActive ? 'aria-current="page"' : '' }}
            >
                <span class="ax-nav__bar" aria-hidden="true"></span>
                <span class="ax-nav__label">Vehicle Brands</span>
            </a>


            {{-- Vehicle Suppliers --}}
            <a
                class="ax-nav__item ax-nav__item--child {{ $isVehicleSupplierActive ? 'ax-nav__item--active is-active' : '' }}"
                role="treeitem"
                aria-level="2"
                href="{{ url('vehicle-supplier') }}"
                tabindex="{{ $isVehicleSupplierActive ? '0' : '-1' }}"
                {{ $isVehicleSupplierActive ? 'aria-current="page"' : '' }}
            >
                <span class="ax-nav__bar" aria-hidden="true"></span>
                <span class="ax-nav__label">Vehicle Suppliers</span>
            </a>

        </div>

    </div>

    {{-- <div class="ax-nav__group" data-ax-collapse>
      <button type="button" class="ax-nav__item ax-nav__item--parent" role="treeitem" aria-level="1"
        aria-expanded="true" data-ax-group="vehicles" @click="toggle('vehicles')" tabindex="0">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
          class="icon icon-tabler icons-tabler-outline icon-tabler-car">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M5 17a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
          <path d="M15 17a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
          <path d="M5 17h-2v-6l2 -5h9l4 5h1a2 2 0 0 1 2 2v4h-2m-4 0h-6m-6 -6h15m-6 0v-5" />
        </svg>
        <span class="ax-nav__label">Vehicles</span>
        <svg class="ax-nav__caret ax-icon--directional" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
          <path d="M9 6l6 6l-6 6" />
        </svg>
      </button>
      <div class="ax-nav__children" role="group" data-ax-collapse-panel>
        <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="2" href="{{ url("vehicle") }}"
          tabindex="-1">
          <span class="ax-nav__bar" aria-hidden="true"></span><span class="ax-nav__label">Vehicles</span>
        </a>
        <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="2" href="{{ url("vehicle-model") }}"
          tabindex="-1">
          <span class="ax-nav__bar" aria-hidden="true"></span><span class="ax-nav__label">Vehicle Models</span>
        </a>
        <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="2" href="{{ url("vehicle-brand") }}"
          tabindex="-1">
          <span class="ax-nav__bar" aria-hidden="true"></span><span class="ax-nav__label">Vehicle Brands</span>
        </a>
        <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="2" href="{{ url("vehicle-supplier") }}"
          tabindex="-1">
          <span class="ax-nav__bar" aria-hidden="true"></span><span class="ax-nav__label">Vehicle Suppliers</span>
        </a>
      </div>
    </div> --}}

    <a class="ax-nav__item" role="treeitem" aria-level="1" href="{{ url('assignment') }}" tabindex="-1">
      <span class="ax-nav__bar" aria-hidden="true"></span>
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-user-key">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
        <path d="M6 21v-2a4 4 0 0 1 4 -4h5" />
        <path d="M18.5 18.5l-3.5 3.5l-1.5 -1.5" />
        <path d="M18.554 18.414a2 2 0 1 1 2.828 -2.828a2 2 0 0 1 -2.828 2.828" />
        <path d="M16 19l1 1" />
      </svg>
      <span class="ax-nav__label">Assignment</span>
    </a>
    
    <div class="ax-nav__group" data-ax-collapse>
      <button type="button" class="ax-nav__item ax-nav__item--parent" role="treeitem" aria-level="1"
        aria-expanded="true" data-ax-group="payments" @click="toggle('payments')" tabindex="0">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
          class="icon icon-tabler icons-tabler-outline icon-tabler-cash-register">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path
            d="M21 15h-2.5c-.398 0 -.779 .158 -1.061 .439c-.281 .281 -.439 .663 -.439 1.061c0 .398 .158 .779 .439 1.061c.281 .281 .663 .439 1.061 .439h1c.398 0 .779 .158 1.061 .439c.281 .281 .439 .663 .439 1.061c0 .398 -.158 .779 -.439 1.061c-.281 .281 -.663 .439 -1.061 .439h-2.5" />
          <path d="M19 21v1m0 -8v1" />
          <path
            d="M13 21h-7c-.53 0 -1.039 -.211 -1.414 -.586c-.375 -.375 -.586 -.884 -.586 -1.414v-10c0 -.53 .211 -1.039 .586 -1.414c.375 -.375 .884 -.586 1.414 -.586h2m12 3.12v-1.12c0 -.53 -.211 -1.039 -.586 -1.414c-.375 -.375 -.884 -.586 -1.414 -.586h-2" />
          <path
            d="M16 10v-6c0 -.53 -.211 -1.039 -.586 -1.414c-.375 -.375 -.884 -.586 -1.414 -.586h-4c-.53 0 -1.039 .211 -1.414 .586c-.375 .375 -.586 .884 -.586 1.414v6m8 0h-8m8 0h1m-9 0h-1" />
          <path d="M8 14v.01" />
          <path d="M8 17v.01" />
          <path d="M12 13.99v.01" />
          <path d="M12 17v.01" />
        </svg>
        <span class="ax-nav__label">Payments</span>
        <svg class="ax-nav__caret ax-icon--directional" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
          <path d="M9 6l6 6l-6 6" />
        </svg>
      </button>
    </div>

    <div class="ax-nav__group" data-ax-collapse>
      <button type="button" class="ax-nav__item ax-nav__item--parent" role="treeitem" aria-level="1"
        aria-expanded="true" data-ax-group="checkpoints" @click="toggle('checkpoints')" tabindex="0">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
          class="icon icon-tabler icons-tabler-outline icon-tabler-checklist">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M9.615 20h-2.615a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8" />
          <path d="M14 19l2 2l4 -4" />
          <path d="M9 8h4" />
          <path d="M9 12h2" />
        </svg>
        <span class="ax-nav__label">Checkpoints</span>
        <svg class="ax-nav__caret ax-icon--directional" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
          <path d="M9 6l6 6l-6 6" />
        </svg>
      </button>
    </div>

    <div class="ax-nav__group" data-ax-collapse>
      <button type="button" class="ax-nav__item ax-nav__item--parent" role="treeitem" aria-level="1"
        aria-expanded="true" data-ax-group="gps" @click="toggle('gps')" tabindex="0">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
          class="icon icon-tabler icons-tabler-outline icon-tabler-gps">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
          <path d="M12 17l-1 -4l-4 -1l9 -4l-4 9" />
        </svg>
        <span class="ax-nav__label">GPS</span>
        <svg class="ax-nav__caret ax-icon--directional" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
          <path d="M9 6l6 6l-6 6" />
        </svg>
      </button>
    </div>

    <!-- Authentication (nested 2 levels) -->
    <div class="ax-nav__group" data-ax-collapse>
      <button type="button" class="ax-nav__item ax-nav__item--parent" role="treeitem" aria-level="1"
        aria-expanded="false" data-ax-group="website" @click="toggle('website')" tabindex="-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
          class="icon icon-tabler icons-tabler-outline icon-tabler-world-www">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M19.5 7a9 9 0 0 0 -7.5 -4a8.991 8.991 0 0 0 -7.484 4" />
          <path d="M11.5 3a16.989 16.989 0 0 0 -1.826 4" />
          <path d="M12.5 3a16.989 16.989 0 0 1 1.828 4" />
          <path d="M19.5 17a9 9 0 0 1 -7.5 4a8.991 8.991 0 0 1 -7.484 -4" />
          <path d="M11.5 21a16.989 16.989 0 0 1 -1.826 -4" />
          <path d="M12.5 21a16.989 16.989 0 0 0 1.828 -4" />
          <path d="M2 10l1 4l1.5 -4l1.5 4l1 -4" />
          <path d="M17 10l1 4l1.5 -4l1.5 4l1 -4" />
          <path d="M9.5 10l1 4l1.5 -4l1.5 4l1 -4" />
        </svg>
        <span class="ax-nav__label">Website</span>
        <svg class="ax-nav__caret ax-icon--directional" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
          <path d="M9 6l6 6l-6 6" />
        </svg>
      </button>
      <div class="ax-nav__children" role="group" data-ax-collapse-panel hidden>
        <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="2" href="{{ url("website-home") }}"
          tabindex="-1">
          <span class="ax-nav__bar" aria-hidden="true"></span><span class="ax-nav__label">Home</span>
        </a>
        <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="2" href="#"
          tabindex="-1">
          <span class="ax-nav__bar" aria-hidden="true"></span><span class="ax-nav__label">About</span>
        </a>
        <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="2" href="#"
          tabindex="-1">
          <span class="ax-nav__bar" aria-hidden="true"></span><span class="ax-nav__label">Services</span>
        </a>
        <!-- L2 collapsible sub-groups -->
        <div class="ax-nav__group" data-ax-collapse>
          <button type="button" class="ax-nav__item ax-nav__item--parent ax-nav__item--child" role="treeitem"
            aria-level="2" aria-expanded="false" data-ax-group="governance" @click="toggle('governance')"
            tabindex="-1">
            <span class="ax-nav__label">Governance</span>
            <svg class="ax-nav__caret ax-icon--directional" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
              aria-hidden="true">
              <path d="M9 6l6 6l-6 6" />
            </svg>
          </button>
          <div class="ax-nav__children" role="group" data-ax-collapse-panel hidden>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="/src/html/auth/sign-in-basic.html" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">Corporate Governance</span></a>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="/src/html/auth/sign-in-cover.html" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">GCG Structure</span></a>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="/src/html/auth/sign-in-cover.html" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">Code of Ethics</span></a>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="/src/html/auth/sign-in-cover.html" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">Risk Management</span></a>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="/src/html/auth/sign-in-cover.html" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">Articles of Association</span></a>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="/src/html/auth/sign-in-cover.html" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">Whistleblowing System</span></a>
          </div>
        </div>
        <!-- L2 collapsible sub-groups -->
        <div class="ax-nav__group" data-ax-collapse>
          <button type="button" class="ax-nav__item ax-nav__item--parent ax-nav__item--child" role="treeitem"
            aria-level="2" aria-expanded="false" data-ax-group="investor_relations" @click="toggle('investor_relations')"
            tabindex="-1">
            <span class="ax-nav__label">Investor Relations</span>
            <svg class="ax-nav__caret ax-icon--directional" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
              aria-hidden="true">
              <path d="M9 6l6 6l-6 6" />
            </svg>
          </button>
          <div class="ax-nav__children" role="group" data-ax-collapse-panel hidden>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="/src/html/auth/sign-in-basic.html" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">Annual & Sustainability Reports</span></a>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="/src/html/auth/sign-in-cover.html" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">Financial Statements</span></a>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="/src/html/auth/sign-in-cover.html" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">Shareholder Information</span></a>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="/src/html/auth/sign-in-cover.html" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">General Meeting of Shareholders</span></a>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="/src/html/auth/sign-in-cover.html" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">Events & Presentations</span></a>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="/src/html/auth/sign-in-cover.html" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">Disclosure of Information</span></a>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="/src/html/auth/sign-in-cover.html" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">Capital Market Supporting Professionals</span></a>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="/src/html/auth/sign-in-cover.html" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">Prospectus</span></a>
          </div>
        </div>
        <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="2" href="#"
          tabindex="-1">
          <span class="ax-nav__bar" aria-hidden="true"></span><span class="ax-nav__label">Media & Information</span>
        </a>
        <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="2" href="#"
          tabindex="-1">
          <span class="ax-nav__bar" aria-hidden="true"></span><span class="ax-nav__label">Career</span>
        </a>
        <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="2" href="#"
          tabindex="-1">
          <span class="ax-nav__bar" aria-hidden="true"></span><span class="ax-nav__label">Contact Us</span>
        </a>
      </div>
    </div>

    <p class="ax-sidebar__section" role="presentation">Configuration</p>

    <div class="ax-nav__group" data-ax-collapse>
      <button type="button" class="ax-nav__item ax-nav__item--parent" role="treeitem" aria-level="1"
        aria-expanded="true" data-ax-group="settings" @click="toggle('settings')" tabindex="0">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
          class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path
            d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065" />
          <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
        </svg>
        <span class="ax-nav__label">Settings</span>
        <svg class="ax-nav__caret ax-icon--directional" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
          <path d="M9 6l6 6l-6 6" />
        </svg>
      </button>
    </div>

    <div class="ax-nav__group" data-ax-collapse>
      <button type="button" class="ax-nav__item ax-nav__item--parent" role="treeitem" aria-level="1"
        aria-expanded="true" data-ax-group="system_data" @click="toggle('system_data')" tabindex="0">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
          class="icon icon-tabler icons-tabler-outline icon-tabler-server-cog">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M3 7a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v2a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-2" />
          <path d="M12 20h-6a3 3 0 0 1 -3 -3v-2a3 3 0 0 1 3 -3h10.5" />
          <path d="M16 18a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
          <path d="M18 14.5v1.5" />
          <path d="M18 20v1.5" />
          <path d="M21.032 16.25l-1.299 .75" />
          <path d="M16.27 19l-1.3 .75" />
          <path d="M14.97 16.25l1.3 .75" />
          <path d="M19.733 19l1.3 .75" />
          <path d="M7 8v.01" />
          <path d="M7 16v.01" />
        </svg>
        <span class="ax-nav__label">System Data</span>
        <svg class="ax-nav__caret ax-icon--directional" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
          <path d="M9 6l6 6l-6 6" />
        </svg>
      </button>
      <div class="ax-nav__children" role="group" data-ax-collapse-panel>
        <!-- L2 collapsible sub-groups -->
        <div class="ax-nav__group" data-ax-collapse>
          <button type="button" class="ax-nav__item ax-nav__item--parent ax-nav__item--child" role="treeitem"
            aria-level="2" aria-expanded="false" data-ax-group="system_data_company" @click="toggle('system_data_company')"
            tabindex="-1">
            <span class="ax-nav__label">Company</span>
            <svg class="ax-nav__caret ax-icon--directional" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
              aria-hidden="true">
              <path d="M9 6l6 6l-6 6" />
            </svg>
          </button>
          <div class="ax-nav__children" role="group" data-ax-collapse-panel hidden>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="{{ url("company-pool") }}" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">Company Pool</span></a>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="{{ url("company-vehicle-rental-period") }}" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">Vehicle Rental Period</span></a>
          </div>
        </div>
        <!-- L2 collapsible sub-groups -->
        <div class="ax-nav__group" data-ax-collapse>
          <button type="button" class="ax-nav__item ax-nav__item--parent ax-nav__item--child" role="treeitem"
            aria-level="2" aria-expanded="false" data-ax-group="system_data_vehicle" @click="toggle('system_data_vehicle')"
            tabindex="-1">
            <span class="ax-nav__label">Vehicle</span>
            <svg class="ax-nav__caret ax-icon--directional" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
              aria-hidden="true">
              <path d="M9 6l6 6l-6 6" />
            </svg>
          </button>
          <div class="ax-nav__children" role="group" data-ax-collapse-panel hidden>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="{{ url("vehicle-color") }}" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">Vehicle Color</span></a>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="{{ url("vehicle-catalog") }}" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">Vehicle Catalog</span></a>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="{{ url("vehicle-type") }}" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">Vehicle Type</span></a>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="{{ url("vehicle-fuel") }}" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">Vehicle Fuel</span></a>
          </div>
        </div>
        <!-- L2 collapsible sub-groups -->
        <div class="ax-nav__group" data-ax-collapse>
          <button type="button" class="ax-nav__item ax-nav__item--parent ax-nav__item--child" role="treeitem"
            aria-level="2" aria-expanded="false" data-ax-group="system_data_driver" @click="toggle('system_data_driver')"
            tabindex="-1">
            <span class="ax-nav__label">Driver</span>
            <svg class="ax-nav__caret ax-icon--directional" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
              aria-hidden="true">
              <path d="M9 6l6 6l-6 6" />
            </svg>
          </button>
          <div class="ax-nav__children" role="group" data-ax-collapse-panel hidden>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="{{ url("user-education") }}" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">Education</span></a>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="{{ url("user-sim-type") }}" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">SIM Type</span></a>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="{{ url("user-lead-source") }}" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">Lead Source</span></a>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="{{ url("user-length-of-stay") }}" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">Length of Stay</span></a>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="{{ url("user-work-experience") }}" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">Work Experience</span></a>
            <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="3"
              href="{{ url("user-online-application") }}" tabindex="-1"><span class="ax-nav__bar"
                aria-hidden="true"></span><span class="ax-nav__label">Online Application</span></a>
          </div>
        </div>
      </div>
      
    </div>

    <a class="ax-nav__item" role="treeitem" aria-level="1" href="{{ url("integration") }}" tabindex="-1">
      <span class="ax-nav__bar" aria-hidden="true"></span>
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-ai-gateway">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M4 6.5a2.5 2.5 0 1 0 5 0a2.5 2.5 0 1 0 -5 0" />
        <path d="M15 6.5a2.5 2.5 0 1 0 5 0a2.5 2.5 0 1 0 -5 0" />
        <path d="M15 17.5a2.5 2.5 0 1 0 5 0a2.5 2.5 0 1 0 -5 0" />
        <path d="M4 17.5a2.5 2.5 0 1 0 5 0a2.5 2.5 0 1 0 -5 0" />
        <path d="M8.5 15.5l7 -7" />
      </svg>
      <span class="ax-nav__label">Integrations</span>
    </a>

    <div class="ax-nav__group" data-ax-collapse>
      <button type="button" class="ax-nav__item ax-nav__item--parent" role="treeitem" aria-level="1"
        aria-expanded="true" data-ax-group="admins" @click="toggle('admins')" tabindex="0">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-check">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
          <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
          <path d="M15 19l2 2l4 -4" />
        </svg>
        <span class="ax-nav__label">Admins</span>
        <svg class="ax-nav__caret ax-icon--directional" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
          <path d="M9 6l6 6l-6 6" />
        </svg>
      </button>
      <div class="ax-nav__children" role="group" data-ax-collapse-panel>
        <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="2" href="{{ url("admin") }}"
          tabindex="-1">
          <span class="ax-nav__bar" aria-hidden="true"></span><span class="ax-nav__label">Admin Users</span>
        </a>
        <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="2" href="{{ url("admin-role") }}"
          tabindex="-1"><span class="ax-nav__bar" aria-hidden="true"></span><span class="ax-nav__label">Admin
            Roles</span></a>
        <a class="ax-nav__item ax-nav__item--child" role="treeitem" aria-level="2" href="{{ url("admin-activity") }}"
          tabindex="-1"><span class="ax-nav__bar" aria-hidden="true"></span><span class="ax-nav__label">Admin
            Activities</span></a>
      </div>
    </div>


    <!-- Filter empty-state (revealed by nav.js when no matches) -->
    <p class="ax-sidebar__nav-empty" role="presentation" hidden>No menu items match your filter.</p>
  </nav>

  <!-- ===== FOOT: mini user card ===== -->
  <div class="ax-sidebar__foot">
    <div class="ax-sidebar__user">
      <img class="ax-avatar ax-sidebar__user-avatar" src="https://i.pravatar.cc/80?img=12" alt="" width="36"
        height="36" />
      <span class="ax-sidebar__user-meta">
        <b class="ax-sidebar__user-name">Ali Ridho</b>
        <small class="ax-sidebar__user-mail">aliridho@expressgroup.co.id</small>
      </span>
      <a class="ax-sidebar__logout" href="{{ url("admin-logout") }}" aria-label="Logout">
        <svg class="ax-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
          stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
          <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
          <path d="M9 12h12l-3 -3" />
          <path d="M18 15l3 -3" />
        </svg>
      </a>
    </div>
  </div>
</aside>
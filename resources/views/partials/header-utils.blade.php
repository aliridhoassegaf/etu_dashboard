{{-- ============================================================ --}}
{{-- VIREO HEADER UTILITY CLUSTER — items 4–11 + the responsive --}}
{{-- overflow shed. Shared VERBATIM by partials/header.blade.php --}}
{{-- (dashboard shell) and partials/app-bar.blade.php (full-screen --}}
{{-- app shell) so the two chromes can never drift. --}}
{{-- --}}
{{-- Both hosts provide the axHeader() x-data scope this markup --}}
{{-- relies on (toggleFullscreen/full, toggleTheme/theme, setLang). --}}
{{-- ============================================================ --}}

<!-- 5 · FULLSCREEN -->
<button type="button" class="ax-fullscreen ax-icon-btn" @click="toggleFullscreen()" :aria-pressed="full"
  aria-label="Toggle fullscreen">
  <svg class="ax-icon" x-show="!full" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
    stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
    <path d="M4 8v-2a2 2 0 0 1 2 -2h2" />
    <path d="M4 16v2a2 2 0 0 0 2 2h2" />
    <path d="M16 4h2a2 2 0 0 1 2 2v2" />
    <path d="M16 20h2a2 2 0 0 0 2 -2v-2" />
  </svg>
  <svg class="ax-icon" x-show="full" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
    stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
    <path d="M15 19v-2a2 2 0 0 1 2 -2h2" />
    <path d="M15 5v2a2 2 0 0 0 2 2h2" />
    <path d="M5 15h2a2 2 0 0 1 2 2v2" />
    <path d="M5 9h2a2 2 0 0 0 2 -2v-2" />
  </svg>
</button>

<!-- 7 · APP-GRID -->
<div class="ax-apps" x-data="axDropdown()" @keydown.escape="close()" @click.outside="close()">
  <button type="button" class="ax-icon-btn ax-apps__trigger" @click="toggle()" aria-haspopup="menu"
    :aria-expanded="open" aria-controls="ax-apps-menu" aria-label="Open apps">
    <svg class="ax-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
      stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
      <path d="M4 5a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1l0 -4" />
      <path d="M14 5a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1l0 -4" />
      <path d="M4 15a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1l0 -4" />
      <path d="M14 15a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1l0 -4" />
    </svg>
  </button>
  <div id="ax-apps-menu" class="ax-dropdown ax-apps__menu" role="menu" x-show="open" x-transition.opacity.duration.150ms
    x-cloak>
    <p class="ax-dropdown__head">Quick apps</p>
    <div class="ax-apps__grid">
      <a class="ax-apps__tile" role="menuitem" href="/apps/email"><span class="ax-apps__tile-icon"><svg class="ax-icon"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
            stroke-linejoin="round" width="24" height="24" aria-hidden="true">
            <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10" />
            <path d="M3 7l9 6l9 -6" />
          </svg></span><span class="ax-apps__tile-label">Email</span></a>
      <a class="ax-apps__tile" role="menuitem" href="/apps/chat"><span class="ax-apps__tile-icon"><svg class="ax-icon"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
            stroke-linejoin="round" width="24" height="24" aria-hidden="true">
            <path
              d="M3 20l1.3 -3.9c-2.324 -3.437 -1.426 -7.872 2.1 -10.374c3.526 -2.501 8.59 -2.296 11.845 .48c3.255 2.777 3.695 7.266 1.029 10.501c-2.666 3.235 -7.615 4.215 -11.574 2.293l-4.7 1" />
          </svg></span><span class="ax-apps__tile-label">Chat</span></a>
      <a class="ax-apps__tile" role="menuitem" href="/apps/calendar"><span class="ax-apps__tile-icon"><svg
            class="ax-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
            stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
            <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12" />
            <path d="M16 3v4" />
            <path d="M8 3v4" />
            <path d="M4 11h16" />
            <path d="M11 15h1" />
            <path d="M12 15v3" />
          </svg></span><span class="ax-apps__tile-label">Calendar</span></a>
      <a class="ax-apps__tile" role="menuitem" href="/apps/kanban"><span class="ax-apps__tile-icon"><svg class="ax-icon"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
            stroke-linejoin="round" width="24" height="24" aria-hidden="true">
            <path d="M4 4l6 0" />
            <path d="M14 4l6 0" />
            <path d="M4 10a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2l0 -8" />
            <path d="M14 10a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2l0 -2" />
          </svg></span><span class="ax-apps__tile-label">Kanban</span></a>
      <a class="ax-apps__tile" role="menuitem" href="/apps/file-manager"><span class="ax-apps__tile-icon"><svg
            class="ax-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
            stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
            <path d="M5 4h4l3 3h7a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2" />
          </svg></span><span class="ax-apps__tile-label">Files</span></a>
      <a class="ax-apps__tile" role="menuitem" href="/apps/contacts"><span class="ax-apps__tile-icon"><svg
            class="ax-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
            stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
            <path d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2" />
            <path d="M10 16h6" />
            <path d="M11 11a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
            <path d="M4 8h3" />
            <path d="M4 12h3" />
            <path d="M4 16h3" />
          </svg></span><span class="ax-apps__tile-label">Contacts</span></a>
      <a class="ax-apps__tile" role="menuitem" href="/ecommerce/invoices"><span class="ax-apps__tile-icon"><svg
            class="ax-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
            stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2" />
            <path d="M9 7l1 0" />
            <path d="M9 13l6 0" />
            <path d="M13 17l2 0" />
          </svg></span><span class="ax-apps__tile-label">Invoices</span></a>
      <a class="ax-apps__tile" role="menuitem" href="/apps/notes"><span class="ax-apps__tile-icon"><svg class="ax-icon"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
            stroke-linejoin="round" width="24" height="24" aria-hidden="true">
            <path d="M5 5a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2l0 -14" />
            <path d="M9 7l6 0" />
            <path d="M9 11l6 0" />
            <path d="M9 15l4 0" />
          </svg></span><span class="ax-apps__tile-label">Notes</span></a>
      <a class="ax-apps__tile" role="menuitem" href="/pages/pricing"><span class="ax-apps__tile-icon"><svg
            class="ax-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
            stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
            <path d="M9 3h3l2 2h5a2 2 0 0 1 2 2v7a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
          </svg></span><span class="ax-apps__tile-label">Pricing</span></a>
    </div>
    <a class="ax-dropdown__foot" href="/widgets">View all apps</a>
  </div>
</div>


<!-- 10 · PROFILE -->
<div class="ax-profile" x-data="axDropdown()" @keydown.escape="close()" @click.outside="close()">
  <button type="button" class="ax-profile__trigger" @click="toggle()" aria-haspopup="menu" :aria-expanded="open"
    aria-controls="ax-profile-menu" aria-label="Account menu">
    <span class="ax-avatar ax-avatar__initials"
      style="background:color-mix(in oklab,var(--ax-accent) 16%,transparent);color:var(--ax-accent);"><span
        class="ax-avatar__initials">AR</span>
  </button>
  <div id="ax-profile-menu" class="ax-dropdown ax-profile__menu" role="menu" x-show="open"
    x-transition.opacity.duration.150ms x-cloak>
    <div class="ax-profile__card">
      <button type="button" class="ax-profile__trigger" @click="toggle()" aria-haspopup="menu" :aria-expanded="open"
        aria-controls="ax-profile-menu" aria-label="Account menu">
        <span class="ax-avatar ax-avatar__initials"
          style="background:color-mix(in oklab,var(--ax-accent) 16%,transparent);color:var(--ax-accent);"><span
            class="ax-avatar__initials">AR</span>
      </button>
      <span class="ax-profile__card-meta"><b>{{ session('admin')['full_name'] }}</b><small>{{ session('admin')['email'] }}</small></span>
    </div>
    <a class="ax-dropdown__item" role="menuitem" href="{{ url("admin-profile") }}"><svg
        class="ax-icon ax-dropdown__lead" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
        stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
      </svg>My Profile</a>
    <a class="ax-dropdown__item" role="menuitem" href="/pages/profile-settings"><svg class="ax-icon ax-dropdown__lead"
        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
        stroke-linejoin="round" width="24" height="24" aria-hidden="true">
        <path
          d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065" />
        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
      </svg>Account Settings</a>
    <a class="ax-dropdown__item" role="menuitem" href="/pages/activity-log"><svg class="ax-icon ax-dropdown__lead"
        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
        stroke-linejoin="round" width="24" height="24" aria-hidden="true">
        <path d="M12 8l0 4l2 2" />
        <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" />
      </svg>Activity Log</a>
    <a class="ax-dropdown__item ax-dropdown__item--danger" role="menuitem" href="{{ url("admin-logout") }}"><svg
        class="ax-icon ax-dropdown__lead" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
        stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
        <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
        <path d="M9 12h12l-3 -3" />
        <path d="M18 15l3 -3" />
      </svg>Logout</a>
  </div>
</div>

<!-- 11 · CUSTOMIZER TRIGGER -->
<button type="button" class="ax-cog ax-icon-btn" data-ax-toggle="customizer" @click="$dispatch('ax-customizer-open')"
  aria-haspopup="dialog" aria-controls="ax-customizer" aria-label="Open theme customizer">
  <svg class="ax-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
    stroke-linejoin="round" width="24" height="24" aria-hidden="true">
    <path d="M4 10a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
    <path d="M6 4v4" />
    <path d="M6 12v8" />
    <path d="M10 16a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
    <path d="M12 4v10" />
    <path d="M12 18v2" />
    <path d="M16 7a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
    <path d="M18 4v1" />
    <path d="M18 9v11" />
  </svg>
</button>

<!-- OVERFLOW (mobile / tablet shed) -->
<div class="ax-overflow" x-data="axDropdown()" x-show="$store.ax && $store.ax.overflow && $store.ax.overflow.length"
  @keydown.escape="close()" @click.outside="close()" x-cloak>
  <button type="button" class="ax-icon-btn ax-overflow__trigger" @click="toggle()" aria-haspopup="menu"
    :aria-expanded="open" aria-controls="ax-overflow-menu" aria-label="More">
    <svg class="ax-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
      stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
      <path d="M11 12a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
      <path d="M11 19a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
      <path d="M11 5a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
    </svg>
  </button>
  <!-- The shed rows are STATIC (not JS-injected): they live inside the
         x-data="axHeader()" root, so `setLang` / `toggleFullscreen` / `full`
         resolve up the Alpine scope chain exactly like the header copies do.
         Every row carries data-ax-shed="<key>" and is revealed by the SAME
         breakpoint that hides its header trigger (shell.css §18 RESPONSIVE) —
         so exactly one copy of each control is ever interactive. Keep the two
         in sync: the keys mirror _bindBands() in js/vireo/alpine/index.js. -->
  <div id="ax-overflow-menu" class="ax-dropdown ax-overflow__menu" role="menu" x-show="open"
    x-transition.opacity.duration.150ms x-cloak>

    <!-- FULLSCREEN (shed < lg) -->
    <button type="button" class="ax-dropdown__item" role="menuitem" data-ax-shed="fullscreen"
      @click="toggleFullscreen(); close()">
      <svg class="ax-icon ax-dropdown__lead" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
        stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
        <path d="M4 8v-2a2 2 0 0 1 2 -2h2" />
        <path d="M4 16v2a2 2 0 0 0 2 2h2" />
        <path d="M16 4h2a2 2 0 0 1 2 2v2" />
        <path d="M16 20h2a2 2 0 0 0 2 -2v-2" />
      </svg>
      <span x-text="full ? 'Exit fullscreen' : 'Fullscreen'">Fullscreen</span>
    </button>

    <!-- APP-GRID (shed < lg) — same tiles as the wide app-grid menu -->
    <div class="ax-overflow__group" data-ax-shed="apps" role="presentation">
      <p class="ax-dropdown__head">Quick apps</p>
      <div class="ax-apps__grid">
        <a class="ax-apps__tile" role="menuitem" href="/apps/email" @click="close()"><span
            class="ax-apps__tile-icon"><svg class="ax-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
              aria-hidden="true">
              <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10" />
              <path d="M3 7l9 6l9 -6" />
            </svg></span><span class="ax-apps__tile-label">Email</span></a>
        <a class="ax-apps__tile" role="menuitem" href="/apps/chat" @click="close()"><span
            class="ax-apps__tile-icon"><svg class="ax-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
              aria-hidden="true">
              <path
                d="M3 20l1.3 -3.9c-2.324 -3.437 -1.426 -7.872 2.1 -10.374c3.526 -2.501 8.59 -2.296 11.845 .48c3.255 2.777 3.695 7.266 1.029 10.501c-2.666 3.235 -7.615 4.215 -11.574 2.293l-4.7 1" />
            </svg></span><span class="ax-apps__tile-label">Chat</span></a>
        <a class="ax-apps__tile" role="menuitem" href="/apps/calendar" @click="close()"><span
            class="ax-apps__tile-icon"><svg class="ax-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
              aria-hidden="true">
              <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12" />
              <path d="M16 3v4" />
              <path d="M8 3v4" />
              <path d="M4 11h16" />
              <path d="M11 15h1" />
              <path d="M12 15v3" />
            </svg></span><span class="ax-apps__tile-label">Calendar</span></a>
        <a class="ax-apps__tile" role="menuitem" href="/apps/kanban" @click="close()"><span
            class="ax-apps__tile-icon"><svg class="ax-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
              aria-hidden="true">
              <path d="M4 4l6 0" />
              <path d="M14 4l6 0" />
              <path d="M4 10a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2l0 -8" />
              <path d="M14 10a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2l0 -2" />
            </svg></span><span class="ax-apps__tile-label">Kanban</span></a>
        <a class="ax-apps__tile" role="menuitem" href="/apps/file-manager" @click="close()"><span
            class="ax-apps__tile-icon"><svg class="ax-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
              aria-hidden="true">
              <path d="M5 4h4l3 3h7a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2" />
            </svg></span><span class="ax-apps__tile-label">Files</span></a>
        <a class="ax-apps__tile" role="menuitem" href="/apps/contacts" @click="close()"><span
            class="ax-apps__tile-icon"><svg class="ax-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
              aria-hidden="true">
              <path d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2" />
              <path d="M10 16h6" />
              <path d="M11 11a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
              <path d="M4 8h3" />
              <path d="M4 12h3" />
              <path d="M4 16h3" />
            </svg></span><span class="ax-apps__tile-label">Contacts</span></a>
        <a class="ax-apps__tile" role="menuitem" href="/ecommerce/invoices" @click="close()"><span
            class="ax-apps__tile-icon"><svg class="ax-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
              aria-hidden="true">
              <path d="M14 3v4a1 1 0 0 0 1 1h4" />
              <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2" />
              <path d="M9 7l1 0" />
              <path d="M9 13l6 0" />
              <path d="M13 17l2 0" />
            </svg></span><span class="ax-apps__tile-label">Invoices</span></a>
        <a class="ax-apps__tile" role="menuitem" href="/apps/notes" @click="close()"><span
            class="ax-apps__tile-icon"><svg class="ax-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
              aria-hidden="true">
              <path d="M5 5a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2l0 -14" />
              <path d="M9 7l6 0" />
              <path d="M9 11l6 0" />
              <path d="M9 15l4 0" />
            </svg></span><span class="ax-apps__tile-label">Notes</span></a>
        <a class="ax-apps__tile" role="menuitem" href="/pages/pricing" @click="close()"><span
            class="ax-apps__tile-icon"><svg class="ax-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
              aria-hidden="true">
              <path d="M9 3h3l2 2h5a2 2 0 0 1 2 2v7a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
            </svg></span><span class="ax-apps__tile-label">Pricing</span></a>
      </div>
    </div>

    <!-- CUSTOMIZER (shed < md) -->
    <button type="button" class="ax-dropdown__item" role="menuitem" data-ax-shed="customizer"
      @click="close(); $dispatch('ax-customizer-open')">
      <svg class="ax-icon ax-dropdown__lead" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
        stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true">
        <path d="M4 10a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
        <path d="M6 4v4" />
        <path d="M6 12v8" />
        <path d="M10 16a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
        <path d="M12 4v10" />
        <path d="M12 18v2" />
        <path d="M16 7a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
        <path d="M18 4v1" />
        <path d="M18 9v11" />
      </svg>
      <span>Customize theme</span>
    </button>
  </div>
</div>
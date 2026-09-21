<header class="ax-header" role="banner" x-data="axHeader()">
  <!-- 1 · SIDEBAR TOGGLE -->
  <button type="button" class="ax-nav-toggle ax-icon-btn" @click="toggleSidebar()" aria-label="Toggle menu" :aria-expanded="!collapsed">
    <svg class="ax-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true"><path d="M4 6l16 0" /><path d="M4 12l16 0" /><path d="M4 18l16 0" /></svg>
  </button>

  <span class="ax-header__spacer"></span>

  {{-- ===== RIGHT UTILITY CLUSTER =====
       Shared with the full-screen app bar (partials/app-bar.blade.php) so the
       two chromes can never drift. Items 4–11 + the responsive overflow shed. --}}
  @include('partials.header-utils')
</header>

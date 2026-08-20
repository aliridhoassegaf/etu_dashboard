<!doctype html>
{{--
  ============================================================
  VIREO FULL-SCREEN APP SHELL LAYOUT
  The chrome for the 13 standalone app pages (pages/apps/**).
  NO sidebar, NO dashboard header, NO footer — the app owns the whole
  viewport and its only chrome is the slim app bar.

  Same <head> contract as layouts/app.blade.php: it includes the SHARED
  partials.head, so the anti-flash IIFE exists exactly once per edition.

  <body class="ax-app-body"> locks document scroll; .ax-appmain is the only
  scroll container. Pages put their Alpine root attributes on that <main>
  itself (NOT a wrapper <div>) via the layout's `main-attrs` section; appshell.css
  styles `.ax-appmain > *` and `.ax-appmain > .ax-app-fill`, so an extra wrapper
  would swallow the flex column.

  lang + dir are set by the anti-flash IIFE in partials.head before first
  paint; data-ax-route seeds nav.js's breadcrumb/active-trail AND the app
  bar's current-app highlight (manifest slug).
  ============================================================
--}}
<html lang="en" data-ax-route="{{ $route ?? 'apps/email' }}">
<head>@include('partials.head')</head>
<body class="ax-app-body">
  @include('partials.loader')
  <div class="ax-ambient" aria-hidden="true"><i></i></div>
  <div class="ax-applayout">
    @include('partials.app-bar')

    <main class="ax-appmain" id="ax-main"{!! rtrim(' ' . trim($__env->yieldContent('main-attrs'))) !!}>
      @yield('content')
    </main>
  </div>
  @include('partials.customizer')
  {{-- ⌘K palette shell — BODY level, never inside .ax-appbar (its backdrop-filter
       would become a containing block and pin the overlay inside the bar). The
       SAME partial the dashboard layout renders, so there is exactly one copy of
       #ax-command per document; core/command-palette.js only fills + drives it. --}}
  @include('partials.command')

  {{-- Per-page scripts (charts/datatables/editors) push here; they run AFTER the
       Vite module bundle (resources/js/app.js) which boots Alpine + vireo.js. --}}
  @stack('scripts')
</body>
</html>

<!doctype html>
{{-- lang + dir are set by the anti-flash IIFE in partials.head before first paint;
     the @route attr seeds nav.js active-trail / breadcrumb (manifest slug). --}}
<html lang="en" data-ax-route="{{ $route ?? 'dashboards/sales' }}">
<head>
  @include('partials.head')
  @include('partials.head-custom')
</head>
<body>
  @include('partials.loader')
  <div class="ax-ambient" aria-hidden="true"><i></i></div>
  <div class="ax-layout">
    @include('partials.sidebar')
    <div class="ax-shell">
      @include('partials.header')
      <main class="ax-main" id="ax-main">
        @yield('content')
      </main>
      @include('partials.footer')
    </div>
  </div>
  @include('partials.customizer')
  {{-- ⌘K palette shell — BODY level, never inside .ax-header (its backdrop-filter
       would become a containing block and pin the overlay inside the bar). --}}
  @include('partials.command')

  {{-- Per-page scripts (charts/datatables/editors) push here; they run AFTER the
       Vite module bundle (resources/js/app.js) which boots Alpine + vireo.js. --}}
  @stack('scripts')
  @include('partials.foot-custom')
</body>
</html>

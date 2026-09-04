<!doctype html>
{{-- lang + dir are set by the anti-flash IIFE in partials.head before first paint;
     the @route attr seeds nav.js active-trail / breadcrumb (manifest slug). --}}
<html lang="en" data-ax-route="{{ $route ?? 'dashboards/sales' }}">
<head>
  @include('partials.head')
  @yield('head_custom')
  <style>
    .custom-driver-panel[hidden] {
        display: none !important;
    }

    .custom-driver-panel {
        display: block;
    }
    .box-photo-container {
        width: 100%;
        height: 300px;
        background: #F1F1F1;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border-radius: 8px;
    }

    .box-photo {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block;
    }
  </style>
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
  @yield('foot_custom')
    <script>
      document.addEventListener('DOMContentLoaded', function () {

        document.querySelectorAll('[data-driver-menu]').forEach(function (menu) {

            const button = menu.querySelector('[data-driver-toggle]');
            const panel = menu.querySelector('[data-driver-panel]');

            if (!button || !panel) {
                return;
            }

            button.addEventListener('click', function (event) {

                event.preventDefault();
                event.stopImmediatePropagation();

                panel.hidden = !panel.hidden;

                button.setAttribute(
                    'aria-expanded',
                    panel.hidden ? 'false' : 'true'
                );

            }, true);

        });

    });
  </script>
</body>
</html>

@extends('layouts.app')

{{-- Basic Tables — faithful re-expression of src/html/tables/basic.html.
Pure CSS table variants; same DOM/classes/ARIA, no page script. --}}
@section('head_custom')
<style>
    #selectionAlert {
        overflow: hidden;
    }

    @media (max-width: 767px) {

        .ax-pagination__page,
        .ax-pagination__prev,
        .ax-pagination__next {
        min-width: 25px;
        height: 25px;
        padding-inline: 0;
        font-size: var(--ax-text-sm);
        }
    }
</style>
@endsection

@section('content')

  <!-- ════════════════ CONTENT ════════════════ -->
  <div class="ax-dash-grid">
    <nav data-ax-breadcrumb aria-label="Breadcrumb">
      <ol class="ax-breadcrumb__list">
        <li class="ax-breadcrumb__item"><a class="ax-breadcrumb__link" href="javascript:void(0)" aria-label="Home"><svg
              class="ax-breadcrumb__home" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
              stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path
                d="M19 8.71l-5.333 -4.148a2.666 2.666 0 0 0 -3.274 0l-5.334 4.148a2.665 2.665 0 0 0 -1.029 2.105v7.2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-7.2c0 -.823 -.38 -1.6 -1.03 -2.105">
              </path>
              <path d="M16 15c-2.21 1.333 -5.792 1.333 -8 0"></path>
            </svg></a></li>
        <li class="ax-breadcrumb__sep" aria-hidden="true"><svg class="ax-icon ax-icon--directional" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"
            aria-hidden="true">
            <path d="M9 6l6 6l-6 6"></path>
          </svg></li>
        <li class="ax-breadcrumb__item" aria-current="page">Vehicle</li>
        <li class="ax-breadcrumb__sep" aria-hidden="true"><svg class="ax-icon ax-icon--directional" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"
            aria-hidden="true">
            <path d="M9 6l6 6l-6 6"></path>
          </svg></li>
        <li class="ax-breadcrumb__item"><a href="{{ url("vehicle-supplier") }}">Vehicle Supplier</a></li>
        <li class="ax-breadcrumb__sep" aria-hidden="true"><svg class="ax-icon ax-icon--directional" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"
            aria-hidden="true">
            <path d="M9 6l6 6l-6 6"></path>
          </svg></li>
        <li class="ax-breadcrumb__item" aria-current="page">{{ $result['name'] ?? '-' }}</li>
      </ol>
    </nav>
    <!-- ───── DEFAULT TABLE ───── -->
    <section class="ax-card ax-col--12" role="region" aria-label="Default table">
      <div class="ax-card__header">
        <div class="ax-card__titles">
          <h3 class="ax-card__title">{{ $title }}</h3>
          <p class="ax-card__subtitle">Viewing detail for <strong>{{ $result['name'] ?? '-' }}</strong></p>
        </div>
      </div>
      <div class="ax-card__body pt-0!" style="display:flex;flex-direction:column;gap:var(--ax-space-5);">
        <div class="ax-field">
          <label class="ax-label" for="fe-name">Name</label>
          <input class="ax-input" value="{{ $result['name'] ?? '-' }}" disabled style="color:var(--ax-text-muted);">
        </div>
        
        <div class="ax-field">
          <label class="ax-label" for="fe-name">Description</label>
          <input class="ax-input" value="{{ $result['description'] ?? '-' }}" disabled style="color:var(--ax-text-muted);">
        </div>

        <div class="ax-field">
          <label class="ax-label" for="fe-name">Status</label>
          <input class="ax-input" value="{{ $result['status_name'] ?? '-' }}" disabled style="color:var(--ax-text-muted);">
        </div>

        <div class="ax-field">
          <label class="ax-label" for="fe-name">Created Date</label>
          <input class="ax-input" value="{{ $result['created_at'] ?? '-' }}" disabled style="color:var(--ax-text-muted);">
        </div>

        <div class="ax-field">
          <label class="ax-label" for="fe-name">Update Date</label>
          <input class="ax-input" value="{{ $result['updated_at'] ?? '-' }}" disabled style="color:var(--ax-text-muted);">
        </div>

      </div>
    </section>


  </div>
@endsection

@section('foot_custom')
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script>
    function changePerPage(perPage) {
        const url = new URL(window.location.href);

        // Ubah jumlah data per halaman
        url.searchParams.set('per_page', perPage);

        // Kembali ke halaman pertama
        url.searchParams.set('page', 1);

        window.location.href = url.toString();
    }
  </script>
  <script>
    $(document).ready(function () {

      let hasFocusedAlert = false;

      $('#dismissSelection').on('click', function () {

        // Uncheck semua checkbox
        $('.row-checkbox').prop('checked', false);

        // Uncheck Check All
        $('#checkAll')
          .prop('checked', false)
          .prop('indeterminate', false);

        // Tutup warning
        $('#selectionAlert')
          .stop(true, true)
          .slideUp(250);

        // Reset agar centang berikutnya dianggap selection pertama
        hasFocusedAlert = false;

      });

      function focusSelectionAlert() {

        const $alert = $('#selectionAlert');

        if (!$alert.length) {
          return;
        }

        setTimeout(function () {

          const alertElement = $alert[0];

          // Cari header sticky
          const $stickyHeader = $('header:visible').filter(function () {
            const position = $(this).css('position');
            return position === 'sticky' || position === 'fixed';
          }).first();

          let headerHeight = 0;

          if ($stickyHeader.length) {
            headerHeight = $stickyHeader.outerHeight();
          }

          // Tambahkan jarak agar alert tidak menempel ke header
          const spacing = 20;

          const rect = alertElement.getBoundingClientRect();

          const currentScroll =
            window.pageYOffset ||
            document.documentElement.scrollTop;

          const targetScroll =
            currentScroll +
            rect.top -
            headerHeight -
            spacing;

          window.scrollTo({
            top: Math.max(0, targetScroll),
            behavior: 'smooth'
          });

        }, 100);
      }


      function updateSelection() {

        const $rowCheckboxes = $('.row-checkbox');
        const total = $rowCheckboxes.length;
        const selected = $rowCheckboxes.filter(':checked').length;


        // ==========================================
        // UPDATE CHECK ALL
        // ==========================================

        $('#checkAll').prop(
          'checked',
          total > 0 && selected === total
        );

        $('#checkAll').prop(
          'indeterminate',
          selected > 0 && selected < total
        );


        // ==========================================
        // TIDAK ADA YANG DIPILIH
        // ==========================================

        if (selected === 0) {

          $('#selectionAlert')
            .stop(true, true)
            .slideUp(250);

          hasFocusedAlert = false;

          return;
        }


        // ==========================================
        // UPDATE JUMLAH SELECTED
        // ==========================================

        $('#selectionTitle').text(
          selected + ' Data Selected'
        );

        $('#selectionMessage').text(
          'You have selected ' +
          selected +
          ' data. Please choose an action to continue.'
        );


        // ==========================================
        // TAMPILKAN ALERT
        // ==========================================

        if (!$('#selectionAlert').is(':visible')) {

          $('#selectionAlert')
            .stop(true, true)
            .slideDown(250, function () {

              // Fokus hanya pada centang pertama
              if (!hasFocusedAlert) {

                hasFocusedAlert = true;

                focusSelectionAlert();

              }

            });

        }
      }


      // ==========================================
      // CHECK ALL
      // ==========================================

      $('#checkAll').on('change', function () {

        const checked = $(this).is(':checked');

        $('.row-checkbox').prop(
          'checked',
          checked
        );

        updateSelection();

      });


      // ==========================================
      // CHECK SATU PER SATU
      // ==========================================

      $(document).on('change', '.row-checkbox', function () {

        updateSelection();

      });


      // ==========================================
      // DISMISS
      // ==========================================

      $('#dismissSelection').on('click', function () {

        $('#selectionAlert')
          .stop(true, true)
          .slideUp(250);

        hasFocusedAlert = false;

      });

    });
</script>

<script>
    function removeFilter(filter) {
        const url = new URL(window.location.href);

        url.searchParams.delete(filter);

        // Reset pagination ketika filter berubah
        url.searchParams.delete('page');

        window.location.href = url.toString();
    }

    function resetFilters() {
        const url = new URL(window.location.href);

        url.searchParams.delete('search');
        url.searchParams.delete('admin_role_id');
        url.searchParams.delete('status');
        url.searchParams.delete('page');

        window.location.href = url.toString();
    }
</script>
@endsection
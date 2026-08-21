  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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
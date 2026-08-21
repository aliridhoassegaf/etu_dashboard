{{-- LOGIN --}}

<script>
  $(function () {

    $('#form_login').validate({

      rules: {
        email: {
          required: true,
          email: true
        },
        password: {
          required: true,
        }
      },

      messages: {
        email: {
          required: 'This field is required',
          email: 'Please enter a valid email address'
        },
        password: {
          required: 'This field is required',
        }
      },

      errorElement: 'span',
      errorClass: 'ax-field__message ax-field__message--error',

      errorPlacement: function (error, element) {
        error.attr('id', element.attr('id') + '-error');
        error.attr('role', 'alert');

        element.closest('.ax-field').append(error);
      },

      highlight: function (element) {

        $(element)
          .addClass('is-invalid')
          .attr('aria-invalid', 'true');

        $(element)
          .closest('.ax-field')
          .find('.ax-field__affix--trailing')
          .show();
      },

      unhighlight: function (element) {

        $(element)
          .removeClass('is-invalid')
          .removeAttr('aria-invalid');

        $(element)
          .closest('.ax-field')
          .find('.ax-field__affix--trailing')
          .hide();
      },

      submitHandler: function (form) {
        console.log('Form valid');
      }

    });

  });
</script>
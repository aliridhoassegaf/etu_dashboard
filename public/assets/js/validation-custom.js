// LOGIN
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
                required: 'Email is required',
                email: 'Please enter a valid email address'
            },
            password: {
                required: 'Password is required',
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
                .find('.ax-field__affix--trailing:not(.ax-field__affix--button)')
                .show();
        },

        unhighlight: function (element) {

            $(element)
                .removeClass('is-invalid')
                .removeAttr('aria-invalid');

            $(element)
                .closest('.ax-field')
                .find('.ax-field__affix--trailing:not(.ax-field__affix--button)')
                .hide();
        },

    });
});

//UPDATE PASSWORD ADMIN
$(function () {
    $('#form_update_password').validate({

        rules: {
            current_password: {
                required: true,
            },
            new_password: {
                required: true,
                minlength: 6,
                maxlength: 50,
            },
            confirm_new_password: {
                required: true,
                equalTo: "#new_password"
            }
        },

        messages: {
            current_password: {
                required: "Current password is required",
            },

            new_password: {
                required: "New password is required",
                minlength: "Password must be at least 6 characters",
                maxlength: "Password must not exceed 50 characters"
            },

            confirm_new_password: {
                required: "Please confirm your new password",
                equalTo: "Password do not match"
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
                .find('.ax-field__affix--trailing:not(.ax-field__affix--button)')
                .show();
        },

        unhighlight: function (element) {

            $(element)
                .removeClass('is-invalid')
                .removeAttr('aria-invalid');

            $(element)
                .closest('.ax-field')
                .find('.ax-field__affix--trailing:not(.ax-field__affix--button)')
                .hide();
        }

    });

});
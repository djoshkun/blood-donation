$(document).ready(function () {
    $('#user_hospital').hide();
    $('#user_role').on('change', function () {
        $('#user_hospital').hide();
        if (this.value === 'ROLE_DOCTOR' || this.value === 'ROLE_LABORANT') {
            $('#user_hospital').show();
        }
    });
    $('#user_role').trigger('change');
});
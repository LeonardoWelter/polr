$('#passwordConfirm').on('keyup', function() {
    var password = $('#passwordFirst').val();
    var confirm_password = $('#passwordConfirm').val();

    if (password != confirm_password) {
        this.setCustomValidity("As senhas não correspondem.");
    } else {
        this.setCustomValidity('');
    }
});

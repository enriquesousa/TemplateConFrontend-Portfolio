import $ from 'jquery';

// console.log($); // para probar si tenemos jquery

// Cambiar la visibilidad de la contraseña en admin login resources/views/admin/auth/login.blade.php
$('.toggle-password').on('click', function() {
    let filed = $('.password');
    if(filed.attr('type') === 'password') {
        filed.attr('type', 'text');
    } else {
        filed.attr('type', 'password');
    }
});

// Cambiar la visibilidad de confirmar contraseña en resources/views/admin/auth/reset-password.blade.php
$('.toggle-confirm-password').on('click', function() {
    let filed = $('.confirm-password');
    if(filed.attr('type') === 'password') {
        filed.attr('type', 'text');
    } else {
        filed.attr('type', 'password');
    }
});

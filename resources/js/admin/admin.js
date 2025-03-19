

// import $ from 'jquery';
// // Para hacerlo disponible en todo el DOM 
// window.$ = window.jQuery = $;

// // Notyf inicialización para ver los parámetros que acepta ir a https://www.npmjs.com/package/notyf
// var notyf = new Notyf({
//     duration: 5000,
//     dismissible: true
// });

// const csrf_token = $('meta[name="csrf_token"]').attr('content');
// var delete_url = null; // La url de la petición de eliminar

// // Mostrar Modal para Eliminar un Registro de la Tabla
// $('.eliminar-registro').on('click', function(e) {
//     e.preventDefault(); // Para que no recargue la página

//     let url = $(this).attr('href');
//     delete_url = url;
//     // console.log(url);

//     $('#modal-danger').modal('show');
// })

// // Eliminar Registro con Confirmación en el modal usando Ajax
// $('.eliminar-confirmar').on('click', function(e) {
//     e.preventDefault(); // Para que no recargue la página

//     $.ajax({
//         method: 'DELETE',
//         url: delete_url,
//         data: {
//             _token: csrf_token
//         },
//         beforeSend: function() {
//             $('.eliminar-confirmar').text('Eliminando...'); // Para sustituir el texto del botón
//         },
//         success: function(data) {
//             // console.log(data);
//             // notyf.success(data.message); // Mejor lo pasamos al controller app/Http/Controllers/Admin/CourseLanguageController.php porque hacemos aquí el reload de pagina muy rápido!
//             window.location.reload(); // Refrescar la página
//         },
//         error: function(xhr, status, error) {
//             // console.log(xhr.responseJSON.message);
//             let errorMessage = xhr.responseJSON;
//             notyf.error(errorMessage.message);
//         },
//         complete: function() {
//             $('.eliminar-confirmar').text('Eliminar'); // Para sustituir el texto del botón
//         }

//     });

// })

// // Para poner el focus en el input 
// $('#agregar').trigger('focus');


// require('./bootstrap');
const Swal = require('sweetalert2')
window.$= require('jquery');
if (document.querySelector('.delete-modal')){
    document.querySelector('.delete-modal').addEventListener('click', function (e) {
        e.preventDefault()
        Swal.fire({
            icon:'warning',
            title: 'Delete all portfolio related to this category?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: `category only`,
            cancelButtonText: 'do not remove'
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                this.closest('form').submit();
            } else if (result.isDenied) {
                $('.sh_form').append("<input hidden type='checkbox' name='check' checked>")
                this.closest('form').submit();
            }
        })
    })
}




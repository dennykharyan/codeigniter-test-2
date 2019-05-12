var message = $('.flash-data').data('flashdata');
var type = $('.flash-type').data('flashtype');

if (message || type) {
    Swal.fire({
        title: type,
        text: message,
        type: type
    })
}

const error = $('.error-alert').data('error');
if (error) {
    Swal.fire({
        title: 'Failed',
        text: 'The Menu field is required.',
        type: 'error'
    })
}

// delete confirm
$('.btn-delete').on('click', function (e) {
    
    e.preventDefault();

    const href = $(this).attr('href');

    Swal.fire({
        title: 'Are you sure?',
        text: 'This data will be deleted',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
})

// logout confirm
$('.btn-logout').on('click', function (e) {
    
    e.preventDefault();

    const href = $(this).attr('href');

    Swal.fire({
        title: 'Are you sure?',
        text: 'You will be sign out',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, sign out'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
})
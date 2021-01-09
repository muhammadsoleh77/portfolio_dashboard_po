window.addEventListener('online', updateStatus);
window.addEventListener('offline', updateStatus);

function updateStatus(event) {
    if (navigator.onLine) {
        Swal.fire({
            title: 'Internet?',
            text: "You're Connection is back!",
            icon: 'info',
            showConfirmButton: false,
            timer: 1500
        })
    } else {
        Swal.fire({
            title: 'Internet?',
            text: "You're Connection Internet Lost",
            icon: 'info',
            // showConfirmButton: false,
            // timer: 1500
        })
    }
}
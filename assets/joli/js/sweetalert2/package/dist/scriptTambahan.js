// ALERT GAGAL LOGIN
const gagalLogin = $('.notif-gagalLogin').data('flashdata');
if (gagalLogin) {
    Swal.fire({
        icon: 'error',
        title: 'ERROR!',
        text: gagalLogin,
        showConfirmButton: false,
        timer: 1500
        // footer: '<a href>Why do I have this issue?</a>'
    })
}
// END ALERT GAGAL LOGIN

// ALERT LOGOUT
const logout = $('.notif-logout').data('flashdata');
if (logout) {
    Swal.fire({
        icon: 'success',
        title: 'SUKSES!',
        text: logout,
        showConfirmButton: false,
        timer: 800
    })
}
// END ALERT LOGOUT


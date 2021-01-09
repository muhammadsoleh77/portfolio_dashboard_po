$(document).ready(function(event) {
    // event.preventDefault();
    $(".hapus").click(function () {
        var id = $(this).parents("tr").attr("id");
        var token = "<?= $dataUser->token ?>";
        var base_url = "<?= $this->config->item('endpoint') ?>";
        // console.log(id);
    
        Swal.fire({
            title: 'Yakin hapus data?',
            text: "Data terhapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'DELETE',
                    url: base_url + '/bumel/default/delete/' + id,
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer ' + token);
                    },
                    error: function (data) {
                        Swal.fire({
                            icon: 'error',
                            title: data.responseJSON.status,
                            text: data.responseJSON.error,
                        })
                    },
                    success: function (data) {
                        console.log(data);
                        // $("#"+id).remove();
                        Swal.fire("Terhapus!", "Data penugasan telah terhapus.", "success");
                    }
                });
            }
        })
    
    });
})
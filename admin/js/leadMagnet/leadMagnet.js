$(document).ready(function () {
    /* Ocultar panel crear LeadMagnets */
    $('.cardCreateLeadMagnets').hide();
    /* Abrir panel crear LeadMagnets */

    $('#btnNewLeadMagnets').click(function (e) {
        e.preventDefault();

        $('.cardCreateLeadMagnets').toggle(800); 
        $('#btnCreateLeadMagnets').html('Crear LeadMagnet');

        sessionStorage.removeItem('id_lead_magnet');

        $('#formCreateLeadMagnets').trigger('reset');
    });

    /* Crear LeadMagnets */

    $('#btnCreateLeadMagnets').click(function (e) {
        e.preventDefault();
        let idLeadMagnet = sessionStorage.getItem('id_lead_magnet');

        if (idLeadMagnet == '' || idLeadMagnet == null) {
            checkDataLeadMagnets('/api/addLeadMagnet', idLeadMagnet);
        } else {
            checkDataLeadMagnets('/api/updateLeadMagnet', idLeadMagnet);
        }
    });

    /* Actualizar LeadMagnetss */

    $(document).on('click', '.updateLeadMagnet', function (e) { 
        $('.cardCreateLeadMagnets').show(800);
        $('#btnCreateLeadMagnets').html('Actualizar LeadMagnets');

        let idLeadMagnet = this.id;
        sessionStorage.setItem('id_lead_magnet', idLeadMagnet);
    
        let row = $(this).parent().parent()[0];
        let data = tblLeadMagnets.fnGetData(row);

        $('#titleLeadMagnets').val(data.title);
        $('#dateLeadMagnets').val(data.date_lead_magnet);
        $('#descLeadMagnets').val(data.description);

        $('html, body').animate({ scrollTop: 0 }, 1000);
    });

    /* Revisar datos */
    checkDataLeadMagnets = async (url, idLeadMagnet) => {
        let titleLeadMagnets = $('#titleLeadMagnets').val();
        let dateLeadMagnets = $('#dateLeadMagnets').val();
        let descLeadMagnets = $('#descLeadMagnets').val();

        if (titleLeadMagnets.trim() == '' || !titleLeadMagnets.trim() || dateLeadMagnets.trim() == '' ||
            !dateLeadMagnets.trim() || descLeadMagnets.trim() == '' || !descLeadMagnets.trim()) {
            toastr.error('Ingrese todos los campos');
            return false;
        }

        let img = $('#image')[0].files[0];
        let file = $('#formFile')[0].files[0];

        let data = new FormData(formCreateLeadMagnets);
        data.append('img', img);
        data.append('file', file);

        if (idLeadMagnet != '' || idLeadMagnet != null) {
            data.append('idLeadMagnet', idLeadMagnet);
        }

        try {
            let result = await $.ajax({
                url: url,
                type: 'POST',
                data: data,
                contentType: false,
                cache: false,
                processData: false,
            });
            message(result)
        } catch (error) {
            console.error(error);
        }
    };

    /* Eliminar LeadMagnet */
    $(document).on('click', '.deleteLeadMagnet', function () { 
        let id = this.id;

        bootbox.confirm({
            title: 'Eliminar',
            message:
                'Está seguro de eliminar este LeadMagnets? Esta acción no se puede reversar.',
            buttons: {
                confirm: {
                    label: 'Si',
                    className: 'btn-success',
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger',
                },
            },
            callback: function (result) {
                if (result == true) {
                    $.get(
                        `/api/deleteLeadMagnet/${id}`,
                        function (data, textStatus, jqXHR) {
                            message(data);
                        }
                    );
                }
            },
        });
    }); 

    viewLeadMagnet = (title) => {
        // localStorage.setItem("id_lead_magnet", id);
        window.open(`/lead-magnets/${title.replace(/ /g, '-').toLowerCase()}`, "_blank");
    };

    /* Mensaje de exito */

    const message = (data) => {
        if (data.success == true) { 
            $('.cardCreateLeadMagnets').hide(800);
            $('#formCreateLeadMagnets').trigger('reset');
            updateTable();
            toastr.success(data.message); 
            return false;
        } else if (data.error == true) toastr.error(data.message);
        else if (data.info == true) toastr.info(data.message);
    };

    /* Actualizar tabla */

    function updateTable() {
        $('#tblLeadMagnets').DataTable().clear();
        $('#tblLeadMagnets').DataTable().ajax.reload();
    }
});

$(document).ready(function () {
    loadDataLeadMagnet = async () => {
        try { 
            dataLeadMagnet = await $.ajax({ url: `/api/leadMagnet/${title.replace(/-/g, ' ')}` });

            if (!dataLeadMagnet) {
                toastr.error('Lead Magnet no existe en la base de datos');
                setTimeout(() => {
                    window.close();
                }, 1000);
            }

            $('#titleLeadMagnet').html(dataLeadMagnet.title);
            $('#imgLeadMagnet').empty();
            $('#imgLeadMagnet').html(`<img src="${dataLeadMagnet.img}" class="img-fluid" alt="" />`);
        } catch (error) {
            console.error(error);
        }
    }

    loadDataLeadMagnet();
});
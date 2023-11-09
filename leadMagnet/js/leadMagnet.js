$(document).ready(function () {
    loadDataLeadMagnet = async () => {
        try {
            let id = localStorage.getItem('id_lead_magnet');
            dataLeadMagnet = await $.ajax({ url: `/api/leadMagnet/${id}` });
            let ruta = window.location.href;
            let title = dataLeadMagnet.title.replace(/ /g, '-').toLowerCase();
            let nuevaRuta = ruta.replace('lead-magnets', title);
            window.history.pushState({}, '', nuevaRuta);

            $('#titleLeadMagnet').html(dataLeadMagnet.title);
            $('#imgLeadMagnet').empty();
            $('#imgLeadMagnet').html(`<img src="${dataLeadMagnet.img}" class="img-fluid" alt="" />`);
        } catch (error) {
            console.error(error);
        }
    }

    loadDataLeadMagnet();
});
window.addEventListener('DOMContentLoaded', function() {
    let links = document.querySelectorAll('.verNoti');
    links.forEach(function(link) {
        link.addEventListener('click', function(ev) {
            ev.preventDefault();
            let idPelicula = link.getAttribute('data-id');
            console.log("Clickeamos un link! ID: ", idPelicula);
            ajax({
                method: 'GET',
                url: 'api/ver-pelicula.php',
                data: 'id=' + idPelicula,
                successCallback: function(rta) {
                    // TODO: Mostrar los datos.
                    console.log("Ver: ", rta);
                }
            });
        });
    });
});
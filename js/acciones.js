window.addEventListener('DOMContentLoaded', function() {
    let saveButton = $('saveButton');
    let deleteButton = $('deleteButton');
    let backButton = $('backButton');

    let fecha = $('fecha');
    let titulo = $('titulo');
    let informacion = $('informacion');
    let categoria = $('categoria');
    let idNoticia = $('idCat');

    let id = idNoticia.value;

    ajax({
        method: 'GET',
        url: '../actions/all_categorias.php',
        data: 'category=' + noticia.category,
        successCallback: function(rta) {
        }
    });

    ajax({
        method: 'GET',
        url: '../actions/ver_noticia.php',
        data: 'id=' + id,
        successCallback: function(rta) {
            var data = JSON.parse(rta);
            if(data.status == 1) {
                var noticia = data.noticia;
                fecha.value = noticia.date;
                titulo.value = noticia.title;
                informacion.value = noticia.information;
                ajax({
                    method: 'GET',
                    url: '../actions/categorias.php',
                    data: 'category=' + noticia.category,
                    successCallback: function(rta) {
                    }
                });
            } else {

            }
        }
    });
   
});
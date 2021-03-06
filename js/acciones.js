window.addEventListener('DOMContentLoaded', function() {
    let saveButton = $('saveButton');
    let deleteButton = $('deleteButton');

    let fecha = $('fecha');
    let titulo = $('titulo');
    let informacion = $('informacion');
    let categoria = $('categoria');
    let idNoticia = $('idCat');

    let id = idNoticia.value;

    
    saveButton.addEventListener('click', function() {
        ajax({
            method: 'GET',
            url: '../actions/edit_news.php',
            data: 'id=' + id +'&fecha=' + fecha.value+'&titulo=' + titulo.value+'&categoria=' + categoria.value+'&info=' + informacion.value,
            successCallback: function(rta) {
                location.href = "../index.php";
            }
        });
    });

    deleteButton.addEventListener('click', function() {
        ajax({
            method: 'GET',
            url: '../actions/delete_news.php',
            data: 'id=' + id,
            successCallback: function(rta) {
                location.href = "../index.php";
            }
        });
    });

    ajax({
        method: 'GET',
        url: '../actions/all_category.php',
        successCallback: function(rta) {
            let data = JSON.parse(rta);
            let options = "";
            let categorias = data.categorias;
            for (let index = 0; index < categorias.length; index++) {
                options += '<option value="'+categorias[index]['id']+'">'+categorias[index]['category']+'</option>';
            }
            categoria.innerHTML = options;
        }
    });

    ajax({
        method: 'GET',
        url: '../actions/ver_noticia.php',
        data: 'id=' + id,
        successCallback: function(rta) {
            let data = JSON.parse(rta);
            if(data.status == 1) {
                let noticia = data.noticia;
                fecha.value = noticia.date;
                titulo.value = noticia.title;
                informacion.value = noticia.information;
                ajax({
                    method: 'GET',
                    url: '../actions/get_category.php',
                    data: 'id=' + noticia.category,
                    successCallback: function(rta) {
                        let data = JSON.parse(rta);
                        let cat = data['category'];
                        let options = categoria.getElementsByTagName('option');
                        for (let index = 0; index < options.length; index++) {
                            if(options[index].value == cat.id) {
                                options[index].selected = true;
                            }
                        }
                    }
                });
            } else {
				location.href = "index.php";
            }
        }
    });
    
 

});
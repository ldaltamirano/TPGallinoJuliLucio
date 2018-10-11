window.addEventListener('DOMContentLoaded', function() {

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

});
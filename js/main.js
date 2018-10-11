window.addEventListener('DOMContentLoaded', function() {
    mostrarNoticias();
});

function mostrarNoticias() {
    let salida = "";
    ajax({
        method: 'GET',
        url: 'actions/news.php',
        async: false,
        successCallback: function(rta) {
            let news = JSON.parse(rta);
            news.forEach(function(noti) {
                salida += "<tr>";
                salida += "<td>" + noti.date + "</td>";
                salida += "<td>" + noti.category + "</td>";
                salida += "<td>" + noti.title + "</td>";
                salida += "<td>" + noti.information + "</td>";
                salida += "<td><a href='ver_noticia.php?id=" + noti.id + "' class='verNoti' data-id='" + noti.id + "'>Ver</a></td>";
                salida += '</tr>';
            });

            document.getElementById('main-tbody').innerHTML = salida;
        }   
    });

}
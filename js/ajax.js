/*
Acá vamos a definir nuestra función ajax(), que va a permitirnos realizar peticiones
de ajax sin tener que repetir tooooodo el código una y otra vez.

ajax(método, url, successCallback, errorCallback, data)



Para evitar que una función tenga una enorme cantidad de parámetros y que se 
vuelva incómoda de utilizar, es típico hacer que reciba un parámetro que sea 
directamente un objeto.
ajax(options)
*/


/* (old)
 Ejecuta una petición de Ajax.
 
 @param {String} method 	El verbo de la petición HTTP.
 @param {String} url 		La URL del recurso.
 @param {Function} successCallback 	El callback a ejecutar cuando la petición se
										complete exitosamente.
 */
// function ajax(method, url, successCallback, errorCallback, data) {

/**
 * Ejecuta una petición de Ajax.
 *
 * @param {Object} options	El objeto de configuración de la petición.
 * @param {string} options.url 	La url de la petición.
 * @param {string} options.method	El verbo de la petición.
 * @param {string} options.data	Los datos a enviar.
 * @param {function} options.successCallback	Función a ejecutar cuando la petición es exitosa.
 * @param {function} options.errorCallback	Función a ejecutar si la petición falla.
 */
function ajax(options) {
	let xhr = new XMLHttpRequest();
	let sendBody = null;
	let urlToFetch = options.url;
	let requestMethod = options.method != null ? options.method : "GET";

	// Verificamos si la petición es GET o POST, para definir dónde van los datos,
	// si es que hay.
	if(options.data != null) {
		// Si el verbo es GET, agregamos los datos a la url.
		if(requestMethod.toUpperCase() == "GET") {
			urlToFetch += '?' + options.data;
		} 
		// En cambio, si es POST, lo agregamos al body de la petición.
		else {
			sendBody = options.data;
		}
	}

	xhr.open(requestMethod, urlToFetch);

	// Indicamos el manejo de la petición de Ajax, verificando si tuvo éxito o no.
	xhr.addEventListener('readystatechange', function() {
		if(xhr.readyState == 4) {
			if(xhr.status == 200) {
				// :D
				options.successCallback(xhr.responseText);
			} else {
				// :(
				options.errorCallback();
			}
		}
	});

	if(requestMethod.toUpperCase() == "POST") {
		xhr.setRequestHeader(
			'Content-Type',
			'application/x-www-form-urlencoded'
		);
	}

	xhr.send(sendBody);
}

/**
 * Alias de document.getElementById.
 *
 * @param {string} id
 * @return {Object}
 */
function $(id) {
	return document.getElementById(id);
}
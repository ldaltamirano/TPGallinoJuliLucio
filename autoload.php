<?php
// De momento, iniciamos sesión acá. Después lo vamos a mover.
session_start();

/*
En este archivo vamos a definir nuestro autoload para olvidarnos de
tener que hacer requires de todas las clases una por una :D :D

Para agregar un autoload, tenemos la función:
spl_autoload_register(Closure $autoload)

"Closure" es como se llama en php a las funciones anónimas.
Ese Closure va a recibir automágicamente un argumento con el nombre de
la clase que se quiere cargar.

WTF is __DIR__?
Es una "constante mágica".
Las constantes mágicas se caracterizan porque empiezan y terminan con
"__".
Son constantes, porque no podemos cambiar su valor.
Son mágicas, porque su valor depende de dónde las usemos.

__DIR__ retorna la ruta del archivo actual.
__LINE__ retorna el número de línea donde está la constante.
*/
spl_autoload_register(function($className) {
	$path = __DIR__ . "/class/" . $className . ".php";
	// echo "La clase que se busca es: " . $path . "<br>";
	if(file_exists($path)) {
		require $path;
	}
});
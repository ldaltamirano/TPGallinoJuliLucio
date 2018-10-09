<?php

/**
 * Esta clase permite manejar PDO en modo Singleton.
 */
class DBConnection
{
	// Las propiedades con static pasan a pertenecer a la _clase_, y no a los
	// _objetos_.
	private static $host = "localhost";
	private static $user = "root";
	private static $pass = "";
	private static $base = "tpGallino";
	private static $db;

	/** Constructor privado, para asegurarnos de que no instancien libremente esta clase. */
	private function __construct() {}

	/**
	 * Los métodos estáticos pueden llamarse _directamente_ desde la clase.
	 * Un detalle, los métodos estáticos no tienen acceso a $this.
	 */
	public static function getConnection()
	{
		if(is_null(self::$db)) {
			$dsn = "mysql:host=" . self::$host . ";dbname=" . self::$base . ";charset=utf8";
			try {
				self::$db = new PDO($dsn, self::$user, self::$pass);
			} catch(Exception $e) {
				die("");
			}
		}
		return self::$db;
	}
}
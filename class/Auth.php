<?php

/**
 * Se encarga de todo lo relativo a la autenticación.
 * Incluyendo:
 * - Login
 * - Logout
 * - Indicar si el usuario está logueado o no
 * - Devolver el usuario logueado
 */
class Auth
{
	/**
	 * Loguea al usuario. Retorna false si falla.
	 *
	 * @param string $user
	 * @param string $pass
	 * @return bool
	 */
	public function login($usuario, $password)
	{
		// Buscamos el usuario.
		$user = new Usuario;
		if($user->traerPorUsuario($usuario)) {
			// El usuario existe!
			// Verificamos el password.
			if(password_verify($password, $user->password)) {
				// El password coincide!
				$this->loguearUsuario($user);
				return true;
			} else {
				// :(
				return false;
			}
		} else {
			// El usuario no existe... :(
			return false;
		}
	}

	/** 
 	 * Marca como logueado al usuario en el sistema.
 	 *
 	 * @param Usuario $user
 	 */
	public function loguearUsuario(Usuario $user)
	{
		$_SESSION['id_user'] = $user->id;
		$_SESSION['usuario'] = $user->usuario;
	}

	/**
	 * Desloguea al usuario el sistema.
	 */
	public function logout()
	{
		unset($_SESSION['id_user']);
		unset($_SESSION['usuario']);
	}

	/**
	 * Retorna true si el usuario está logueado. False de lo 
	 * contrario.
	 *
	 * @return bool
	 */
	public static function isLogged()
	{
		if(isset($_SESSION['id_user'])) {
			return true;
		} else {
			return false;
		}

		// Más corto:
		// return isset($_SESSION['id_user']);
	}
}
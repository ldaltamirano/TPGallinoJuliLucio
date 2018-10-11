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
		$user = new User;
		if($user->getForUserName($usuario)) {
			if($password == $user->getPass()) {
				$this->loguearUser($user);
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	/** 
 	 * Marca como logueado al usuario en el sistema.
 	 *
 	 * @param Usuario $user
 	 */
	public function loguearUser(User $user)
	{
		$_SESSION['id_user'] = $user->GetID();
		$_SESSION['usuario'] = $user->GetUserName();
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
	}
}
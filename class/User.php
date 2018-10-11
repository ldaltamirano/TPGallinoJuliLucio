<?php
/**
 * Se encarga de todo lo relativo a todos los usuarios.
 * Incluyendo:
 * - Obtener usuario
 */
class User {
    private $idUsuario;
	private $userName;
	private $pass;
	private $nombre;
	private $apellido;
    private $mail;
    
    public function getForId($idUsuario) {
        $db = DBConnection::getConnection();
		$query = "SELECT ID, USERNAME, PASSWORD FROM USER
				WHERE ID = ?";
		$stmt = $db->prepare($query);
		$stmt->execute([$idUsuario]);
		if($fila = $stmt->fetch()) {
			$this->cargarDatosDeArray($fila);
			return true;
		} else {
			return false;
		}
    }

    public function getForUserName($userName) {
        $db = DBConnection::getConnection();
		$query = "SELECT ID, USERNAME, PASSWORD FROM USER
				WHERE USERNAME = ?";
		$stmt = $db->prepare($query);
		$stmt->execute([$userName]);
		if($fila = $stmt->fetch()) {
			$this->cargarDatosDeArray($fila);
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Carga los datos de la $fila en el objeto.
	 *
	 * @param array $fila
	 */
	public function cargarDatosDeArray($fila)
	{
		$this->idUsuario	= $fila['ID'];
		$this->userName  	= $fila['USERNAME'];
		$this->pass 		= $fila['PASSWORD'];
	}

	/**
	 * Devuelve el dato $ del objeto usuario
	 */
	 public function getID() {
		 return $this->idUsuario;
	 }

	/**
	 * Devuelve el dato $userName del objeto usuario
	 */
	public function getUserName() {
		return $this->userName;
	}

	/**
	 * Devuelve el dato $pass del objeto usuario
	 */
	public function getPass() {
		return $this->pass;
	}
}
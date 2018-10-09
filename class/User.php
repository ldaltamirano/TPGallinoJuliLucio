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
    
    public getForId($userName) {
        $db = DBConnection::getConnection();
		$query = "SELECT ID, USER, PASSWORD FROM USUARIOS
				WHERE ID = ?";
		$stmt = $db->prepare($query);
		$stmt->execute([$userName]);
		if($fila = $stmt->fetch()) {
			$this->cargarDatosDeArray($fila);
			return true;
		} else {
			return false;
		}
    }

    public getForUserName($idUsuario) {
        $db = DBConnection::getConnection();
		$query = "SELECT ID, USER, PASSWORD FROM USUARIOS
				WHERE USER = ?";
		$stmt = $db->prepare($query);
		$stmt->execute([$idUsuario]);
		if($fila = $stmt->fetch()) {
			$this->cargarDatosDeArray($fila);
			return true;
		} else {
			return false;
		}
    }
}
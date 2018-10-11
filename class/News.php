<?php
class News implements JsonSerializable 
{
    protected $id;
    protected $date;
    protected $title;
    protected $information;
    protected $category;

    /** @var array Listado de todas las propiedades de noticia */
    private $property = ['id', 'date', 'title', 'information','category'];
    

    /**
     * Definimos el método JsonSerializable::jsonSerialize de la interfaz.
     * Este método tiene que retornar lo que queremos que el json_encode()
     * transforme a un json.
     * Lo que sea que retornen, es lo que el json_encode va a utilizar 
     * cuando le pidamos serializar/codificar un objeto Película.
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $salida = [];
        foreach($this->property as $prop) {
            $salida[$prop] = $this->{$prop};
        }
        return $salida;
    }

    /**
     * Obtiene todas las Noticias de la base de datos.
     *
     * @return array|news[]
     */
    public function all() {
		$db = DBConnection::getConnection();
		$query = "SELECT * FROM news";
        $stmt  = $db->prepare($query);
        $stmt->execute();
        $exit  = [];
        while($row = $stmt->fetch()) {
            $news  = new News;
            $news->loadData($row);
            array_push($exit, $news);
        }
        
        return $exit;
	}

    /**
     * Carga las propiedades de News por su $id.
     *
     * @param int $id
     */
	public function bringById($id)
	{
		$db = DBConnection::getConnection();
        $query = 'SELECT * FROM NEWS
                  WHERE id = ?';
		$stmt = $db->prepare($query);
        $stmt->execute([$id]);
        $row  = $stmt->fetch();
        $this->loadData($row);
	}
    
    /**
     * Carga los datos de la $fila en las noticias.
     *
     * @param array $fila
     */
    public function loadData($row)
    {
        $this->id=$row['ID'];
        $this->date=$row['DATE'];
        $this->title=$row['TITLE'];
        $this->information=$row['INFORMATION'];
        $this->category=$row['FKCATEGORY'];
    }

    /**
     * Inserta una nueva Película en la base de datos.
     *
     * @param array $fila
     */
	public function create($row)
	{
		$db = DBConnection::getConnection();
        $query = "INSERT INTO NEWS ('id', 'date', 'title', 'information','category')
                  VALUES (:id, :date, :title, :information, :category)";
        $stmt = $db->prepare($query);
        $exito = $stmt->execute([
            'id'           => $row['ID'],
            'date'         => $row['DATE'],
            'title'        => $row['TITLE'],
            'information'  => $row['INFORMATION'],
            'category'     => $row['CATEGORY'],
        ]);
        
        if($exito) {
            $row['id'] = $db->lastInsertId();
            $this->loadData($row);
        } else {
            throw new Exception('Error al insertar el registro.');
        }
    }
    
    /**
     * Edita una noticia en la base de datos.
     *
     * @param int $id
     * @param array $property
     */
	public function edit() 
	{
		$db = DBConnection::getConnection();
		$query = 'UPDATE NEWS SET $property
                  WHERE $id=?';
        $stmt  = $db->prepare($query);
        $stmt->execute();
	}

    /**
     * Elimina una noticia en la base de datos.
     *
     * @param int $id
     */
	public function delete() 
	{
        $db = DBConnection::getConnection();
        $query = 'DELETE FROM NEWS
                  WHERE $id = ?';
        $stmt  = $db->prepare($query);
        $stmt->execute();
	}
}
<?php
class News{
    private $id;
    private $date;
    private $title;
    private $information;

    /** @var array Listado de todas las propiedades de noticia */
    protected $property = ['id', 'date', 'title', 'information'];
    
    /**
     * Obtiene todas las Noticias de la base de datos.
     *
     * @return array|news[]
     */
    public function all() {
		$db = DBConnection::getConnection();
		$query = "SELECT * FROM NEWS";
        $stmt  = $db->prepare($query);
        $stmt->execute();
        $exit  = [];
        while($row = $stmt->fetch()) {
            $news  = new News;
            $news->cargarDatosDeArray($row);
            $exit[] = $news;
        }
        
        return $exit;
	}

    /**
     * Carga las propiedades de News por su $id.
     *
     * @param int $id
     */
	public function bringBy($id)
	{
		$db = DBConnection::getConnection();
        $query = 'SELECT * FROM NEWS
                WHERE id = ?';
		$stmt = $db->prepare($query);
        $stmt->execute([$id]);
        $row  = $stmt->fetch();
        $this->cargarDatosDeArray($row);
	}
    
    /**
     * Carga los datos de la $fila en las noticias.
     *
     * @param array $fila
     */
    public function cargarDatosDeArray($row)
    {
        foreach($this->property as $pty) {
            $this->{$pty} = $row[$pty];
        }
    }

    /**
     * Inserta una nueva Película en la base de datos.
     *
     * @param array $fila
     */
	public function crear($row)
	{
		$db = DBConnection::getConnection();
        $query = "INSERT INTO NEWS ('id', 'date', 'title', 'information')
                VALUES ('id', 'date', 'title', 'information')";
        $stmt = $db->prepare($query);
        $exito = $stmt->execute([
            'id'           => $row['id'],
            'date'         => $row['date'],
            'title'        => $row['title'],
            'information'  => $row['information'],
        ]);
        
        if($exito) {
            $row['id'] = $db->lastInsertId();
            $this->cargarDatosDeArray($row);
        } else {
            throw new Exception('Error al insertar el registro.');
        }
	}

	public function editar() 
	{
		$db = DBConnection::getConnection();
		echo "Editando<br>";
	}

    /**
     * Eliminar una noticia en la base de datos.
     *
     * @param array $fila
     */
	public function eliminar() 
	{
        $db = DBConnection::getConnection();
        $query = 'DELETE NEWS
                WHERE $id = ?';
	}
}
}
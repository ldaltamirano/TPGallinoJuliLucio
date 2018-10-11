<?php
class Category implements JsonSerializable 
{
    private $id;
    private $category;

    /** @var array Listado de todas las propiedades de categoria */
    private $property = ['id', 'category'];

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


    public function getCategorybyId($id) {
        $db = DBConnection::getConnection();
		$query = "SELECT * FROM category WHERE ID = ?";
        $stmt  = $db->prepare($query);
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        $category  = new Category;
        $category->loadData($row);
        return $category;
    }

    public function getAll() {
        $db = DBConnection::getConnection();
		$query = "SELECT * FROM category";
        $stmt  = $db->prepare($query);
        $stmt->execute();
        $categorys = [];
        while($row = $stmt->fetch()) {
            $category  = new Category;
            $category->loadData($row);
            $categorys[] = $category;
        }
        
        return $categorys;
    }

    public function loadData($row) {
        $this->id = $row['ID'];
        $this->category = $row['CATEGORY'];
    }

    public function setCategory($category) { $this->category = $category; }
    public function getCategory() { return $this->category; }

    public function setId($id) { $this->id = $id; }
    public function getId() { return $this->id; }
}
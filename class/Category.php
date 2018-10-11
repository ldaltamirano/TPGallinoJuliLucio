<?php
class Category{
    private $id;
    private $category;

    public getCategorybyId($id) {
        $db = DBConnection::getConnection();
		$query = "SELECT * FROM category WHERE ID = *";
        $stmt  = $db->prepare($query);
        $stmt->execute($id);
        $row = $stmt->fetch();
        $category  = new Category;
        $category->loadData($row);
        return $category;
    }

    public getAll() {
        $db = DBConnection::getConnection();
		$query = "SELECT * FROM category";
        $stmt  = $db->prepare($query);
        $stmt->execute();
        $categorys  = [];
        while($row = $stmt->fetch()) {
            $category  = new Category;
            $category->loadData($row);
            $categorys[] = $category;
        }
        
        return $categorys;
    }

    public loadData($row) {
        $this->id = $row['ID'];
        $this->category = $row['CATEGORY'];
    }

    public function setCategory($category) { $this->category = $category; }
    public function getCategory() { $this->category }

    public function setId($id) { $this->id = $id; }
    public function getId() { $this->id }
}
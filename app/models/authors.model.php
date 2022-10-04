<?php

class AuthorModel{

    private $db;

    function __construct()
    {
        $this->db = $this ->getDB();
    }

    private function getDB() {
        $db = new PDO('mysql:host=localhost;'.'dbname=db_tpe;charset=utf8', 'root', '');
        return $db;
    }
    function getAll() {
        // 1. abro conexión a la DB
        
    
        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT `Nombre`, `Id` FROM autor");
        $query->execute();
    
        // 3. obtengo los resultados
        $authors = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $authors;
    }

    function getItems($id){
        
        $query = $this->db->prepare("SELECT libro.Titulo, libro.ID FROM `autor` INNER JOIN `libro` ON autor.Id= libro.ID_autor_FK WHERE autor.Id=$id");
        $query->execute();

        $itemsForAuthor = $query->fetchAll(PDO::FETCH_OBJ);

        return $itemsForAuthor;

    }
    //para el select del form y no me anda
    function getCategories(){
        $query = $this->db->prepare("SELECT * FROM autor");
        $query->execute();
    
       
        $categories = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $categories;
    }
   
    function insertAuthor($name, $biografy, $image){
        $query = $this->db->prepare("INSERT INTO autor(Nombre, Biografia, Imagen) VALUES(?, ?, ?)");
        $query->execute([$name, $biografy, $image]);

        return $this->db->lastInsertId();

    }
}
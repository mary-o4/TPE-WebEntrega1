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
    //aca deje seguir en view
    function getAuthor($id){
        $query = $this->db->prepare("SELECT * FROM `autor` WHERE Id=$id");
        $query->execute();
    
       
        $author = $query->fetch(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $author;
    }
    
    /*function getItems($id){
        
        $query = $this->db->prepare("SELECT autor.*, libro.* FROM `autor` INNER JOIN `libro` ON autor.Id= libro.ID_autor_FK WHERE autor.Id=$id");
        $query->execute();

        $itemsForAuthor = $query->fetchAll(PDO::FETCH_OBJ);

        return $itemsForAuthor;

    }*/
   
    function insertAuthor($name, $biografy, $image){
        $query = $this->db->prepare("INSERT INTO autor(Nombre, Biografia, Imagen) VALUES(?, ?, ?)");
        $query->execute([$name, $biografy, $image]);

        return $this->db->lastInsertId();

    }

    function deleteAuthorById($id){
        //poner condicion para eliminar categoria si..
        $query = $this->db->prepare('DELETE FROM autor WHERE Id = ?');
        $query->execute([$id]);
    }
    
    function updateAuthorById($name,$biografy,$image,$id){
        $query = $this->db->prepare('UPDATE autor SET Nombre = ?, Biografia= ?, Imagen= ? WHERE Id = ?');
        $query->execute([$name,$biografy,$image,$id]);
    }

   
}
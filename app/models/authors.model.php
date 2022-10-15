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
        $query = $this->db->prepare("SELECT * FROM `autor` WHERE Id=?");
        $query->execute([$id]);
    
       
        $author = $query->fetch(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $author;
    }
    

    function getBooksForAuthor($id){
        $query = $this->db->prepare("SELECT libro.Titulo, libro.ID, libro.ID_autor_FK from `autor` INNER JOIN `libro` ON autor.Id=libro.ID_autor_fk WHERE autor.Id=$id ");
        $query->execute();

        $books = $query->fetchAll(PDO::FETCH_OBJ);
        return $books;
    }
   
    function insertAuthor($name, $biografy, $image = null){

        if($image)
            $pathImg = $this->uploadImagebook($image);

        $query = $this->db->prepare("INSERT INTO autor(Nombre, Biografia, Imagen) VALUES(?, ?, ?)");
        $query->execute([$name, $biografy, $pathImg]);

        return $this->db->lastInsertId();

    }

    private function uploadImageBook($image){
        $target = 'images/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);
        return $target;

    }

    function deleteAuthorById($id){
        
        $query = $this->db->prepare('DELETE FROM autor WHERE Id = ?');
        $query->execute([$id]);
    }
    
    function updateAuthorById($name,$biografy,$image = null,$id){

        if($image)
            $pathImg = $this->uploadImagebook($image);

        $query = $this->db->prepare('UPDATE autor SET Nombre = ?, Biografia= ?, Imagen= ? WHERE Id = ?');
        $query->execute([$name,$biografy,$pathImg,$id]);
    }

   
}
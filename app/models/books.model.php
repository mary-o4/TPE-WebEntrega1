<?php

class BookModel{

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
        // 
        //SELECT libro.Titulo, libro.ID, autor.Nombre, autor.Id FROM libro INNER JOIN autor ON libro.ID_autor_FK=autor.Id
        $query = $this->db->prepare("SELECT `Titulo`,`Imagen`, `ID` FROM libro");
        $query->execute();
    
        // 3. obtengo los resultados
        $books = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $books;
    }
    
    function getBook($id){
        // o especificar las columnas `Genero`, `Fecha_de_Publicacion`, `Editorial`,`ISBN`, `Sinopsis`, `Imagen`
        $query = $this->db->prepare("SELECT libro.*, autor.Nombre, autor.Id FROM libro INNER JOIN autor ON libro.ID_autor_FK=autor.Id WHERE libro.ID=?");
        $query->execute([$id]);

        $book = $query->fetch(PDO::FETCH_OBJ);

        return $book;
    }

    function insertBook($title, $genre, $date, $editorial, $isbn, $synopsis, $image = null, $author) {

        $pathImg = null;

        if($image)
            $pathImg = $this->uploadImagebook($image);

        $query = $this->db->prepare("INSERT INTO libro (Titulo, Genero, Fecha_de_Publicacion, Editorial, ISBN, Sinopsis, Imagen, ID_autor_FK ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $query->execute([$title, $genre, $date, $editorial, $isbn, $synopsis, $pathImg, $author]);

        return $this->db->lastInsertId();
    }

    private function uploadImageBook($image){
        $target = 'images/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);
        return $target;

    }

    function deleteBookById($id){
        $query = $this->db->prepare('DELETE FROM libro WHERE ID = ?');
        $query->execute([$id]);
    }

    function updateBookById($title, $genre, $date, $editorial, $isbn, $synopsis, $image = null, $author,$id){

        if($image)
            $pathImg = $this->uploadImagebook($image);

        $query = $this->db->prepare('UPDATE libro SET Titulo = ?, Genero = ?, Fecha_de_Publicacion = ?, Editorial = ?, ISBN = ?, Sinopsis = ?, Imagen = ?, ID_autor_FK = ? WHERE ID = ?');
        $query->execute([$title, $genre, $date, $editorial, $isbn, $synopsis, $pathImg, $author,$id]);
        $book = $query->fetch(PDO::FETCH_OBJ);
        return $book;
    }
}
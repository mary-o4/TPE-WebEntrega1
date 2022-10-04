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
        $query = $this->db->prepare("SELECT `Titulo`, `ID` FROM libro");
        $query->execute();
    
        // 3. obtengo los resultados
        $books = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $books;
    }

    function getDescription($id){
        // o especificar las columnas `Genero`, `Fecha_de_Publicacion`, `Editorial`,`ISBN`, `Sinopsis`, `Imagen`
        $query = $this->db->prepare("SELECT libro.*, autor.Nombre, autor.Id FROM libro INNER JOIN autor ON libro.ID_autor_FK=autor.Id WHERE libro.ID=$id");
        $query->execute();

        $book = $query->fetch(PDO::FETCH_OBJ);

        return $book;
    }

    function insertBook($title, $genre, $date, $editorial, $isbn, $synopsis, $image, $author) {
        $query = $this->db->prepare("INSERT INTO libro (Nombre, Genero, Fecha_de_Publicacion, Editorial, ISBN, Sinopsis, Imagen, ID_author_FK ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $query->execute([$title, $genre, $date, $editorial, $isbn, $synopsis, $image, $author]);

        return $this->db->lastInsertId();
    }
}
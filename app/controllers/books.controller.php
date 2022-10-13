<?php
include_once './app/models/books.model.php';
include_once './app/models/authors.model.php';
include_once './app/views/books.view.php';
include_once './app/views/authors.view.php';
include_once './helpers/auth.helper.php';

class BookController{
    private $view;
    private $viewAuthors;
    private $modelBooks;
    private $modelAuthors;
    private $authHelper;

    function __construct() {
        $this->view = new BookView();
        $this->viewAuthors = new AuthorView();
        $this->modelBooks = new BookModel();
        $this->modelAuthors = new AuthorModel();
        $this->authHelper = new AuthHelper();
    }
    function showBooks() {

        session_start();
        //obtiene los productos del modelo
        $books = $this->modelBooks->getAll(); 
        $authors=$this->modelAuthors->getAll();
    


        //actualizo la vista
        $this->view->showBooks($books, $authors);    
    }

    function showbook($id){

        session_start();
        $book = $this->modelBooks->getBook($id);
        $authors = $this->modelAuthors->getAll();
        $this->view->showBook($book,$authors);
        
    }


   
    function addBook(){
        //para q no me muestre el form si no estoy logueado
        $this->authHelper->checkLoggedIn();

        $title = $_POST['title'];
        $genre = $_POST['genre'];
        $date = $_POST['date'];
        $editorial = $_POST['editorial'];
        $isbn = $_POST['isbn'];
        $synopsis = $_POST['synopsis'];
        $image = $_FILES['image']['tmp_name'];
        $author = $_POST['author'];
        
        

        //verifico campos obligatorios
        if(empty($title) || empty($genre) ||  empty($editorial) || empty($date) || empty($isbn) || empty($author) || empty($synopsis)){
            $this->view->showError('Faltan datos obligatorios');
            die();
        }
        
        $agregar=true;
        if($agregar){
            if($_FILES['image']['type'] == 'image/jpg' || $_FILES['image']['type'] == 'image/jpeg' || $_FILES['image']['type'] == 'image/jpg'){
                $this->modelBooks->insertBook($title, $genre, $date, $editorial, $isbn, $synopsis, $_FILES['image']['tmp_name'], $author);
            }
        }else{
             $this->modelBooks->insertBook($title, $genre, $date, $editorial, $isbn, $synopsis,$image, $author);
        }

        
    
        header("Location: " . BASE_URL); 
    }
    
    function deleteBook($id){
        //para q no me muestre el form si no estoy logueado
        $this->authHelper->checkLoggedIn();

        $this->modelBooks->deleteBookById($id);
        header("Location: " . BASE_URL); 
    }

    function updateBook($id){
        //para q no me muestre el form si no estoy logueado
        $this->authHelper->checkLoggedIn();
        
        $title = $_POST['title'];
        $genre = $_POST['genre'];
        $date = $_POST['date'];
        $editorial = $_POST['editorial'];
        $isbn = $_POST['isbn'];
        $synopsis = $_POST['synopsis'];
        $image = $_FILES['image']['tmp_name'];
        $author = $_POST['author'];

        if(empty($title) || empty($genre)|| empty($author)){
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        if($_FILES['image']['type'] == 'image/jpg' || $_FILES['image']['type'] == 'image/jpeg' || $_FILES['image']['type'] == 'image/jpg'){
            $this->modelBooks->updateBookById($title, $genre, $date, $editorial, $isbn, $synopsis,  $_FILES['image']['tmp_name'], $author,$id);
        }else{
        $this->modelBooks->updateBookById($title, $genre, $date, $editorial, $isbn, $synopsis, $image, $author,$id);
        
        }
        header("Location: " . BASE_URL. 'book/'.$id);
    }
}
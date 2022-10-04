<?php
include_once './app/models/books.model.php';
include_once './app/models/authors.model.php';
include_once './app/views/books.view.php';
include_once './app/views/authors.view.php';

class BookController{
    private $view;
    private $viewAuthors;
    private $modelBooks;
    private $modelAuthors;

    function __construct() {
        $this->view = new BookView();
        $this->viewAuthors = new AuthorView();
        $this->modelBooks = new BookModel();
        $this->modelAuthors = new AuthorModel();
    }
    function showBooks() {
//obtiene los productos del modelo
    $books = $this->modelBooks->getAll(); 

 //actualizo la vista
    $this->view->showBooks($books);    
    }

    function showDescription($id){
        $book = $this->modelBooks->getDescription($id);

        $this->view->showDescription($book);
        
    }

    function showAuthors(){
        $authors= $this->modelAuthors->getAll();

        $this->viewAuthors->showAuthors($authors);
    }

    function showItemsForAuthor($id){
        $itemsForAuthor = $this->modelAuthors->getItems($id);

        $this->viewAuthors->showItemsForAuthor($itemsForAuthor);
    }

    function addBook(){

        $title = $_POST['title'];
        $genre = $_POST['genre'];
        $date = $_POST['date'];
        $editorial = $_POST['editorial'];
        $isbn = $_POST['isbn'];
        $synopsis = $_POST['synopsis'];
        $image = $_POST['image'];
        $author = $_POST['author'];
        
        

        //verifico campos obligatorios
        if(empty($title) || empty($genre) || empty($image) || empty($editorial) || empty($date) || empty($isbn) || empty($author) || empty($synopsis)){
            $this->view->showError('Faltan datos obligatorios');
            die();
        }
    
        $id = $this->modelBooks->insertBook($title, $genre, $date, $editorial, $isbn, $synopsis, $image, $author);
    
        header("Location: " . BASE_URL); 
    }
    //funcion para que me muestre en el select del form las categorias, no estaria andando
    function showCategories(){

        $categories = $this->modelAuthors->getcategories();

        $this->viewAuthors->showCategories($categories);
    }

    function addCategories(){
        $name = $_POST['name'];
        $biografy = $_POST['biografy'];
        $image = $_POST['image'];

        if(empty($name)){
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        $id = $this->modelAuthors->insertAuthor($name, $biografy, $image);
        
        header("Location: " . BASE_URL);  //como poner para q me lleve a la pag misma

    }
}
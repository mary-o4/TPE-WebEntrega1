<?php
include_once './app/models/books.model.php';
include_once './app/models/authors.model.php';
include_once './app/views/books.view.php';
include_once './app/views/authors.view.php';
include_once './helpers/auth.helper.php';

class AuthorController{
    private $viewBooks;
    private $viewAuthors;
    private $modelBooks;
    private $modelAuthors;
    private $authHelper;

    function __construct() {
        $this->viewBooks = new BookView();
        $this->viewAuthors = new AuthorView();
        $this->modelBooks = new BookModel();
        $this->modelAuthors = new AuthorModel();
        $this->authHelper = new AuthHelper();
    }

    function showAuthors(){

        session_start();

        $authors= $this->modelAuthors->getAll();

        $this->viewAuthors->showAuthors($authors, $message=null);
    }

    function showAuthor($id){

        session_start();
        
        $author = $this->modelAuthors->getAuthor($id);
        $this->viewAuthors->showAuthor($author);
    }

    function showBooksForAuthor($id){
        //session_start();
        $books = $this->modelAuthors->getBooksForAuthor($id);
        $this->viewAuthors->showBooksForAuthor($books);

    }

    function addAuthor(){
        //para q no me muestre el form si no estoy logueado
        $this->authHelper->checkLoggedIn();

        $name = $_POST['name'];
        $biografy = $_POST['biografy'];
        $image = $_FILES['image']['tmp_name'];

       if(empty($name)){
            $this->viewBooks->showError('Faltan datos obligatorios');
            die();
        }

        if($_FILES['image']['type'] == 'image/jpg' || $_FILES['image']['type'] == 'image/jpeg' || $_FILES['image']['type'] == 'image/jpg'){
            $id = $this->modelAuthors->insertAuthor($name, $biografy, $_FILES['image']['tmp_name']);
        }else{    
                $id = $this->modelAuthors->insertAuthor($name, $biografy, $image);
        }
        header("Location: " . BASE_URL. 'authors');  

    }

    function deleteAuthor($id){
        //para q no me muestre el form si no estoy logueado
        $this->authHelper->checkLoggedIn();

        $books=$this->modelAuthors->getBooksForAuthor($id);
        $authors= $this->modelAuthors->getAll();
        if($books != NULL){
            
            $this->viewAuthors->showAuthors($authors,"Este autor no se puede borrar, tiene libros cargados");
            
        }
        else{
            $this->modelAuthors->deleteAuthorById($id);
            header("Location: " . BASE_URL. 'authors');
        }
        
        
    }

    function updateAuthor($id){
        //para q no me muestre el form si no estoy logueado
        $this->authHelper->checkLoggedIn();
        
        $name = $_POST['name'];
        $biografy = $_POST['biografy'];
        $image = $_FILES['image']['tmp_name'];

        if(empty($name)){
           $this->viewBooks->showError('Faltan datos obligatorios');
            die();
        }

        if($_FILES['image']['type'] == 'image/jpg' || $_FILES['image']['type'] == 'image/jpeg' || $_FILES['image']['type'] == 'image/jpg'){
            $this->modelAuthors->updateAuthorById( $name, $biografy,$_FILES['image']['tmp_name'], $id);
        }else{    
            $this->modelAuthors->updateAuthorById( $name, $biografy,$image, $id);
        }
        header("Location: " . BASE_URL. 'author/'.$id);
    }

}
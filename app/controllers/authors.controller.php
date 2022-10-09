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

        $this->viewAuthors->showAuthors($authors);
    }

    function showAuthor($id){

        session_start();
        
        $author = $this->modelAuthors->getAuthor($id);
        $this->viewAuthors->showAuthor($author);
    }

    function addAuthor(){
        //para q no me muestre el form si no estoy logueado
        $this->authHelper->checkLoggedIn();

        $name = $_POST['name'];
        $biografy = $_POST['biografy'];
        $image = $_POST['image'];

        if(empty($name)){
            $this->viewBooks->showError('Faltan datos obligatorios');
            die();
        }

        $id = $this->modelAuthors->insertAuthor($name, $biografy, $image);
        
        header("Location: " . BASE_URL. 'authors');  //como poner para q me lleve a la misma pagina por que me lleva al home

    }

    function deleteAuthor($id){
        //para q no me muestre el form si no estoy logueado
        $this->authHelper->checkLoggedIn();

        $this->modelAuthors->deleteAuthorById($id);
        header("Location: " . BASE_URL. 'authors'); 
    }

    function updateAuthor($id){
        //para q no me muestre el form si no estoy logueado
        $this->authHelper->checkLoggedIn();
        
        $name = $_POST['name'];
        $biografy = $_POST['biografy'];
        $image = $_POST['image'];

        $this->modelAuthors->updateAuthorById( $name, $biografy,$image, $id);
        header("Location: " . BASE_URL. 'author/'.$id);
    }

}
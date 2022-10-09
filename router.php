<?php
require_once './app/controllers/books.controller.php';
require_once './app/controllers/authors.controller.php';
require_once './app/controllers/auth.controller.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: book/1 --> ['book', 1]
$params = explode('/', $action);

$controllerBook = new BookController();
$controllerAuthor = new AuthorController(); 
$controllerAuth = new AuthController();

// tabla de ruteo
switch ($params[0]) {
    case 'login':
        $controllerAuth->showFormlogin();
        break;
    case 'validate':
        $controllerAuth->validateUser();
        break;
    case 'logout':
        $controllerAuth->logout();
        break;
    case 'home':
        $controllerBook->showBooks();
        break;
    case 'book':
        $id = $params[1];
        $controllerBook->showBook($id);
        break;
    case 'authors':
        $controllerAuthor->showAuthors();
        break;
    case 'author':
        $id = $params[1];
        $controllerAuthor->showAuthor($id);
        break;
    case 'booksForAuthor':
        $id = $params[1];
        $controllerBook->showBooksForAuthor($id);
        break;
    case 'add':
        $controllerBook->addBook();
        break;
    case 'addAuthor':
        $controllerAuthor->addAuthor();
        break;
    case 'deleteBook':
        // obtengo el parametro de la acción
        $id = $params[1];
        $controllerBook->deleteBook($id);
        break;
    case 'deleteAuthor'://poner condicion para q me borre solo cuando no hay libros de ese autor
        // obtengo el parametro de la acción
        $id = $params[1];
        $controllerAuthor->deleteAuthor($id);
        break;
    case 'updateAuthor':// 
        // obtengo el parametro de la acción
        $id = $params[1];
        $controllerAuthor->updateAuthor($id);
        break;
    case 'updateBook':
        // obtengo el parametro de la acción
        $id = $params[1];
        $controllerBook->updateBook($id);
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo('404 Page not found');
        break;
}

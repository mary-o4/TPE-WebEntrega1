<?php
include_once './app/controllers/books.controller.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

$controller = new BookController();

// tabla de ruteo
switch ($params[0]) {
    case 'home':
        $controller->showBooks();
        break;
    case 'description':
        $id = $params[1];
        $controller->showDescription($id);
        break;
    case 'authors':
        $controller->showAuthors();
        break;
    case 'itemsForAuthor':
        $id = $params[1];
        $controller->showItemsForAuthor($id);
        break;
    case 'add':
        $controller->addBook();
        break;
    /*case 'select':
        $controller->showCategories();//select del form no anda
        break;*/
    case 'addCat':
        $controller->addCategories();
    case 'delete':
        // obtengo el parametro de la acción
        /*$controller = new TaskController();
        $id = $params[1];
        $controller->delete($id);
        break;*/
    default:
        header("HTTP/1.0 404 Not Found");
        echo('404 Page not found');
        break;
}

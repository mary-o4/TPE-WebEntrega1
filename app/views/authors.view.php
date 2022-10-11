<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class AuthorView{
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function showAuthors($authors, $message=null){
        $this->smarty->assign('message', $message);
        $this->smarty->assign('authors', $authors);
        $this->smarty->display('authors.tpl');
        
       
    }

    function showBooksForAuthor($books){
        $this->smarty->assign('books', $books);
        $this->smarty->display('booksForAuthor.tpl');
    }
    
    function showAuthor($author){
        $this->smarty->assign('author', $author); 
        $this->smarty->display('author.tpl');
    }
    //me tira error en la funcion de error al borrar 
    /*function showMessage($message, $authors){
        $this->smarty->assign('message', $message);
        $this->smarty->assign('authors', $authors);
        $this->smarty->display('authors.tpl');
    }*/

    
    
}
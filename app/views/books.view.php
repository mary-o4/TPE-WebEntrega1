<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class BookView{
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function showBooks($books,$authors){
       
        $this->smarty->assign('books', $books);
        $this->smarty->assign('authors', $authors);
        $this->smarty->display('books.tpl');
       
    
        
    }

   
//seguir por aca sacar a tpl la vista 
    function showBook($book,$authors){
       
        $this->smarty->assign('book', $book);
        $this->smarty->assign('authors', $authors);
        $this->smarty->display('book.tpl');
        
    }

    function showError($error){

        $this->smarty->assign('error', $error);
        $this->smarty->display('formAddBook.tpl');
    }
}
<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class AuthorView{
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function showAuthors($authors){
       
        $this->smarty->assign('authors', $authors);
        $this->smarty->display('authors.tpl');
        
       
    }

    function showAuthor($author){
        $this->smarty->assign('author', $author); 
        $this->smarty->display('author.tpl');
    }
    

    
    
}
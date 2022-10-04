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

    function showItemsForAuthor($itemsForAuthor){

        $this->smarty->assign('itemsForAuthor', $itemsForAuthor);
        $this->smarty->display('itemsAuthors.tpl');

    }

    function showCategories($categories){

        $this->smarty->assign('categories', $categories);
        $this->smarty->display('formInsertItem.tpl');
    }
}
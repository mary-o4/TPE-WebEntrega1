{include file="header.tpl"}

<ul class="list-group">
{foreach from = $books item = $book }
    <li class='list-group-item d-flex justify-content-between align-items-center'>
            <a href='book/{$book->ID}'><b>{$book->Titulo}</b></a> 
            {if isset($smarty.session.USER_ID)}
                <a href='deleteBook/{$book->ID}' type='button' class='btn btn-danger ml-auto'>Borrar</a>
            {/if}
    </li>
{/foreach}  
</ul>

{if isset($smarty.session.USER_ID)}
{include file="formAddBook.tpl"}
{/if}

{include file="footer.tpl"}

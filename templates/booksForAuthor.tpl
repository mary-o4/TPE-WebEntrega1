{include file="header.tpl"}

{if !empty($books)}
    <ul class="list-group">
    {foreach from = $books item = $book}
        <li class='list-group-item d-flex justify-content-between align-items-center'>
            <a class="text-decoration-none link-dark" href='book/{$book->ID}'><b>{$book->Titulo}</b></a> 
        </li>
    {/foreach}  
    </ul>
    <a class="text-decoration-none link-secondary back" href='author/{$book->ID_autor_FK}'><b >Volver</b></a>  
{else}
    <h1>Este Autor no tiene libros disponibles</h1>
{/if}

{include file="footer.tpl"}
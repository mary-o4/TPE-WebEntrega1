{include file="header.tpl"}

<ul class="list-group">
    <li>{$author->Nombre}</li>
    <li>{$author->Imagen}</li>
    <li>{$author->Biografia}</li>
    <li class='list-group-item d-flex justify-content-between align-items-center'>
        <a href='booksForAuthor/{$author->Id}'><b>Mostrar libros del Autor</b></a> 
         
    </li>
    

</ul>
{if isset($smarty.session.USER_ID)}
{include file="formUpdateAuthor.tpl"}
{/if}

{include file="footer.tpl"}


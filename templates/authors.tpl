{include file="header.tpl"}

<ul class="list-group">
{foreach from = $authors item = $author }
    <li class='list-group-item d-flex justify-content-between align-items-center'>
            <a href='itemsForAuthor/{$author->Id}'><b>{$author->Nombre}</b></a> 
            <a href='delete/{$author->Id}' type='button' class='btn btn-danger ml-auto'>Borrar</a>
    </li>
{/foreach}  
</ul>

{include file="formInsertCategories.tpl"}

{include file="footer.tpl"}

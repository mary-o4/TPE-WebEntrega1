{include file="header.tpl"}

<ul class="list-group">
{foreach from = $books item = $book }
    <li class='list-group-item d-flex justify-content-between align-items-center'>
            <a href='description/{$book->ID}'><b>{$book->Titulo}</b></a> 
            <a href='delete/{$book->ID}' type='button' class='btn btn-danger ml-auto'>Borrar</a>
    </li>
{/foreach}  
</ul>

{include file="formInsertItem.tpl"}

{include file="footer.tpl"}

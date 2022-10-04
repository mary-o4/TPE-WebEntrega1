{include file="header.tpl"}

<ul class="list-group">
{foreach from = $itemsForAuthor item = $item }
    <li class='list-group-item d-flex justify-content-between align-items-center'>
            <a href='description/{$item->ID}'><b>{$item->Titulo}</b></a> 
            <a href='delete/{$item->ID}' type='button' class='btn btn-danger ml-auto'>Borrar</a>
    </li>
{/foreach}  
</ul>



{include file="footer.tpl"}


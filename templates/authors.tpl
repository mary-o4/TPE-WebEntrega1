{include file="header.tpl"}

<ul class="list-group">
{foreach from = $authors item = $author }
    <li class='list-group-item d-flex justify-content-between align-items-center'>
            <a href='author/{$author->Id}'><b>{$author->Nombre}</b></a> 
            <div class="ml-auto">
                {if isset($smarty.session.USER_ID)}
                <a href='deleteAuthor/{$author->Id}' type='button' class='btn btn-danger ml-auto'>Borrar</a>
                {/if}
            </div>    
    </li>
{/foreach}  
</ul>

{if isset($smarty.session.USER_ID)}
{include file="formAddAuthor.tpl"}
{/if}

{include file="footer.tpl"}

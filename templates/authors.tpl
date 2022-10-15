{include file="header.tpl"}

<ul class="list-group border border-dark">
{foreach from = $authors item = $author }
    <li class='list-group-item d-flex justify-content-between align-items-center '>
            <a class="text-decoration-none link-dark" href='author/{$author->Id}'><b>{$author->Nombre}</b></a> 
            <div class="ml-auto">
                {if isset($smarty.session.USER_ID)}
                <a href='deleteAuthor/{$author->Id}' type='button' class='btn btn-warning ml-auto'>Borrar</a>
                {/if}
            </div>    
    </li>
{/foreach}  
</ul>


{if isset($smarty.session.USER_ID)}
    {if !empty($message)}
        <h2>{$message}</h2>
    {/if}

{include file="formAddAuthor.tpl"}
{/if}

{include file="footer.tpl"}

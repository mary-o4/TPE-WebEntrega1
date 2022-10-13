{include file="header.tpl"}

<div class="row row-cols-3 row-cols-md-3 g-4">
{foreach from = $books item = $book }
    
    <div class="col">
    <div class="card border-secondary mb-3"  >
        
        <img src="{$book->Imagen}" class="card-img-top image" alt="...">
        <div class="card-body">
            <h5 class="card-title">{$book->Titulo}</h5>
            <p class="card-text">Un texto de ejemplo rápido para colocal cerca del título de la tarjeta y componer la mayor parte del contenido de la tarjeta.</p>
            
            <a href="book/{$book->ID}" class="btn btn-secondary">Ver mas</a>
        {if isset($smarty.session.USER_ID)}
            <a href="deleteBook/{$book->ID}" type='button' class="btn btn-warning">Borrar</a>
            
        {/if}
    
        </div>
    </div>
    </div>
   
{/foreach}  
</div>
{if isset($smarty.session.USER_ID)}
{include file="formAddBook.tpl"}
{/if}

{include file="footer.tpl"}

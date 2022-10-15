{include file="header.tpl"}


<div class="card border-dark" style="width: 30rem;">
  <img src="{$book->Imagen}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{$book->Titulo}</h5>
    <p class="card-text">{$book->Sinopsis}</p>
    <div class="card" style="width: 28rem;">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{$book->Genero}</li>
    <li class="list-group-item">{$book->Fecha_de_Publicacion}</li>
    <li class="list-group-item">{$book->ISBN}</li>
    <li class="list-group-item">{$book->Editorial}</li>
    <li class="list-group-item">{$book->Nombre}</li>
  </ul>
</div>
  </div>
</div>

{if isset($smarty.session.USER_ID)}
{include file="formUpdateBook.tpl"}
{/if}
{include file="footer.tpl"}

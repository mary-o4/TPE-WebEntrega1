{include file="header.tpl"}



<div class="card text-white bg-secondary mb-3" style="width:40%;">
  <img src="{$book->Imagen}" class="card-img-top img" alt="..." style="height: 300px">
  <div class="card-body">
    <h5 class="card-title">{$book->Titulo}</h5>
    <p class="card-text">{$book->Sinopsis}</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{$book->Genero}</li>
    <li class="list-group-item">{$book->Fecha_de_Publicacion}</li>
    <li class="list-group-item">{$book->ISBN}</li>
    <li class="list-group-item">{$book->Editorial}</li>
    <li class="list-group-item">{$book->Nombre}</li>
  </ul>
</div>

{if isset($smarty.session.USER_ID)}
{include file="formUpdateBook.tpl"}
{/if}
{include file="footer.tpl"}

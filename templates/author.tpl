{include file="header.tpl"}

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{$author->Imagen}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{$author->Nombre}</h5>
        <p class="card-text">{$author->Biografia}</p>
        <a href="booksForAuthor/{$author->Id}" class="btn btn-secondary">Mostrar libros del Autor</a>
      </div>
    </div>
  </div>
</div>

{if isset($smarty.session.USER_ID)}
{include file="formUpdateAuthor.tpl"}
{/if}

{include file="footer.tpl"}


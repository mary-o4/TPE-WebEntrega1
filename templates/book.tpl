{include file="header.tpl"}

<ul class="list-group">
    <li>Genero: {$book->Genero}</li>
    <li>Fecha de Publicacion: {$book->Fecha_de_Publicacion}</li>
    <li>Editorial: {$book->Editorial}</li>
    <li>Sinopsis: {$book->Sinopsis}</li>
    <li>Imagen: {$book->Imagen}</li>
    <li>ISBN: {$book->ISBN}</li>
    <li>Autor: {$book->Nombre}</li>
   
    
</ul>

{if isset($smarty.session.USER_ID)}
{include file="formUpdateBook.tpl"}
{/if}
{include file="footer.tpl"}

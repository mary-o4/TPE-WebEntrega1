{include file="header.tpl"}

<ul class="list-group">
    <li>Genero: {$book->Genero}</li>
    <li>Fecha de Publicacion: {$book->Fecha_de_Publicacion}</li>
    <li>Editorial: {$book->Editorial}</li>
    <li>Sinopsis: {$book->Sinopsis}</li>
    <li>Imagen: {$book->Imagen}</li>
    <li>ISBN: {$book->ISBN}</li>
    <li>Autor: {$book->Nombre}</li>
    <li>Autor: {$book->Id}</li>
    
</ul>

<form action="update" method="POST" class="my-4">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label>Título</label>
                <input name="title" type="text" class="form-control">
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label>Genero</label>
                <input name="genre" type="text" class="form-control">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>Imagen</label>
                <input name="image" type="text" class="form-control">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>Editorial</label>
                <input name="editorial" type="text" class="form-control">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label>Fecha de Publicacion</label>
                <input name="date" type="text" class="form-control">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label>ISBN</label>
                <input name="isbn" type="text" class="form-control">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label>Autor</label>
                <select name="author" class="form-control">
                {foreach from = $books item = $book }
                    <option value='{$book->Id}'>{$book->Nombre}</option>
                {/foreach}   
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Sinopsis</label>
        <textarea name="synopsis" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Cambiar</button>
</form>

{include file="footer.tpl"}

{if !empty($error)}
<h1>ERROR!</h1>
<h2>$error</h2>
{/if}

<form action="add" method="POST" class="my-4">
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
                {foreach from = $categories item = $category }
                    <option value="{$category->Id}">{$category->Nombre}</option>
                {/foreach}   
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Sinopsis</label>
        <textarea name="synopsis" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Guardar</button>
</form>
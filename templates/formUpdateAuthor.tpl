<form action="updateAuthor/{$author->Id}" method="POST" class="my-4">
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Nombre</label>
            <input name="name" type="text" class="form-control" value="{$author->Nombre}">
        </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            <label>Imagen</label>
            <input name="image" type="text" class="form-control" value="{$author->Imagen}">
        </div>
    </div>
        
        <div class="form-group">
            <label>Biografia</label>
            <textarea name="biografy" class="form-control" rows="3" placeholder="{$author->Biografia}"></textarea>
        </div>
    </div>
        

    <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
</form>    
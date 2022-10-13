
<form action="addAuthor" method="POST" class="my-4" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label>Nombre</label>
                <input name="name" type="text" class="form-control" >
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label>Imagen</label>
                <input name="image" type="file" class="form-control">
            </div>
        </div>
        
        <div class="form-group">
            <label>Biografia</label>
            <textarea name="biografy" class="form-control" rows="3"></textarea>
        </div>
    </div>
        

    <button type="submit" class="btn btn-secondary mt-2">AGREGAR</button>
</form>    
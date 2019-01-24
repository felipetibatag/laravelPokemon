<input type="text" value="{{ isset($trainer)?$trainer->name:''}}" name="name" id="nombre" class="form-control" placeholder="Nombre">
<textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Descripción">
    {{isset($trainer)?$trainer->description:''}}
</textarea>
<input type="file" name="avatar" id="avatar" class="form-control-file">
<input type="submit" value="Enviar" class="form-control btn btn-primary">
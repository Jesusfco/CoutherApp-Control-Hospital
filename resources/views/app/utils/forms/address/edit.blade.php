<div class="input-field col l6">
    <label for="exampleInputEmail1">Calle</label>
    <input type="text" name="calle" class="form-control" value="{{ $obj->calle }}" onkeypress="return onlyAlphabeticCharacterKey(event)" maxlength="30">
</div>

<div class="input-field col l6">
    <label for="exampleInputEmail1">Colonia</label>
    <input type="text" name="colonia" class="form-control" value="{{ $obj->colonia }}" onkeypress="return onlyAlphabeticCharacterKey(event)" maxlength="30">
</div>

<div class="input-field col l4">
    <label for="exampleInputEmail1">Numero Exterior</label>
    <input type="text" name="numero" class="form-control" value="{{ $obj->numero }}" onkeypress="return onlyNumberIntegersKey(event)" maxlength="8">
</div>
<div class="input-field col l4">
    <label for="exampleInputEmail1">Numero Interior</label>
    <input type="text" name="numero_int" class="form-control" value="{{ $obj->numero_int }}" maxlength="8">
</div>
<div class="input-field col l4">
    <label for="exampleInputEmail1">Codigo Postal</label>
    <input type="text" name="cp" class="form-control" value="{{ $obj->cp }}" onkeypress="return onlyNumberIntegersKey(event)" maxlength="5">
</div>

<div class="input-field col l4">
    <label for="exampleInputEmail1">Ciudad</label>
    <input type="text" name="ciudad" class="form-control" value="{{ $obj->ciudad }}" maxlength="20" onkeypress="return onlyAlphabeticCharacterKey(event)">
</div>
<div class=" col l4">
    <label for="exampleInputEmail1">Estado</label>
    <select class="browser-default" name="estado">
        <option>{{$obj->estado}}</option>
        <option>Aguascalientes</option>
        <option>Baja California</option>
        <option>Baja California Sur</option>
        <option>Campeche</option>
        <option>Chiapas</option>
        <option>Chihuahua</option>
        <option>Ciudad de México</option>
        <option>Coahuila</option>
        <option>Colima</option>
        <option>Durango</option>
        <option>Estado de México</option>
        <option>Guanajuato</option>
        <option>Guerrero</option>
        <option>Hidalgo</option>
        <option>Jalisco</option>
        <option>Michoacán</option>
        <option>Morelos</option>
        <option>Nayarit</option>
        <option>Nuevo León</option>
        <option>Oaxaca</option>
        <option>Puebla</option>
        <option>Querétaro</option>
        <option>Quintana Roo</option>
        <option>San Luis Potosí</option>
        <option>Sinaloa</option>
        <option>Sonora</option>
        <option>Tabasco</option>
        <option>Tamaulipas</option>
        <option>Tlaxcala</option>
        <option>Veracruz</option>
        <option>Yucatán</option>
        <option>Zacatecas</option>
    </select>
</div>
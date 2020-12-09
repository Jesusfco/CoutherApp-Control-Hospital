<div class="col l6 s12">
    <input type="hidden" name="email" v-model="email">
    <div class="row">
      <div class="col input-field s7">
        <label for="exampleInputEmail1">Correo</label>
        <input type="text" class="form-control" v-model="email_name" required maxlength="15" onkeypress="return withoutAt(event)">
      </div>
      <div class="input-field col s5">     
        
        <select name="" v-model="email_domain">
          <option>@outlook.es</option>
          <option>@outlook.com</option>
          <option>@gmail.com</option>
          <option>@hotmail.com</option>
          <option>@icloud.com</option>
          <option>@yahoo.com</option>
        </select>
      </div>
    </div>
    
  </div>
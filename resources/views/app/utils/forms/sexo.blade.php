<div class="row col s12">
    <div class="form-group col l4">
        <label>Sexo</label>
        <select name="sexo" class="browser-default" v-model="sexo_selection" v-on:change="handlerSexoChange">           
            <option>Masculino</option>        
            <option>Femenino</option>  
            <option>Otro</option>                
        </select>
    </div>
    <input v-model="sexo" required v-if="sexo_selection == 'Masculino' || sexo_selection == 'Femenino'" name="sexo" type="hidden">
    <div class="form-group col l4" v-else>
        <label>Sexo</label>
        <input v-model="sexo" required name="sexo" type="text" maxlength="20">
    </div>
</div>
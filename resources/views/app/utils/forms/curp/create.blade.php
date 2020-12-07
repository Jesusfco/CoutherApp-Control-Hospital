<label for="exampleInputEmail1">Curp</label>
<input type="hidden" value="{{ old('curp') }}" id="oldCurpInput">
<input type="text" name="curp" class="form-control" maxlength="18" v-model="curp" required pattern="([A-Z]{4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM](AS|BC|BS|CC|CL|CM|CS|CH|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[A-Z]{3}[0-9A-Z]\d)">
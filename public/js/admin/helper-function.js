function withoutAt(evt) 
{    
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode             
    if ( ASCIICode == 64 ) 
        return false; 
    return true; 
} 
function onlyNumberIntegersKey(evt) 
{    
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode         
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
        return false; 
    return true; 
} 
function onlyNumberKey(evt) 
{    
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode     
    if(ASCIICode == 46) return true
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
        return false; 
    return true; 
} 

function onlyAlphabeticCharacterKey(e) 
{   if(e.key== ' ') return true
    var regex = '[A-Za-zÀ-ÖØ-öø-ÿ]'
    return e.key.match(regex) ? true: false    
}

function validateBirthday(e)
{
    let now = new Date()
    let dateInput = new Date(e.target.value)
    if(dateInput > now)  {
        e.target.value = ''
    }

}

function validateCurp( curp) 
{    
    var regex = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/;
    var validado = curp.match(regex);
    if(curp.match(regex) || curp.length == 0) return true
    M.toast({html: 'La curp no tiene el formato correcto', classes: 'red', displayLength: 6500})        
    return false    
}

function validateSecurePassword(password) 
{        
    if ((password.match(/[a-z]/g) && password.match(  /[A-Z]/g) && password.match(  /[0-9]/g) && password.match(  /[^a-zA-Z\d]/g) && password.length >= 8) || password.length == 0) 
    {
        return true
    }    
    M.toast({html: 'Contaseña debe contenar almenos 1 mayuscula, 1 minuscula, 1 número y 1 caracter especial', classes: 'red', displayLength: 6500})        
    return false    
}

function syncPasswordValidation(event) {
    let password = event.target.value
    let helperElement = document.getElementById('password-message')
    if(password.length == 0) {
        helperElement.innerHTML = ""
        return;
    }
    
    if (password.match(/[a-z]/g) 
        && password.match(  /[A-Z]/g) 
        && password.match(  /[0-9]/g) 
        && password.match(  /[^a-zA-Z\d]/g) 
        && password.length >= 8)  
    {
        helperElement.innerHTML = ""
        return
    }    
    helperElement.innerHTML="Se require 1 mayuscula, 1 minuscula, 1 número y 1 caracter especial"
}

function onlyPresionArterialCharacter (evt) {
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode     
    console.log(ASCIICode)
    // if(ASCIICode == 46) return true
    if(ASCIICode == 47) return true
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
        return false; 
    return true; 
}

function requiredAfterSomeOnInput (e) {
    
    let element = e.target
    if(element.value.length > 0) element.required = true
    else element.required = false
}
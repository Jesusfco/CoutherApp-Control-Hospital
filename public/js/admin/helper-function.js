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
    // Only ASCII charactar in that range allowed 
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode     
    if(ASCIICode == 46) return true
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
        return false; 
    return true; 
} 

function onlyAlphabeticCharacterKey(e) 
{
    return (e.charCode > 64 && e.charCode < 91) || (e.charCode > 96 && e.charCode < 123) || e.charCode == 32;
}

function validateBirthday(e)
{
    let now = new Date()
    let dateInput = new Date(e.target.value)
    if(dateInput > now)  {
        e.target.value = ''
    }

}

function validateCurp() 
{
    
}

function validateSecurePassword(password) 
{        
    if (password.match(/[a-z]/g) && str.match( 
            /[A-Z]/g) && str.match( 
            /[0-9]/g) && str.match( 
            /[^a-zA-Z\d]/g) && password.length >= 8) 
        return true
    else 
        return false    
}
function onlyNumberKey(evt) {           
    // Only ASCII charactar in that range allowed 
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
        return false; 
    return true; 
} 

function onlyLetterKey(e) {
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
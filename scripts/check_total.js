function check() 
{
    var generalAmt = parseFloat(document.getElementById('general').value);
    var missionsAmt = parseFloat(document.getElementById('missions').value);
    var specialAmt = parseFloat(document.getElementById('special').value);
    var otherAmt = parseFloat(document.getElementById('other').value);
    var totalAmt = generalAmt + missionsAmt + specialAmt + otherAmt;
    var total = parseFloat(document.getElementById('total').value);
    if (total != totalAmt) 
    {
        document.getElementById('total').setCustomValidity('Total must be greater than 0 and cannot exceed the sum of offerings.');
    } 
    else 
    {
        // input is valid -- reset the error message
        document.getElementById('total').setCustomValidity('');
    }
};

function check(input) 
{
    var generalAmt = document.getElementById('general').value;
    var missionsAmt = document.getElementById('missions').value;
    var specialAmt = document.getElementById('special').value;
    var otherAmt = document.getElementById('other').value;
    var totalAmt = parseInt(generalAmt) + parseInt(missionsAmt) + parseInt(specialAmt) + parseInt(otherAmt);
    if (input.value != totalAmt) 
    {
        put.setCustomValidity('Total must be greater than 0 and cannot exceed the sum of offerings.');
    } 
    else 
    {
        // input is valid -- reset the error message
        input.setCustomValidity('');
    }
};
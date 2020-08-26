function CalculateTotal()
{
    var generalAmt = document.getElementById('general').value;
    var missionsAmt = document.getElementById('missions').value;
    var specialAmt = document.getElementById('special').value;
    var otherAmt = document.getElementById('other').value;
    var totalAmt = parseInt(generalAmt) + parseInt(missionsAmt) + parseInt(specialAmt) + parseInt(otherAmt);
    
    return totalAmt;
};
function HandleTaxAndRemarks()
{
    if(document.getElementById('special').value > 0)
    {
        HandleTaxable('tax_special', false, false);
        //HandleRemarks('special_remarks', false);
    }
    else
    {
        HandleTaxable('tax_special', true, false);
        //HandleRemarks('special_remarks', true);
    }

    if(document.getElementById('other').value > 0)
    {
        HandleTaxable('tax_other', false, false);
        //HandleRemarks('special_remarks', false);
    }
    else
    {
        HandleTaxable('tax_other', true, false);
        //HandleRemarks('special_remarks', true);
    }
};